<?php
error_reporting("E_NOTICE");
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