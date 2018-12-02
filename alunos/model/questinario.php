<?php 
require_once("verificar-usuario.php");


function cadastrarQuestionario($conexao, $trabalha, $empresa, $cargo, $area, $formacao, $cronograma, $professores, $infra, $recomendaria, $sexo, $estagio, $ausencia, $id) 
{
    $query = "INSERT INTO questionario(trabalha, empresa, cargo, areas, formacao, cronograma, professores, infraestrutura, recomendaria, sexo, estagio, ausencia, alunos_id) 
                VALUES({$trabalha}, '{$empresa}', '{$cargo}', $area, '{$formacao}', '{$cronograma}', '{$professores}', '{$infra}', '{$recomendaria}', '{$sexo}', {$estagio}, '{$ausencia}', {$id})";
    return mysqli_query($conexao, $query);   
}

function listarRespostas($conexao) 
{
    $id = $_SESSION['id'];
    $respostas = array();
    $query = "SELECT A.RA, A.nome, AR.area AS area, Q.* FROM questionario AS Q INNER JOIN alunos AS A ON A.id  = Q.alunos_id LEFT JOIN areas AS AR ON Q.areas = AR.area
                WHERE Q.alunos_id = $id GROUP BY Q.id";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;
    }
    return $respostas;
}

function mudarRespostas($conexao) 
{
    $id = $_SESSION['id'];
    $query = "SELECT * FROM formulario_aluno WHERE egressos_id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
    
}

function atualizarFeed($conexao, $id, $trabalha, $empresa, $area, $cargo){ 
    $query = "UPDATE formulario_aluno SET trabalha = {$trabalha} AND empresa = '{$empresa}'
            AND area_trabalho = {$area} AND cargo = '{$cargo}' WHERE id = {$id}";
    $atualizar = mysqli_query($conexao, $query);
    return $atualizar; 
}



?>