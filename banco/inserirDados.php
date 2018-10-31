<?php

function inserirAluno($conexao, $RA, $nome, $CPF, $email, $telefone, $foto, $curso_id, $ano_id, $semestre_id, $cidade_id, $matricula_id)
{
    $query = "INSERT INTO alunos(RA, nome, cpf, email, telefone, foto, cursos_id, anos_id, semestres_id, cidades_id, matricula_id)
                VALUES({$RA}, '{$nome}', '{$CPF}', '{$email}', '{$telefone}', '{$foto}', '{$curso_id}', '{$ano_id}', '{$semestre_id}',
                    '{$cidade_id}', '{$matricula_id}')";
    return mysqli_query($conexao, $query);
}

?>