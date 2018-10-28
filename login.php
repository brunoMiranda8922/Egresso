<?php require_once("banco/conexao.php");
require_once("banco/banco-usuario.php");
require_once("banco/verifica-usuario.php");
require_once("banco/mostrar-alerta.php");

$usuario = buscarUsuario($conexao, $_POST['email'], $_POST['senha']);

if ($usuario == null){
    $_SESSION['danger'] = "Email ou Senha invalido";

    header("Location: index.php");

} else { 
    $_SESSION['success'] = "Login efetuado com sucesso";
    logaUsuario($usuario["nome"]);
    
    header("Location: home.php");   
}
die();

?>