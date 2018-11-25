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

function listarArea($conexao)
{
    $areas = array();
    $query = "SELECT * FROM areas";
    $resultado = mysqli_query($conexao, $query);
    while ($area = mysqli_fetch_assoc($resultado)) {
        $areas[] = $area;
    }
    return $areas;
}

?>