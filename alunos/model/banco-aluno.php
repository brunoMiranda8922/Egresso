<?php
require_once("verificar-usuario.php");

function gerarQRCODE($conexao)
{
    $id = $_SESSION['id'];
    $respostas = array();
    $query = "SELECT A.id, RA, nome, cpf, email, telefone, foto, curso, ano, semestre, cidade, status FROM alunos AS A INNER JOIN cursos AS C ON A.cursos_id = C.id
                INNER JOIN anos AS AN ON A.anos_id = AN.id INNER JOIN semestres AS S ON A.semestres_id = S.id INNER JOIN cidades AS CI ON A.cidades_id = CI.id
                    INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE A.id = {$id} ORDER BY ano DESC, semestre DESC, A.id DESC";
    $resultado = mysqli_query($conexao, $query);
    while ($row = mysqli_fetch_assoc($resultado))
    {
        $respostas[] = $row;
    }
    return $respostas;
}

function qrCode($conexao)
{
    $code = gerarQRCODE($conexao);
    foreach($code as $resp) {
        $qr =  "../../qr_img0.50j/php/qr_img.php?";
        $qr .= "d={$resp['nome']},{$resp['RA']},{$resp['curso']},{$resp['cpf']},{$resp['email']},{$resp['id']}&";
        $qr .= "e=H&";
        $qr .= "s=4&";
        $qr .= "t=P";
        ?>

        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                    <span class="badge badge-pill badge-primary"> <?= $resp['nome']?></span>
                    Seu qrCode é necessário para poder efetuar sua entrada na faculdade!
                </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                    <img class="card-img-top" src="<?= $qr ?>" title="<?= $resp['nome'] ?>"/>
                    <div class="card-body">
                        <h4 class="card-title mb-3"><?= $resp['nome']?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    }
    return $qr;
}


?>
