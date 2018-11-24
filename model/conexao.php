<?php
require_once("mostrar-alerta.php");

$conexao = mysqli_connect("localhost", "bruno", "", "evasao");
$exibirMensagem = NULL;

if(!$conexao)
{
    $exibirMensagem = "semConexao";
    $_SESSION['danger'] = "Erro ao conectar com o servidor :";
}

?>

