<?php
session_start();
?>
<form action="formularioTexto1.php" method="post">
    Escribe un texto<input type="text" name="texto" id="">
    <input type="submit" name="enviar">
    <input type="submit" value="borrar" name="vaciar">
</form>

<?php

if(isset($_SESSION["texto"])){
    echo "Último mensaje enviado ". $_SESSION["texto"];
}
?>
