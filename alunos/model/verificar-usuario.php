<?php
 @session_start(); 
function usuarioEstaLogado() {
    return isset($_SESSION["Usuario_logado"]) && $_SESSION["Usuario_logado"] == true;

}


function usuarioLogado() {
    return $_SESSION['email'];
    
    
}

function usuarioLogadoId() {
    return $_SESSION['id'];
    
    
}



function logarUsuario($usuario) {
    $_SESSION["Usuario_logado"] = true;
    $_SESSION['email'] = $usuario['email'];
    $_SESSION['nome'] = $usuario['nome'];
    $_SESSION['id'] = $usuario['id'];
    
}

function logout() {
    session_destroy();
    session_start();
}
?>