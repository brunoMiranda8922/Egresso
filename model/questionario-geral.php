<?php

function listarRespostasGeral($conexao) 
{
    $respostas = array();
    $query = "SELECT A.RA, A.nome, AR.area AS area, Q.* FROM questionario AS Q INNER JOIN alunos AS A ON A.id  = Q.alunos_id LEFT JOIN areas AS AR ON Q.areas = AR.area GROUP BY Q.id";
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
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if(!isset($_GET['trabalha']) || empty($_GET['trabalha'])) {
        $_GET['trabalha'] = '1||trabalha=0';
    }
    
    $nao = $_GET['trabalha'];
    $sim = $_GET['trabalha'];
    $indiferente = $_GET['trabalha'];
    
    $query = "SELECT A.RA, A.nome, AR.area AS area, Q.* FROM questionario AS Q INNER JOIN alunos AS A ON A.id  = Q.alunos_id LEFT JOIN areas AS AR ON Q.areas = AR.area
                WHERE Q.trabalha = {$nao} OR Q.trabalha = {$sim} OR Q.trabalha = {$indiferente} GROUP BY Q.id  ORDER BY Q.id DESC ";
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
    
    $query = "SELECT A.RA, A.nome, AR.area AS area, Q.* FROM questionario AS Q INNER JOIN alunos AS A ON A.id  = Q.alunos_id LEFT JOIN areas AS AR ON Q.areas = AR.area
                WHERE Q.trabalha = {$nao} OR Q.trabalha = {$sim} OR Q.trabalha = {$indiferente} GROUP BY Q.id  ORDER BY Q.id DESC ";
    $resultado = mysqli_query($conexao, $query);
    $resultado_aluno = mysqli_query($conexao, $query);
    $total_alunos = mysqli_num_rows($resultado_aluno);
    $quantidade_pagina = 20;
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    return $numero_pagina;
}

?>