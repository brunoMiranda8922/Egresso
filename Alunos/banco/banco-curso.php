<?php
function listarCurso($conexao)
{
    $cursos    = array();
    $query     = "select * from cursos";
    $resultado = mysqli_query($conexao, $query);
    while ($curso = mysqli_fetch_assoc($resultado)) {
        $cursos[] = $curso;
    }
    return $cursos;
    
}

function listarAno($conexao)
{
    $anos      = array();
    $query     = "select * from ano";
    $resultado = mysqli_query($conexao, $query);
    while ($ano = mysqli_fetch_assoc($resultado)) {
        $anos[] = $ano;
    }
    return $anos;
}

function listarSemestre($conexao)
{
    $semestres = array();
    $query     = "select * from semestre";
    $resultado = mysqli_query($conexao, $query);
    while ($semestre = mysqli_fetch_assoc($resultado)) {
        $semestres[] = $semestre;
    }
    return $semestres;
}

function listarCidade($conexao)
{
    $cidades = array();
    $query = "select * from cidade";
    $resultado = mysqli_query($conexao, $query);
    while ($cidade = mysqli_fetch_assoc($resultado)) {
        $cidades[] = $cidade;
    }
    return $cidades;
}

function listarArea($conexao)
{
    $areas = array();
    $query = "select * from area_curso";
    $resultado = mysqli_query($conexao, $query);
    while ($area = mysqli_fetch_assoc($resultado)) {
        $areas[] = $area;
    }
    return $areas;
}

function alterarCurso($conexao, $id)
{
    $query     = "select * from cursos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
    
}


function atualizarCurso($conexao, $id, $nome){ 
    $query = "update cursos set nome = '{$nome}' where id = {$id}";
    $atualizar = mysqli_query($conexao, $query);
    return $atualizar; 
}
function inserirCurso($conexao, $nome) 
{
    $query = "INSERT INTO cursos(nome) VALUES('{$nome}')";
    return mysqli_query($conexao, $query);
}

function removerCursos($conexao, $id){
    $query = "delete from cursos where id = {$id}";
    return mysqli_query($conexao, $query);

}
?>