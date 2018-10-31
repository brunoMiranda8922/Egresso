<?php
require_once("conexao.php");

function soQueroSim($conexao)
{
    //$teste = array();
    $query = "SELECT DISTINCT COUNT(e.trabalha) AS RA FROM formulario_aluno AS e INNER JOIN egressos AS a ON e.egressos_id = a.id
                WHERE e.trabalha = 0 GROUP BY e.egressos_id";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_object($resultado)) {
        $teste01 = $row->RA;
    }
    return $teste01;
}

$teste = soQueroSim($conexao);
var_dump($teste);
die;

function listarAnos($conexao)
{
    $lista = array();
    $query = "SELECT a.ano_formacao AS ano, COUNT(e.RA) AS alunos FROM egressos AS e INNER JOIN
                ano AS a ON e.ano_id = a.id WHERE cursos_id= 1   GROUP BY a.ano_formacao DESC";
    $resultado = mysqli_query($conexao,$query);
    while($row = mysqli_fetch_assoc($resultado)) {
        $lista[] = $row;
    }
    return $lista;
}
?>