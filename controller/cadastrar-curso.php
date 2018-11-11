<?php
error_reporting("E_NOTICE");
require_once("../model/conexao.php");
require_once("../model/mostrar-alerta.php");
require_once("../model/banco-curso.php");

$nome = $_POST['curso'];

if (inserirCurso($conexao, $nome))
{
    $_SESSION["success"] = "Curso cadastrado com sucesso";
    header("Location: ../view/curso.php");
} else {
    $_SESSION["danger"] = "Erro ao cadastrado Curso";
    header("Location: ../view/curso.php");
}
?>