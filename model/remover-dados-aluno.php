<?php

function removerAlunos($conexao, $id)
{
    $query = "DELETE FROM alunos WHERE id = '{$id}'";
    return mysqli_query($conexao, $query);
}

?>