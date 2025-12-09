<?php
session_start();

$_SESSION["valor"] += 10;
echo $_SESSION["nombre"].' se ha gastado '. $_SESSION['valor'] . '$ <br>';
session_destroy();

?>
<a href="./inicio.php">Volver al inicio</a>
