<?php require_once("cabecalho.php"); //Pagina que gera o qrCode dinamico. 
require_once("banco/conexao.php");
require_once("banco/funcoes.2.php");
qrCode($conexao);
require_once("rodape.php") ?>