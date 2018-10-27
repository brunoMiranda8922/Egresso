<?php require_once("verifica-usuario.php");
require_once("mostrar-alerta.php");

$conexao = mysqli_connect("localhost", "bruno", "", "evasao");
$exibirMensagem = usuarioLogado();
if(!$conexao) {
    $exibirMensagem = "semConexao";
    $_SESSION['danger']= "Erro ao conectar com o servidor :";
  
}

?>

