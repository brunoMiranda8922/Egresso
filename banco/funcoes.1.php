<?php
require_once("banco/conexao.php");

function carregarAlunos($conexao)
{
    //var_dump($_GET, (!isset($_GET['pesquisar']) && !empty($_GET['ano_id'])));    
    if (isAlunosSemPesquisaAndFiltro()) {

        return listarAlunos($conexao);

    } elseif (isPesquisarAlunosPorNome()) {

        return listarAlunosPorPesquisa($conexao);

    } elseif (isFiltrarAlunosPorAno()) {

        return listarAlunosPorAno($conexao);

    } elseif (isFiltrarAlunosPorCurso()) {

        return listarAlunosPorCurso($conexao);

    } elseif (isPesquisarAndFiltrarAlunosPorAno()) {

        return listarAlunosPorPesquisaAndAno($conexao);

    } elseif (isPesquisarAndFiltrarAlunosPorCurso()) {

        return listarAlunosPorPesquisaAndCurso($conexao);

    } elseif (isFiltrarAlunosPorAnoAndCurso()) {

        return listarAlunosPorAnoandCurso($conexao);

    } elseif (isPesquisarComTodosFiltros()) {

        return listarAlunosPorPesquisaAndAnoAndCuso($conexao);
    }
}

function isAlunosSemPesquisaAndFiltro()
{
    return (empty($_GET['pesquisar']) && empty($_GET['anos_id']) && empty($_GET['cursos_id']));
}

function isPesquisarAlunosPorNome()
{
    return (!empty($_GET['pesquisar']) && empty($_GET['anos_id']) && empty($_GET['cursos_id']));
}

function isFiltrarAlunosPorAno()
{
    return (((isset($_GET['pesquisar']) && empty($_GET['pesquisar'])) || !isset($_GET['pesquisar'])) && !isset($_GET['cursos_id']) && isset($_GET['anos_id']));
}

function isFiltrarAlunosPorCurso()
{
    return (empty($_GET['pesquisar']) && (empty($_GET['anos_id']) && !empty($_GET['cursos_id'])));
}

function isPesquisarAndFiltrarAlunosPorAno()
{
    return (((isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) && empty($_GET['cursos_id']) && isset($_GET['anos_id'])));
}

function isPesquisarAndFiltrarAlunosPorCurso()
{
    return (((isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) && empty($_GET['anos_id']) && isset($_GET['cursos_id'])));
}

function isFiltrarAlunosPorAnoAndCurso()
{
    return  (((isset($_GET['pesquisar']) && empty($_GET['pesquisar']) || !isset($GET['pesquisar'])) && isset($_GET['anos_id']) && isset($_GET['cursos_id'])));
}

function isPesquisarComTodosFiltros(){
    return  (((isset($_GET['pesquisar']) && !empty($_GET['pesquisar'])) && isset($_GET['anos_id']) && isset($_GET['cursos_id'])));
}

