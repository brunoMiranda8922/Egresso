<?php
require_once("verificar-usuario.php");

function inserirAlunoDeNovo($conexao, $RA, $nome, $CPF, $email, $PR, $curso_id, $ano_id, $semestre_id, $cidade_id)
{
    $query = "insert into egressos(RA, nome, cpf, email, PR, cursos_id, ano_id, semestre_id, cidade_id) 
            values({$RA}, '{$nome}', '{$CPF}', '{$email}', {$PR}, '{$curso_id}', '{$ano_id}', '{$semestre_id}', '{$cidade_id}')";
    return mysqli_query($conexao, $query);
}

function listarAlunosDe($conexao)
{
    $alunos          = array();
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $query           = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id order by ano_formacao DESC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id order by ano_formacao DESC, RA limit {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos     = mysqli_num_rows($resultado_alunos);
    
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
    
}

function removerAlunos($conexao, $id)
{
    $query = "delete from egressos where id = {$id}";
    return mysqli_query($conexao, $query);
    
}

function alterarAluno($conexao, $RA)
{
    $query     = "select * from cadastro_formados where RA = {$RA}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
    
}

function atualizarAluno($conexao, $RA, $nome, $cidade, $email, $PR, $curso_id, $ano_id, $semestre_id)
{
    $query     = "update cadastro_formados set nome = '{$nome}', cidade = '{$cidade}', email = '{$email}', PR = {$PR},
            cursos_id = {$curso_id}, ano_id = {$ano_id}, semestre_id = {$semestre_id} where RA = {$RA}";
    $atualizar = mysqli_query($conexao, $query);
    return $atualizar;
}

function selecionarAlunos($conexao)
{
    
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $query           = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id order by c.nome ASC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    
    return $numero_pagina;
}

function pesquisarAlunosDenovo($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if (!isset($_GET['pesquisar'])) {
        header("Location: cadastro-lista.php");
    } else {
        $valor_pesquisar = $_GET['pesquisar'];
    }
    $query           = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.nome like '%$valor_pesquisar%' order by ano_formacao DESC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.nome like '%$valor_pesquisar%' order by ano_formacao DESC, RA limit {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos     = mysqli_num_rows($resultado_alunos);
    
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
    
}

function selecionaAlunos($conexao)
{
    
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = $_GET['pesquisar'];
    
    $query           = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.nome like '%$valor_pesquisar%' order by c.nome ASC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    
    return $numero_pagina;
}

function gerarQRCODE($conexao)
{
    $id = $_SESSION['id'];
    $respostas = array();
    $query = "SELECT A.id, RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE A.id = {$id} ORDER BY ano DESC, semestre DESC, A.id DESC";
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
        $qr =  "../../qr_img0.50j/php/qr_img.php?";
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


?>
