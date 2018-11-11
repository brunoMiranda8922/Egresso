<?php require_once("conexao.php");
function listarAnos($conexao) {
    $lista = array();
    $query = "SELECT a.ano_formacao AS ano, COUNT(e.RA) AS alunos FROM egressos AS e INNER JOIN
                  ano AS a ON e.ano_id = a.id WHERE cursos_id= 1   GROUP BY a.ano_formacao DESC";
    $resultado = mysqli_query($conexao,$query);
    while($row = mysqli_fetch_assoc($resultado)){
        $lista[] = $row;
  
    }
    return $lista; 
}
?>