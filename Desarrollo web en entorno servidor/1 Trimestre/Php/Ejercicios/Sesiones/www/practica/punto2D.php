<?php
session_start();
$posicionMax = 200;
$posicionMin= -200;
$posicionInicial = 0;
$movimiento = 20;
if(!isset($_SESSION["posicionX"])){
    $_SESSION["posicionX"] = $posicionInicial;
}
if(!isset($_SESSION["posicionY"])){
    $_SESSION["posicionY"] = $posicionInicial;
}
if(isset($_POST["arriba"]) ||isset($_POST["abajo"])|| isset($_POST["izquierda"])|| isset($_POST["derecha"])){
 
    if(isset($_POST["arriba"])){
       if($_SESSION["posicionY"] - $movimiento < $posicionMin){
         $_SESSION["posicionY"] = $posicionMax;
       }else{
        $_SESSION["posicionY"] -= $movimiento;
       }
    }
    if(isset($_POST["abajo"])){
       if($_SESSION["posicionY"] + $movimiento > $posicionMax){
         $_SESSION["posicionY"] = $posicionMin;
       }else{
        $_SESSION["posicionY"] += $movimiento;
       }
    }
    if(isset($_POST["izquierda"])){
       if($_SESSION["posicionX"] - $movimiento < $posicionMin){
         $_SESSION["posicionX"] = $posicionMax;
       }else{
        $_SESSION["posicionX"] -= $movimiento;
       }
    }
    if(isset($_POST["derecha"])){
       if($_SESSION["posicionX"] + $movimiento > $posicionMax){
         $_SESSION["posicionX"] = $posicionMin;
       }else{
        $_SESSION["posicionX"] += $movimiento;
       }
    }
}
if(isset($_POST["centro"])){
    $_SESSION["posicionY"] = $posicionInicial;
    $_SESSION["posicionX"] = $posicionInicial;
}
 $posicionX = $_SESSION["posicionX"] + (400/2);
 $posicionY = $_SESSION["posicionY"] + (400/2);
  echo "Y:" . $_SESSION["posicionY"];
 echo  "<br>X:" . $_SESSION["posicionX"]; 
?>

<style>
    body{
        text-align:center;
    }
    input{
        margin: 10px auto;
    }
    .contenedor{
        height: 400px;
        width: 400px;
        border: 1px solid black;
        position: relative;
        margin: 5px auto;
    }
    .punto{
        height: 20px;
        width: 20px;
        background-color: red;
        border-radius: 50%;
        position: absolute;
        left: <?= $posicionX ?>px;
        top: <?= $posicionY ?>px;
    }
</style>
<form action="" method="post">
    <input type="submit" value="Arriba" name="arriba"><br>
    <input type="submit" value="Izquierda" name="izquierda">
    <input type="submit" value="Centro" name="centro">
    <input type="submit" value="Derecha" name="derecha"><br>
    <input type="submit" value="Abajo" name="abajo">

    <div class="contenedor">
        <div class="punto"></div>
    </div>
</form>