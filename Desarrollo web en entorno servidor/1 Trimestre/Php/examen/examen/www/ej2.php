<?php
session_start();
$posicionInicial = 1;
$posicionFinal = 20;


if(!isset($_SESSION["posicion"])){
    $_SESSION["posicion"] = $posicionInicial;
    $_SESSION["caballo"][$_SESSION["posicion"]] = "&#9816";
    
}

if(isset($_POST["correr"])){
    $recorre = rand(1,4);
    if($_SESSION["posicion"] + $recorre > $posicionFinal){
        echo "<h1 style='color:green'>Has ganado</h1>";
        $_SESSION["caballo"][$_SESSION["posicion"]] = "";
        $_SESSION["posicion"] = $posicionInicial;
        $_SESSION["caballo"][$_SESSION["posicion"]] = "&#9816";
    }else{
     $_SESSION["caballo"][$_SESSION["posicion"]] = "";
     $_SESSION["posicion"] += $recorre;
     $_SESSION["caballo"][$_SESSION["posicion"]] = "&#9816";

    }
    echo $_SESSION["posicion"];


}
if(isset($_POST["reset"])){
    $_SESSION["caballo"][$_SESSION["posicion"]] = "";
    $_SESSION["posicion"] = $posicionInicial;
    $_SESSION["caballo"][$_SESSION["posicion"]] = "&#9816";
}
print_r($_SESSION["caballo"][$_SESSION["posicion"]]);
echo "<table>";
for ($i=1; $i < 21; $i++) { 
    echo "<td>";
    if($_SESSION["posicion"]== $i){
        echo  $_SESSION["caballo"][$_SESSION["posicion"]];
    }
    echo "</td>";
}
echo "</table>";


?>
<style>

    td{
        border: 2px solid black;
        width: 25px;
        height:25px;
    }
</style>
<form action="" method="post">
    <input type="submit" value="correr" name="correr">
    <input type="submit" value="reset" name="reset"><br>
    <input type="submit" value="Borrar sesion" name="borrar">
</form>

<?php
//Solo es para llevar un control
if(isset($_POST["borrar"])){
    echo "a";
    session_destroy();
}
?>
