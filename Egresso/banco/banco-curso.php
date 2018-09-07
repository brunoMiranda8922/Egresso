<?php
function listarCurso($conexao)
{
    $cursos    = array();
    $query     = "SELECT * FROM cursos";
    $resultado = mysqli_query($conexao, $query);
    while ($curso = mysqli_fetch_assoc($resultado)) {
        $cursos[] = $curso;
    }
    return $cursos;
    
}

function listarAno($conexao)
{
    $anos      = array();
    $query     = "SELECT * FROM ano";
    $resultado = mysqli_query($conexao, $query);
    while ($ano = mysqli_fetch_assoc($resultado)) {
        $anos[] = $ano;
    }
    return $anos;
}

function listarSemestre($conexao)
{
    $semestres = array();
    $query     = "SELECT * FROM semestre";
    $resultado = mysqli_query($conexao, $query);
    while ($semestre = mysqli_fetch_assoc($resultado)) {
        $semestres[] = $semestre;
    }
    return $semestres;
}

function listarCidade($conexao)
{
    $cidades = array();
    $query = "SELECT * FROM cidade";
    $resultado = mysqli_query($conexao, $query);
    while ($cidade = mysqli_fetch_assoc($resultado)) {
        $cidades[] = $cidade;
    }
    return $cidades;
}

function listarArea($conexao)
{
    $areas = array();
    $query = "SELECT * FROM area_curso";
    $resultado = mysqli_query($conexao, $query);
    while ($area = mysqli_fetch_assoc($resultado)) {
        $areas[] = $area;
    }
    return $areas;
}

function alterarCurso($conexao, $id)
{
    $query     = "SELECT * FROM cursos WHERE id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
    
}


function atualizarCurso($conexao, $id, $nome){ 
    $query = "UPDATE cursos SET nome = '{$nome}' WHERE id = {$id}";
    $atualizar = mysqli_query($conexao, $query);
    return $atualizar; 
}
function inserirCurso($conexao, $nome) 
{
    $query = "INSERT INTO cursos(nome) VALUES('{$nome}')";
    return mysqli_query($conexao, $query);
}

function removerCursos($conexao, $id){
    $query = "DELETE FROM cursos WHERE id = {$id}";
    return mysqli_query($conexao, $query);

}


?>