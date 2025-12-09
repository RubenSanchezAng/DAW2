<?php
session_start();

$_SESSION["nombre"] = $_POST['nombre'];
$_SESSION["valor"] = $_POST["valor"];
$_SESSION["valor"] += 10;
echo $_SESSION["nombre"].' se ha gastado '. $_SESSION['valor'] . '$ <br>';
?>
<a href="./final.php">Sigue sumando</a>
