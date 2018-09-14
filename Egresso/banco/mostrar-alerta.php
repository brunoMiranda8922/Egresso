
<?php
@session_start();
function mostrarAlerta($tipo){
    if(isset($_SESSION[$tipo])){
?>


   <center><div class="alert alert-<?= $tipo ?>" role="alert"> <h4> <small><?=$_SESSION[$tipo]?></small></h4> <a href="./index.php" class="alert-link">Saiba mais</a> </div></center>

    <script>
        setTimeout(function() { document.getElementsByClassName('alert-danger')[0]);
        setTimeout(function() { document.getElementsByClassName('alert-success')[0].remove(); }, 3000);
    </script>
<?php
        unset($_SESSION[$tipo]);
    }
}?>
