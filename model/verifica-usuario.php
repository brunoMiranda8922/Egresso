<?php

@session_start();
function usuarioEstaLogado()
{
    return isset($_SESSION["Usuario_logado"]);
}

function usuarioLogado()
{
    return $_SESSION["Usuario_logado"];
}

function logaUsuario($email)
{
    $_SESSION["Usuario_logado"] = $email;
}

function logout()
{
    session_destroy();
    session_start();
}

?>