<?php 

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
    
    $query = "SELECT e.RA, e.nome, a.nome AS area, f.* FROM formulario_aluno AS f INNER JOIN egressos AS e ON e.id  = f.egressos_id LEFT JOIN area_curso as a ON f.area_trabalho = a.area_curso_id
            WHERE f.trabalha = $nao OR f.trabalha = $sim OR f.trabalha LIKE '$indiferente' AND  GROUP BY f.id";
    $resultado = mysqli_query($conexao, $query);
    
    $resultado_aluno = mysqli_query($conexao, $query);
    
    $total_alunos = mysqli_num_rows($resultado_aluno);
    
    $quantidade_pagina = 10;
    
    $numero_pagina = ceil($total_alunos / $quantidade_pagina);
    
    return $numero_pagina;
    
}
?>