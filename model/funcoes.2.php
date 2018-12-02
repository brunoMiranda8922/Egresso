<?php
require_once("conexao.php");

function listarRespostas($conexao) 
{
    $respostas = array();
    $query = "SELECT e.RA, e.nome, a.nome AS area, f.* FROM formulario_aluno AS f INNER JOIN egressos AS e ON e.id  = f.egressos_id LEFT JOIN area_curso as a ON f.area_trabalho = a.area_curso_id 
                GROUP BY f.id ORDER BY f.id DESC LIMIT 6";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;
    }
    return $respostas;
}
//SELECT RA, nome, Q.* FROM questionario AS Q INNER JOIN alunos ON e.id  = Q.alunos_id GROUP BY Q.id ORDER BY Q.id DESC LIMIT 6
function listarTrabalha($conexao) 
{
    $respostas = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if(!isset($_GET['trabalha']) || empty($_GET['trabalha'])) {
        $_GET['trabalha'] = '1||trabalha=0';
    }
    
    $nao = $_GET['trabalha'];
    $sim = $_GET['trabalha'];
    $indiferente = $_GET['trabalha'];
    
    $query = "SELECT e.RA, e.nome, a.nome AS area, f.* FROM formulario_aluno AS f INNER JOIN egressos AS e ON e.id  = f.egressos_id LEFT JOIN area_curso as a ON f.area_trabalho = a.area_curso_id
                WHERE f.trabalha = $nao OR f.trabalha = $sim OR f.trabalha LIKE '$indiferente' GROUP BY f.id  ORDER BY f.id DESC ";
    $resultado = mysqli_query($conexao, $query);

    
    while ($aluno = mysqli_fetch_assoc($resultado)) {
        $respostas[] = $aluno;
    }
    return $respostas;
}

function paginarTrabalha($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if(!isset($_GET['trabalha']) || empty($_GET['trabalha'])) {
        $_GET['trabalha'] = '1||trabalha=0';
    }
    
    $nao = $_GET['trabalha'];
    $sim = $_GET['trabalha'];
    $indiferente = $_GET['trabalha'];
    
    $query = "SELECT e.RA, e.nome, a.nome AS area, f.* FROM formulario_aluno AS f INNER JOIN egressos AS e ON e.id  = f.egressos_id LEFT JOIN area_curso as a ON f.area_trabalho = a.area_curso_id
                WHERE f.trabalha = $nao OR f.trabalha = $sim OR f.trabalha LIKE '$indiferente'  GROUP BY f.id";
    $resultado = mysqli_query($conexao, $query);
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 20;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    return $numero_pagina;
}

function listarResposta($conexao)
{
    $respostas = array();
    $query = "SELECT e.RA, e.nome, a.nome AS area, f.* FROM formulario_aluno AS f INNER JOIN egressos AS e ON e.id  = f.egressos_id LEFT JOIN area_curso as a ON f.area_trabalho = a.area_curso_id
                GROUP BY f.id ORDER BY f.id DESC";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;
    }
    return $respostas;
}

function gerarQRCODE($conexao)
{
    $respostas = array();
    $query = "SELECT A.id, RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id ORDER BY ano DESC, semestre DESC, A.id DESC";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;
    }
    return $respostas;
}

function qrCode($conexao)
{
    $code = gerarQRCODE($conexao);
    foreach($code as $resp) {
        $qr =  "../qr_img0.50j/php/qr_img.php?";
        $qr .= "d={$resp['nome']},{$resp['RA']},{$resp['curso']},{$resp['cpf']},{$resp['email']},{$resp['id']}&";
        $qr .= "e=H&";
        $qr .= "s=4&";
        $qr .= "t=P";
    ?>
       
       <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                    <img class="card-img-top" src="<?= $qr ?>" title="<?= $resp['nome'] ?>"/>
                    <div class="card-body">
                        <h4 class="card-title mb-3"><?= $resp['nome']?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    }
    return $qr;
}

function listarMes($conexao, $RA)
{
    $meses = array();
    $query = "SELECT DISTINCT MONTH(data_entrada) AS MES FROM frequencia WHERE RA = '{$RA}'";
    $resultado = mysqli_query($conexao, $query);
    while($mes = mysqli_fetch_assoc($resultado))
    {
        $meses[] = $mes;
    }
    return $meses;
}

function perfilDiasNoMes($conexao, $id)
{
    if (!empty($_GET['mes']))
    {
        return listarTotalDias($conexao, $id);
    }
    return listarTotalDiasAtual($conexao, $id);
}

function perfilDiario($conexao, $id)
{
    if (!empty($_GET['mes']))
    {
        return listarFrequenciaDias($conexao, $id);
    }
    return listarFrequenciaDiasAtual($conexao, $id);
}   

function perfilDadosDoAluno($conexao, $id)
{
    if (!empty($_GET['mes']))
    {
        return listarDadosFrequencia($conexao, $id);
    }
    return listarDadosFrequenciaAtual($conexao, $id);
}



