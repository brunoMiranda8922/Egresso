<?php require_once("cabecalho.php");
require_once("banco/conexao.php");


function gerarQRCODE($conexao) 
{
    $respostas = array();
    $query = "SELECT DISTINCT  f.id, f.RA, f.cpf, f.nome, f.email, c.nome AS curso, ano_formacao AS ano, 
    data_semestre AS semestre, ci.nome AS cidade, f.PR from egressos AS f INNER JOIN cursos AS c ON f.cursos_id = c.id
        INNER JOIN ano ON f.ano_id = ano.id INNER JOIN semestre ON f.semestre_id = semestre.id INNER JOIN cidade AS ci ON f.cidade_id = ci.id
            ";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;

    }
    return $respostas;

}

?>

<div class="main-content">
    
        
        
        

    
<?php
$code = gerarQRCODE($conexao);
foreach($code as $resp) { 
    $qr =  "qr_img0.50j/php/qr_img.php?";
    $qr .= "d={$resp['nome']},{$resp['curso']},{$resp['ano']},{$resp['email']},{$resp['PR']}&";
    $qr .= "e=H&";
    $qr .= "s=4&";
    $qr .= "t=P";
?>

            <div class="section__content section__content--p30">
            <div class="row">
                <div class="col-md-4">
                <div class="card">
                <img class="card-img-top" src="<?= $qr ?>" title="<?= $resp['nome'] ?>"/>
                <div class="card-body">
                    <h4 class="card-title mb-3"><?= $resp['nome']?></h4>
                    <p class="card-text">
                     <a href="http://php.net/"></a></p>

                </div>
                <div class="modal-footer">
                    
                    <a href="pdf/php.pdf" type="button" role="button" class="btn btn-primary"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
}
?>
<?php include("rodape.php") ?>