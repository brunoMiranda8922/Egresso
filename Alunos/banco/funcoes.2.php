<?php require_once("banco/conexao.php");
require_once("verificar-usuario.php");


function cadastrarQuestionario($conexao, $trabalha, $empresa, $area, $cargo, $formacao, $cronograma, $professores, $intra, $recomendaria, $sexo, $estagio, $semestre, $id) 
{
    $query = "insert into formulario_aluno(trabalha, empresa, area_trabalho, cargo, formacao, cronograma, professores, infraestrutura, recomendaria, sexo, estagio, semestre, egressos_id) 
                values({$trabalha}, '{$empresa}', $area, '{$cargo}', '{$formacao}', '{$cronograma}', '{$professores}', '{$intra}', '{$recomendaria}', '{$sexo}', {$estagio}, '{$semestre}', {$id})";
    return mysqli_query($conexao, $query);   
}

function listarRespostas($conexao) 
{
    $id = $_SESSION['id'];
    $respostas = array();
    $query = "SELECT e.RA,e.nome, a.nome AS area, f.* FROM formulario_aluno AS f INNER JOIN egressos AS e ON e.id  = f.egressos_id LEFT JOIN area_curso as a ON f.area_trabalho = a.area_curso_id
                WHERE f.egressos_id = $id GROUP BY f.id";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;
    }
    return $respostas;
}
function paginarTrabalha($conexao)
{
    $alunos          = array();
    $pagina          = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if(!isset($_GET['trabalha']) || empty($_GET['trabalha'])) {
        $_GET['trabalha'] = '1||trabalha=0';
    }
    
    $nao = $_GET['trabalha'];
    $sim = $_GET['trabalha'];
    $indiferente = $_GET['trabalha'];
    $id = $_SESSION['id'];
    
    $query = "SELECT e.RA, e.nome, a.nome AS area, f.* FROM formulario_aluno AS f INNER JOIN egressos AS e ON e.id  = f.egressos_id LEFT JOIN area_curso as a ON f.area_trabalho = a.area_curso_id
            WHERE (f.trabalha = $nao OR f.trabalha = $sim OR f.trabalha LIKE '$indiferente') AND f.egressos_id = $id GROUP BY f.id";
    $resultado = mysqli_query($conexao, $query);
    
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 6;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    return $numero_pagina;
    
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