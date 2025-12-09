<?php
session_start();
$tamañoIn = 0;
$aumento = 10;
if(!isset($_SESSION["azul"])){
  $_SESSION["azul"] = $tamañoIn;
}
if(!isset($_SESSION["rojo"])){
  $_SESSION["rojo"] = $tamañoIn;
}
if(isset($_POST["voto"])){
    if($_POST["voto"]== "azul"){
        $_SESSION["azul"] += $aumento;

    }
    if($_POST["voto"]== "rojo"){
        $_SESSION["rojo"] += $aumento;
    }
    if($_POST["voto"]== "cero"){
        $_SESSION["rojo"] = $tamañoIn;
        $_SESSION["azul"] = $tamañoIn;

    }
}
?>
<style>
    .contenedor-azul{
        display: flex;
        width: 100%;
        height:50px;
    }
    .franja-azul{
        background-color: blue;
        height:50px;
        width: <?= $_SESSION["azul"]?>px;   
    }
    .contenedor-rojo{
        display: flex;
        width: 100%;
        height:50px;
    }
    .franja-roja{
        background-color: red;
        height:50px;
        width: <?php echo $_SESSION["rojo"]?>px;   
    }
</style>
<form action="" method="post">

<div class="contenedor-azul">
    <button type="submit" name="voto" value="azul">+</button>
    <div class="franja-azul"></div>
</div>

<div class="contenedor-rojo">
    <button type="submit" name="voto" value="rojo">+</button>
    <div class="franja franja-roja"></div>
</div>

    <button type="submit" name="voto" value="cero">Reiniciar</button><br>
</form>
