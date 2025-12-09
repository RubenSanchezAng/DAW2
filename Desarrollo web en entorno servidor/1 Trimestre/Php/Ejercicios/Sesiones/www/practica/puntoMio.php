<?php
session_start();
    $posicionInicio = 0;
    $posicionMax = 300;
    $posicionMin = -300;
    $movimiento = 20;
    if(!isset($_SESSION["posicion"])){
        $_SESSION["posicion"] = $posicionInicio;
    }
    if(isset($_POST["izquierda"]) || isset($_POST["derecha"])){
        if(isset($_POST["izquierda"])){
            if(($_SESSION["posicion"] - $movimiento) < $posicionMin){
                $_SESSION["posicion"] = $posicionMax - $movimiento;
            }else{
                $_SESSION["posicion"] -= $movimiento;
            }
        }
            

        if(isset($_POST["derecha"])){
            if(($_SESSION["posicion"] + $movimiento) > $posicionMax){
                $_SESSION["posicion"] = $posicionMin + $movimiento;
            }else{
                $_SESSION["posicion"] += $movimiento;
            }
        }
    }
    if(isset($_POST["centro"])){
        $_SESSION["posicion"] = $posicionInicio;
    }

    $posicion = $_SESSION['posicion'] + (600 / 2);
    echo $_SESSION['posicion'] ;
?>
<style>
    body{
        text-align: center;

    }
    .linea{
        
        width: 600px;
        height: 10px;
        background-color: black;
        position: relative;
        margin:20px auto;
    }
    .punto{
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color:red;
        position: absolute;
        left: <?= $posicion ?>px;
    }
</style>
<form action="" method="post">
    <input type="submit" value="<-" name="izquierda">
    <input type="submit" value="->" name="derecha">
    <div class="linea">
        <div class="punto"></div>
    </div>
    <input type="submit" value="Poner en el centro" name="centro">    
</form>