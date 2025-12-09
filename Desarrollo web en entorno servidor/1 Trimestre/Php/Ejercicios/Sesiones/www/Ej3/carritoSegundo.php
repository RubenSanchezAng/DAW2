<?php
session_start();
?>

<form action="" method="post">
    <p>Nombre del producto:</p>
    <input type="text" name="producto">

    <p>Cantidad:</p>
    <input type="number" name="cantidad" min="1" value="1">

    <input type="submit" name="agregar" value="Agregar">
    <input type="submit" name="vaciar" value="Vaciar Lista">
</form>

<?php
    if(!isset($_SESSION["lista"])){
        $_SESSION["lista"] = [];
    }
        
    foreach ($_SESSION["lista"] as $producto => $cantidad) {
        if(isset($_POST[$producto])) {
            unset($_SESSION["lista"][$producto]);
        }
    }
    if(isset($_POST["agregar"])){
        $dato = $_POST["producto"];
        $cantidad = $_POST["cantidad"];

        if(isset($_SESSION["lista"][$dato])){
                $_SESSION["lista"][$dato] += $cantidad;
            } else {
                $_SESSION["lista"][$dato] = $cantidad;
        }
    }
        echo "<form action= '' method= 'post'>";
        foreach ($_SESSION["lista"] as $clave => $valor) {
            echo "<p> $clave : $valor</p>";
            echo "<input type=submit name=$clave value=Borrar>";
        }
        echo "</form>";
        if(isset($_POST["vaciar"])){
            $_SESSION["lista"] = [];
        }
    
?>
