<?php
require_once("banco/mostrar-alerta.php");

system("mysqldump -u bruno fatec > /var/www/html/projeto/Egresso/backup/backup.sql");
system("mysqldump -u bruno fatec > ../../../../../home/bruno/Área\ de\ Trabalho/backup.sql");
$_SESSION["success"] = "Backup Efetuado com Sucesso";
header("Location: home.php");

?>