function listarTotalDias($conexao, $RA)
{   
    $mes = (isset($_GET['mes'])) ? $_GET['mes'] : "" ;
    $meses = array();
    $query = "SELECT DISTINCT RA, MONTH(data_entrada) AS MES, DAY(data_entrada) AS DIA FROM frequencia WHERE RA ='{$RA}' AND MONTH(data_entrada) = '{$mes}' GROUP BY data_entrada ORDER BY MONTH(data_entrada) DESC, DAY(data_entrada) DESC";
    $resultado = mysqli_query($conexao, $query);
    while($row = mysqli_fetch_assoc($resultado))
    {
        $meses[] = $row;
    }
    return $meses;
}

function listarFrequenciaDias($conexao, $id)
{
    $mes = (isset($_GET['mes'])) ? $_GET['mes'] : "";
    $query = "SELECT nome, F.RA, MONTH(data_entrada) AS MES, DAY(data_entrada) AS DIA, COUNT(F.RA) AS QUANTIDADE FROM frequencia AS F
                LEFT JOIN alunos as A ON F.RA = A.RA WHERE A.id = '{$id}' AND MONTH(data_entrada) = '{$mes}'
                    GROUP BY MONTH(data_entrada), DAY(data_entrada) ORDER BY MES DESC, DIA DESC LIMIT 5";
    $resultado = mysqli_query($conexao, $query);
    while($row = mysqli_fetch_object($resultado))
    {
        $totalMes = $row->MES;
        $totalDia = $row->DIA;
        $totalFrequencia = $row->QUANTIDADE;
        $total[] = ['mes' => $totalMes, 'dia' => $totalDia, 'frequencia' => $totalFrequencia];
    }
    return $total;
}

function listarDadosFrequencia($conexao, $id)
{
    $mes = (isset($_GET['mes'])) ? $_GET['mes'] : "";
    $dados = array();
    $query = "SELECT A.id, A.RA, nome, email, curso, status, MONTH(data_entrada) AS MES, DAY(data_entrada) AS DIA, TIME(data_entrada) AS HORARIO FROM alunos AS A
                INNER JOIN cursos AS C ON A.cursos_id = C.id INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id
                    INNER JOIN cidades AS CI ON A.cidades_id = CI.id INNER JOIN matricula AS M ON A.matricula_id = M.id RIGHT JOIN frequencia as F ON A.RA = F.RA
                        WHERE A.id = '{$id}' AND MONTH(data_entrada) = '{$mes}' ORDER BY MONTH(data_entrada) DESC, DAY(data_entrada) DESC, TIME(data_entrada) DESC";
    $resultado = mysqli_query($conexao, $query);
    while($row = mysqli_fetch_assoc($resultado))
    {
        $dados[] = $row;
    }
    return $dados;
}

function listarTotalDiasAtual($conexao, $RA)
{   
    
    $mes = strftime('%m');
    $meses = array();
    $query = "SELECT DISTINCT RA, MONTH(data_entrada) AS MES, DAY(data_entrada) AS DIA FROM frequencia WHERE RA ='{$RA}' AND MONTH(data_entrada) = '{$mes}' GROUP BY data_entrada ORDER BY MONTH(data_entrada) DESC, DAY(data_entrada) DESC";
    $resultado = mysqli_query($conexao, $query);
    while($row = mysqli_fetch_assoc($resultado))
    {
        $meses[] = $row;
    }
    return $meses;
}

function listarFrequenciaDiasAtual($conexao, $id)
{   
    $mes = strftime('%m');
    $query = "SELECT nome, F.RA, MONTH(data_entrada) AS MES, DAY(data_entrada) AS DIA, COUNT(F.RA) AS QUANTIDADE FROM frequencia AS F
                LEFT JOIN alunos as A ON F.RA = A.RA WHERE A.id = '{$id}' AND MONTH(data_entrada) = '{$mes}'
                    GROUP BY MONTH(data_entrada), DAY(data_entrada) ORDER BY MES DESC, DIA DESC LIMIT 5";
    $resultado = mysqli_query($conexao, $query);
    while($row = mysqli_fetch_object($resultado))
    {
        $totalMes = $row->MES;
        $totalDia = $row->DIA;
        $totalFrequencia = $row->QUANTIDADE;
        $total[] = ['mes' => $totalMes, 'dia' => $totalDia, 'frequencia' => $totalFrequencia];
    }
    return $total;
}

function listarDadosFrequenciaAtual($conexao, $id)
{
    $mes = strftime('%m');
    $dados = array();
    $query = "SELECT A.id, A.RA, nome, email, curso, status, MONTH(data_entrada) AS MES, DAY(data_entrada) AS DIA, TIME(data_entrada) AS HORARIO FROM alunos AS A
                INNER JOIN cursos AS C ON A.cursos_id = C.id INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id
                    INNER JOIN cidades AS CI ON A.cidades_id = CI.id INNER JOIN matricula AS M ON A.matricula_id = M.id RIGHT JOIN frequencia as F ON A.RA = F.RA
                        WHERE A.id = '{$id}' AND MONTH(data_entrada) = '{$mes}' ORDER BY MONTH(data_entrada) DESC, DAY(data_entrada) DESC, TIME(data_entrada) DESC";
    $resultado = mysqli_query($conexao, $query);
    while($row = mysqli_fetch_assoc($resultado))
    {
        $dados[] = $row;
    }
    return $dados;
}
?>