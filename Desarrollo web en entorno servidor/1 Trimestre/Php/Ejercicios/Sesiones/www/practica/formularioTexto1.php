<?php
session_start();

if(isset($_POST["enviar"])){
    if(!empty($_POST["texto"])){
        $_SESSION["texto"] = $_POST["texto"];
    }
    header('Location: ./formularioTexto.php');
}

if(isset($_POST["vaciar"])){
    session_destroy();
    header('Location: ./formularioTexto.php');
}

?>
<a href="./formularioTexto.php">Volver a la página principal</a>