<?php require_once("cabecalho.php");
require_once("banco/conexao.php");
require_once("banco/banco-aluno.php");
require_once("banco/banco-curso.php");
require_once("banco/mostrar-alerta.php");
require_once("banco/funcoes.php");
?>

                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">

                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                    

                                        <div class="card-header">Formulario de Contato</div>
                                    <div class="card-body card-block">
                                        <form action="envia-contato.php" method="POST" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="username" name="nome" placeholder="Remetente"  class="form-control" autofocus required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
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