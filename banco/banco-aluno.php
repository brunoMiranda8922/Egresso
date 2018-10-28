<?php
function inserirAlunoDeNovo($conexao, $RA, $nome, $CPF, $email, $telefone, $foto, $curso_id, $ano_id, $semestre_id, $cidade_id, $matricula_id)
{
    $query = "INSERT INTO alunos(RA, nome, cpf, email, telefone, foto, cursos_id, ano_id, semestre_id, cidade_id, matricula_id) 
            VALUES({$RA}, '{$nome}', '{$CPF}', '{$email}', '{$telefone}', '{$foto}', '{$curso_id}', '{$ano_id}', '{$semestre_id}', '{$cidade_id}', '{$matricula_id}')";
    return mysqli_query($conexao, $query);
}

function listarAlunosDe($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $query  = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.ano_id = AN.id INNER JOIN semestres AS S ON A.semestre_id = S.id INNER JOIN cidades AS CI ON A.cidade_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id ORDER BY ano DESC;";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.ano_id = AN.id INNER JOIN semestres AS S ON A.semestre_id = S.id INNER JOIN cidades AS CI ON A.cidade_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos     = mysqli_num_rows($resultado_alunos);
    
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
    
}

function removerAlunos($conexao, $id)
{
    $query = "DELETE FROM alunos WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}

function alterarAluno($conexao, $RA)
{
    $query     = "SELECT * FROM alunos WHERE RA = {$RA}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function atualizarAluno($conexao, $RA, $nome, $CPF, $email, $telefone, $foto, $curso_id, $ano_id, $semestre_id, $cidade_id, $matricula_id)
{
    $query = "UPDATE alunos SET nome = '{$nome}', cidade = '{$cidade}', email = '{$email}', PR = {$PR},
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

function listarAlunoss($conexao, $id) {
    $query = "SELECT DISTINCT  f.id, f.RA, f.cpf, f.nome, f.email, c.nome AS curso, ano_formacao AS ano,
    data_semestre AS semestre, ci.nome AS cidade, f.PR from egressos AS f INNER JOIN cursos AS c ON f.cursos_id = c.id
        INNER JOIN ano ON f.ano_id = ano.id INNER JOIN semestre ON f.semestre_id = semestre.id INNER JOIN cidade AS ci ON f.cidade_id = ci.id
        WHERE f.id ={$id} ORDER BY ano_formacao DESC ";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}


?>
