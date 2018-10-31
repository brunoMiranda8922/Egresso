<?php

function alunos($conexao)
{
    $lista = array();
    $query = "SELECT RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.ano_id = AN.id INNER JOIN semestres AS S ON A.semestre_id = S.id INNER JOIN cidades AS CI ON A.cidade_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id ORDER BY ano DESC";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado)) {
        $lista[] = $row;
    }
    return $lista;
}

?>