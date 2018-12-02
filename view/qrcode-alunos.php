<?php
require_once("cabecalho.php");
require_once("../model/conexao.php");
require_once("../model/funcoes.2.php");
error_reporting("E_NOTICE");
qrCode($conexao);
require_once("rodape.php")
?>