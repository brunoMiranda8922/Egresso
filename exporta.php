<?php require_once("banco/conexao.php");
require_once("banco/funcoes.2.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/verifica-usuario.php");
error_reporting("E_NOTICE");


$listar = alunos($conexao);
$fp = fopen('/home/bruno/Área de Trabalho/file.csv', 'wb');

foreach ($listar as $fields) {
    
    fputcsv($fp, $fields);
}

fclose($fp);
$_SESSION["success"] = "Arquivo CSV Exportado ";
header("Location: home.php");
?>