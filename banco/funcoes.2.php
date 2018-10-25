<?php require_once("banco/conexao.php");

function cadastrarQuestionario($conexao, $trabalha, $empresa, $area, $cargo, $formacao, $cronograma, $professores, $intra, $recomendaria, $sexo, $estagio, $semestre, $egresso_id) 
{                                           
    
    $query = "insert into formulario_aluno(trablha, empresa, area_curso_id, cargo, formacao, cronograma, professores, infraestrutura, recomendaria, sexo, estagio, semestre, egresso_id), 
                values({$trabalha}, '{$empresa}', '{$area}', {$cargo}, '{$formacao}', '{$cronograma}', '{$professores}',
                    '{$intra}', '{$recomendaria}', '{$sexo}', '{$estagio}', '{$semestre}', {'$egresso_id'})";
    return mysqli_query($conexao, $query);
    
    
}

function alunos($conexao)
{
$lista = array();
$query = "SELECT DISTINCT  f.id, f.RA, f.cpf, f.nome, f.email, c.nome AS curso, ano_formacao AS ano, 
data_semestre AS semestre, ci.nome AS cidade, f.PR from egressos AS f INNER JOIN cursos AS c ON f.cursos_id = c.id
    INNER JOIN ano ON f.ano_id = ano.id INNER JOIN semestre ON f.semestre_id = semestre.id INNER JOIN cidade AS ci ON f.cidade_id = ci.id
        ORDER BY ano_formacao DESC";
$resultado = mysqli_query($conexao, $query);
while ($row = mysqli_fetch_assoc($resultado)) {
   $lista[] = $row;
    }
     return $lista;
}

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

function listarTrabalha($conexao) 
{
    $respostas = array();
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
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
    $alunos          = array();
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
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
    $query = "SELECT DISTINCT  f.id, f.RA, f.cpf, f.nome, f.email, c.nome AS curso, ano_formacao AS ano, 
    data_semestre AS semestre, ci.nome AS cidade, f.PR from egressos AS f INNER JOIN cursos AS c ON f.cursos_id = c.id
        INNER JOIN ano ON f.ano_id = ano.id INNER JOIN semestre ON f.semestre_id = semestre.id INNER JOIN cidade AS ci ON f.cidade_id = ci.id
            ";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;

    }
    return $respostas;

}


function qrCode($conexao) { 
    $code = gerarQRCODE($conexao);
    
    foreach($code as $resp) { 
        $qr =  "qr_img0.50j/php/qr_img.php?";
        $qr .= "d={$resp['nome']},{$resp['RA']},{$resp['curso']},{$resp['cpf']},{$resp['email']}&";
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





?>