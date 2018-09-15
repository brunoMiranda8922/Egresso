<?php
require_once("banco/conexao.php");

function carregarAlunos($conexao)
{
    //var_dump($_GET, (!isset($_GET['pesquisar']) && !empty($_GET['ano_id'])));    
    if (isPesquisaSemFiltro()) {
        var_dump(0);
        return listarAlunos($conexao);
    } elseif (isPesquisarPorNome()){
        var_dump(1);
        return pesquisarAlunosPorNome($conexao);
    } elseif (isFiltrarPorAno()) {
        var_dump(2);
        return filtrarAlunos($conexao);
    }
    var_dump(3);
    return alunoPesquisarFiltrar($conexao);
}

function isPesquisaSemFiltro()
{
    return (empty($_GET['pesquisar']) && empty($_GET['ano_id']));
}

function isPesquisarPorNome()
{
    return (!empty($_GET['pesquisar']) && empty($_GET['ano_id']));
}

function isFiltrarPorAno() 
{
    return (((isset($_GET['pesquisar']) && empty($_GET['pesquisar'])) || !isset($_GET['pesquisar']))
        && isset($_GET['ano_id']));
}
function listarAlunos($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar']))? $_GET['pesquisar'] : "";
    $query  = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
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
    $total_alunos = mysqli_num_rows($resultado_alunos);
    
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function pesquisarAlunosPorNome($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar']))? $_GET['pesquisar'] : "";
    
    
    $query = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
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
    $total_alunos = mysqli_num_rows($resultado_alunos);
    
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
    
}

function filtrarAlunos($conexao)
{
    $alunos  = array();
    $pagina  = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $filtrar = (isset($_GET['ano_id'])) ? $_GET['ano_id'] : "";
    
    $query = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.ano_id = '{$filtrar}' order by ano_formacao DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                        from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                            inner join semestre on f.semestre_id = semestre.id where f.ano_id = '{$filtrar}' order by ano_formacao DESC, RA limit {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function alunoPesquisarFiltrar($conexao)
{
    $alunos = array();
    $filtrar = $_GET['ano_id'];
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $query = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.ano_id = '{$filtrar}' and f.nome like '%$valor_pesquisar%' order by ano_formacao DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                        from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                            inner join semestre on f.semestre_id = semestre.id where f.ano_id = '{$filtrar}' and f.nome like '%$valor_pesquisar%' order by ano_formacao DESC, RA limit {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos     = mysqli_num_rows($resultado_alunos);
    
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function paginar($conexao)
{ 
    if (isPesquisaSemFiltro()) {   
        return listarOsAlunos($conexao);
    } elseif (isset($_GET['pesquisar']) && empty($_GET['ano_id'])) {
        return selecionaOsAlunos($conexao);
    } elseif (!isset($_GET['pesquisar']) && isset($_GET['ano_id'])) {
        return filtroAlunos($conexao);
    }
    return filtrarElistar($conexao);
}

function listarOsAlunos($conexao)
{
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;   
    
    $query = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id order by c.nome ASC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    return $numero_pagina;
}



function selecionaOsAlunos($conexao)
{
    
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar']: "";
    
    $query           = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.nome like '%$valor_pesquisar%' order by c.nome ASC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    
    return $numero_pagina;
}


function filtroAlunos($conexao)
{
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $filtrar = (isset($_GET['ano_id']))? $_GET['ano_id']: "" ;
    
    $query           = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.ano_id = $filtrar order by c.nome ASC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    
    return $numero_pagina;
}


function filtrarElistar($conexao)
{
    
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar']))? $_GET['pesquisar']: "";
    $filtrar = (isset($_GET['ano_id']))? $_GET['ano_id']: "" ;
    
    $query           = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
                    from cadastro_formados as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
                    inner join semestre on f.semestre_id = semestre.id where f.ano_id = $filtrar and f.nome like '%$valor_pesquisar%'  order by c.nome ASC";
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    
    return $numero_pagina;
}


?>