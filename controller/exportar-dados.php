<?php
require_once("../model/conexao.php");
require_once("../model/selecionar-dados-aluno.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/verifica-usuario.php");
error_reporting("E_NOTICE");

$listar = alunos($conexao);
$fp = fopen('/home/bruno/Área de Trabalho/file.csv', 'wb');
foreach ($listar as $fields) {
    fputcsv($fp, $fields);
}
fclose($fp);
$_SESSION["success"] = "Arquivo CSV Exportado ";
header("Location: ../view/home.php");
?>
