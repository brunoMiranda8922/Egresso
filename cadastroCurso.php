<?php error_reporting("E_NOTICE"); //Arquivo com função de inserir um novo curso na base de dados.
require_once("banco/conexao.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/banco-curso.php");

$nome = $_POST['curso'];

if (inserirCurso($conexao, $nome)) 
{
    $_SESSION["success"] = "Curso cadastrado com sucesso";
    header("Location: curso.php");
} else {
    $_SESSION["danger"] = "Erro ao cadastrado Curso";
    header("Location: curso.php");
}
?>