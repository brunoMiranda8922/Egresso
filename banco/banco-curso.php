<?php

function listarCurso($conexao)
{
    $cursos = array();
    $query = "SELECT * FROM cursos";
    $resultado = mysqli_query($conexao, $query);
    while ($curso = mysqli_fetch_assoc($resultado)) {
        $cursos[] = $curso;
    }
    return $cursos;
}

function listarAno($conexao)
{
    $anos = array();
    $query = "SELECT * FROM anos";
    $resultado = mysqli_query($conexao, $query);
    while ($ano = mysqli_fetch_assoc($resultado)) {
        $anos[] = $ano;
    }
    return $anos;
}

function listarSemestre($conexao)
{
    $semestres = array();
    $query = "SELECT * FROM semestres";
    $resultado = mysqli_query($conexao, $query);
    while ($semestre = mysqli_fetch_assoc($resultado)) {
        $semestres[] = $semestre;
    }
    return $semestres;
}

function listarCidade($conexao)
{
    $cidades = array();
    $query = "SELECT * FROM cidades";
    $resultado = mysqli_query($conexao, $query);
    while ($cidade = mysqli_fetch_assoc($resultado)) {
        $cidades[] = $cidade;
    }
    return $cidades;
}

function listarMatricula($conexao)
{
    $matriculas = array();
    $query = "SELECT * FROM matricula";
    $resultado = mysqli_query($conexao, $query);
    while ($matricula = mysqli_fetch_assoc($resultado)) {
        $matriculas[] = $matricula;
    }
    return $matriculas;
}

function alterarCurso($conexao, $id)
{
    $query = "SELECT * FROM cursos WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function atualizarCurso($conexao, $id, $nome)
{
    $query = "UPDATE cursos SET curso = '{$nome}' WHERE id = {$id}";
    $atualizar = mysqli_query($conexao, $query);
    return $atualizar;
}

function inserirCurso($conexao, $nome)
{
    $query = "INSERT INTO cursos(curso) VALUES('{$nome}')";
    return mysqli_query($conexao, $query);
}

function removerCursos($conexao, $id){
    $query = "DELETE FROM cursos WHERE id = {$id}";
    return mysqli_query($conexao, $query);
}


?>