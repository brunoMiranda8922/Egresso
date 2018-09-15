<?php require_once("conexao.php");
function inserirAlunoDeNovo($conexao, $RA, $nome, $email, $PR, $curso_id, $ano_id, $semestre_id, $cidade_id)
{
    $query = "insert into egressos(RA, nome, email, PR, cursos_id, ano_id, semestre_id, cidade_id) 
            values({$RA}, {$nome}', '{$email}', {$PR}, {$curso_id}, {$ano_id}, {$semestre_id}, {$cidade_id})";
    return mysqli_query($conexao, $query);
}

function listarAlunos($conexao) {   
    $alunos = array();
    $query = "select distinct RA, f.nome, c.nome as curso, ano_formacao as ano, data_semestre as semestre, f.cidade, f.PR 
            from egressos as f inner join cursos as c on f.cursos_id = c.id inner join ano on f.ano_id = ano.id
            inner join semestre on f.semestre_id = semestre.id";
    $resultado = mysqli_query($conexao, $query);
    while ($aluno = mysqli_fetch_assoc($resultado)) {
            
    }
    return $alunos;
}

function removerAlunos($conexao, $id){
    $query = "delete from egressos where id = {$id}";
    return mysqli_query($conexao, $query);

}

function alterarAluno($conexao, $RA){
    $query = "select * from egressos where RA = {$RA}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
    
}

function atualizarAluno($conexao, $RA, $nome, $cidade, $email, $PR, $curso_id, $ano_id, $semestre_id){ 
    $query = "update egressos set nome = '{$nome}', cidade = '{$cidade}', email = '{$email}', PR = {$PR},
            cursos_id = {$curso_id}, ano_id = {$ano_id}, semestre_id = {$semestre_id} where RA = {$RA}";
    $atualizar = mysqli_query($conexao, $query);
    return $atualizar; 
}
?>


