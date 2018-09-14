<?php
$conexao = mysqli_connect("localhost", "username", "password", "database");
$_SESSION['danger']= NULL;
$_SESSION['respostaBD']= NULL;
if(!$conexao) {
  $_SESSION['respostaBD']= "conexao_erro";
  $_SESSION['danger']= "Erro ao conectar com o servidor :";

  /*echo $_SESSION['resultadoBD'];*/
}
/*else {
    echo "conexao_ok";
  }*/
?>
