<?php require_once("banco/verifica-usuario.php");
require_once("banco/mostrar-alerta.php");
error_reporting("E_NOTICE");
$conexao = mysqli_connect("localhost", "bruno", "", "fatec");

if (!$conexao) { 
    $_SESSION['danger'] = "Sem conexão com a base de dados";

}