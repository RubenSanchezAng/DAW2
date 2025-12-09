<?php
session_start();
ob_start();
?>
<form action="" method="post">
    <input type="text" name="dato" id=""><br>
    <input type="number" name="cantidad" id="" min=0 value=0>
    <input type="submit" name="enviar"><br>
    <input type="checkbox" name="recordar" id="">Recordar Carrito <br>
    <input type="submit" name="vaciar" value="Vaciar la lista"><br>
</form>

<?php
echo "<body style='color:black>";
if(!isset($_SESSION["dato"])){
    $_SESSION["dato"]=[];
}else{
foreach ($_SESSION["dato"] as $articulo => $cantidad) {
   if(isset($_POST[$articulo])){
        unset($_SESSION["dato"][$articulo]);
   }
}
}

if(isset($_POST["enviar"])){
    $elemento = $_POST["dato"];
    if(!isset($_SESSION["dato"][$elemento])){
        $_SESSION["dato"][$elemento]= $_POST["cantidad"];
    }else{
        $_SESSION["dato"][$elemento] += $_POST["cantidad"];

    }
    echo "<ul>";
    foreach ($_SESSION["dato"] as $articulo => $cantidad) {
        echo "<li>$articulo : $cantidad";
        echo "<form action='' method='post'>
                <input type='submit' name='$articulo' value= 'borrar'>
            </form>";
        echo "</li>";
    }
    echo "</ul>";
}
if(isset($_POST["vaciar"])){
    echo "Lista borrada";
    session_destroy();
}
if(isset($_POST["recordar"])){
    setcookie("datos", $_SESSION["dato"], time()+ 120);
    print_r($_COOKIE["datos"]);
}


echo "</>";



?>