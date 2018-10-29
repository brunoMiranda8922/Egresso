<?php  
require_once("banco/conexao.php"); //Função que deleta um Registro da base.
require_once("banco/deletarDados.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/verifica-usuario.php");
error_reporting("E_NOTICE");
$id = $_POST['id'];

removerAlunos($conexao, $id);
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$_SESSION["success"] = "Aluno removido id: ".$id;

header("Location: comercioExterior.php?pagina=$pagina");
die();



?>
