<?php

@session_start();
function mostrarAlerta($tipo){
    if(isset($_SESSION[$tipo])){
?>
   <center><div class="alert-<?= $tipo ?>"> <?=$_SESSION[$tipo]?> </div></center>
    <script>
        setTimeout(function() { document.getElementsByClassName('alert-danger')[0].remove(); }, 3000);
        setTimeout(function() { document.getElementsByClassName('alert-success')[0].remove(); }, 3000);
    </script> 
<?php        
        unset($_SESSION[$tipo]);
    }
}

?>  

