<?php error_reporting("E_NOTICE");

$trabalha = $_POST['trabalha'];
$empresa = $_POST['empresa'];
$area = $_POST['area'];
$cargo = $_POST['cargo'];
$formacao = $_POST['formacao'];
$cronograma = $_POST['cronograma'];
$professores = $_POST['professores'];
$intra = $_POST['infra'];
$recomendaria = $_POST['recomendaria'];
$sexo = $_POST['sexo'];
$estagio = $_POST['estagio'];
$semestre = $_POST['semestre'];

if (empty($trabalha))
{
    echo "Não";
} else { 
    echo $trabalha."\n";
}
if(empty($empresa)) 
{
    echo "Não Esta trabalhando\n";
} else {
    echo $empresa."\n";
}

if(empty($area)) 
{
    echo "#\n";
} else { 
    echo $area."\n";
}

if(empty($cargo)) 
{
    echo "#\n";
} else { 
    echo $cargo."\n";
}

if($estagio == "1")
{
    echo "Sim\n";
} else {
    echo "Não";
}

if($sexo == "1")
{ 
    echo "Masculino\n";
} else { 
    echo "Femino";

}


die;

if (cadastrarQuestionario($conexao,$trabalha,$empresa,$area,$cargo, $formacao, $cronograma, $professores, $intra, $recomendaria )) 
{ ?>
    <div class="alert text-dark text-center"> Questionario Enviado <?= $intra ?> com sucesso. </div>
<?php } else {
        $msg = mysqli_error($conexao);    
        
?>
    <div class="alert text-danger text-center"> Erro ao cadastrar Aluno(a): <?= $msg ?> </div>
<?php    
    }
    mysqli_close($conexao);
?>   
 </div>
