<?php
require_once("../model/mostrar-alerta.php");

system("mysqldump -u bruno evasao > /var/www/html/APP/projeto-v2-1/backup/backup.sql");
system("mysqldump -u bruno evasao > ../../../../../../home/bruno/Área\ de\ Trabalho/backup.sql");
$_SESSION["success"] = "Backup Efetuado com Sucesso";
header("Location: ../view/home.php");

?>