function listarAlunos($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";

    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function listarAlunosPorPesquisa($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id  WHERE nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%' ORDER BY ano DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id  WHERE nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%' ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
    
}

function listarAlunosPorAno($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $filtrar = (isset($_GET['anos_id'])) ? $_GET['anos_id'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A
                INNER JOIN cursos AS C ON A.cursos_id = C.id INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id
                    INNER JOIN cidades AS CI ON A.cidades_id = CI.id INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = '{$filtrar}' ORDER BY ano DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A
                        INNER JOIN cursos AS C ON A.cursos_id = C.id INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id
                            INNER JOIN cidades AS CI ON A.cidades_id = CI.id INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = '{$filtrar}' ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function listarAlunosPorPesquisaAndAno($conexao)
{
    $alunos = array();
    $filtrar = $_GET['anos_id'];
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = '{$filtrar}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = '{$filtrar}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function listarAlunosPorCurso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";

    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function listarAlunosPorPesquisaAndCurso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function listarAlunosPorAnoandCurso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";
    $filtrar = (isset($_GET['anos_id'])) ? $_GET['anos_id'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidadess_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = {$filtrar} AND cursos_id = {$curso} ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' AND anos_id = '{$filtrar}' ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function listarAlunosPorPesquisaAndAnoAndCuso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";
    $filtrar = (isset($_GET['anos_id'])) ? $_GET['anos_id'] : "";
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' AND anos_id = '{$filtrar}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    $inicio = ($quantidade_pagina * $pagina) - $quantidade_pagina;
    
    $query_alunos = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                        INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestress_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                            INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' AND anos_id = '{$filtrar}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC LIMIT {$inicio}, {$quantidade_pagina}";
    
    $resultado_alunos = mysqli_query($conexao, $query_alunos);
    $total_alunos = mysqli_num_rows($resultado_alunos);
    while ($aluno = mysqli_fetch_assoc($resultado_alunos)) {
        $alunos[] = $aluno;
    }
    return $alunos;
}

function paginar($conexao)
{
    if (isAlunosSemPesquisaAndFiltro()) {
        
        return paginarlistarAlunos($conexao);

    } elseif (isPesquisarAlunosPorNome()) {
        
        return paginarlistarAlunosPorPesquisa($conexao);

    } elseif (isFiltrarAlunosPorAno()) {
        
        return paginarlistarAlunosPorAno($conexao);

    } elseif (isFiltrarAlunosPorCurso()) {
        
        return paginarlistarAlunosPorCurso($conexao);

    } elseif (isPesquisarAndFiltrarAlunosPorAno()) {
        
        return paginarlistarAlunosPorPesquisaAndAno($conexao);

    } elseif (isPesquisarAndFiltrarAlunosPorCurso()) {
        
        return paginarlistarAlunosPorPesquisaAndCurso($conexao);

    } elseif (isFiltrarAlunosPorAnoAndCurso()) {
        
        return paginarlistarAlunosPorAnoandCurso($conexao);

    } elseif (isPesquisarComTodosFiltros()) {
        
        return paginarlistarAlunosPorPesquisaAndAnoAndCuso($conexao);
    }
}

function paginarlistarAlunos($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";

    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidadess_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);

    return $numero_pagina;
}

function paginarlistarAlunosPorPesquisa($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id  WHERE nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%' ORDER BY ano DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    return $numero_pagina;
}

function paginarlistarAlunosPorAno($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $filtrar = (isset($_GET['anos_id'])) ? $_GET['anos_id'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A
                INNER JOIN cursos AS C ON A.cursos_id = C.id INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id
                    INNER JOIN cidades AS CI ON A.cidades_id = CI.id INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = '{$filtrar}' ORDER BY ano DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);

    return $numero_pagina;
}

function paginarlistarAlunosPorPesquisaAndAno($conexao)
{
    $alunos = array();
    $filtrar = $_GET['anos_id'];
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;

    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = '{$filtrar}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC";
    
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);

    return $numero_pagina;
}

function paginarlistarAlunosPorCurso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";

    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);

    return $numero_pagina;
}

function paginarlistarAlunosPorPesquisaAndCurso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);

    return $numero_pagina;
}

function paginarlistarAlunosPorAnoandCurso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";
    $filtrar = (isset($_GET['anos_id'])) ? $_GET['anos_id'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE anos_id = {$filtrar} AND cursos_id = {$curso} ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    return $numero_pagina;
}

function paginarlistarAlunosPorPesquisaAndAnoAndCuso($conexao)
{
    $alunos = array();
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    $curso = (isset($_GET['cursos_id'])) ? $_GET['cursos_id'] : "";
    $filtrar = (isset($_GET['anos_id'])) ? $_GET['anos_id'] : "";
    $valor_pesquisar = (isset($_GET['pesquisar'])) ? $_GET['pesquisar'] : "";
    
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE cursos_id = '{$curso}' AND anos_id = '{$filtrar}' AND (nome LIKE '%$valor_pesquisar%' OR RA LIKE '%$valor_pesquisar%') ORDER BY ano DESC";

    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 6;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);

    return $numero_pagina;
}

?>