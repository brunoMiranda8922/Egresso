<?php 

function buscarEgresso($conexao, $emailEgresso, $cpf)
{   
    
    $query = "SELECT * FROM egressos WHERE email = '{$emailEgresso}' AND cpf = '{$cpf}'";
    $resultado = mysqli_query($conexao, $query);
    $egressos = mysqli_fetch_assoc($resultado);
    
    return $egressos;
}


?>