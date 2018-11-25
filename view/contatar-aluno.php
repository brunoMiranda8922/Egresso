<?php
require_once("cabecalho.php");
require_once("../model/conexao.php");
require_once("../model/mostrar-alerta.php");
error_reporting("E_NOTICE");
?>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header">Formulario de Contato</div>
                                <div class="card-body card-block">
                                <form action="../controller/envia-contato.php" method="POST" autocomplete="off" class="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </div>
                                            <input type="text" id="username" name="nome" placeholder="Remetente" class="form-control" autofocus required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                            <input type="text" id="email" name="email" placeholder="Email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-file-text"></i>
                                            </div>
                                            <textarea name="mensagem" id="textarea-input" rows="9" placeholder="Mensagem..." class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-success btn-sm">Enviar</button>
                                    </div>
                                </form>
                            </div>
                            <?php mostrarAlerta('success') ?>
                            <?php mostrarAlerta('danger') ?>
                        </div>
                    </div>
                </div>
<?php require_once("rodape.php"); ?>