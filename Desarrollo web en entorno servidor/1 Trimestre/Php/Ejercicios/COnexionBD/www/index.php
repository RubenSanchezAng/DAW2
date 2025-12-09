<?php
include "conexion.php";

if(isset($_POST["insertar"])){
    $nombre = $_POST["nombre"] ?? "Pepito";    
    $date = $_POST["fecha"] ?? "23/12/2006";         
    $numero = $_POST["numero"] ?? 0;

    $sql = "INSERT INTO ejercicio(nombre, fecha, numero) VALUES (:nombre, :fecha, :numero)";

    $sentencia = $conexion->prepare($sql);              
    $sentencia->bindParam(":nombre", $nombre);            
    $sentencia->bindParam(":fecha", $date);
    $sentencia->bindParam(":numero", $numero);
    $isOk = $sentencia->execute();                        

    $idGenerado = $conexion->lastInsertId();     
    echo $idGenerado;
}
if(isset($_POST["datos"])){
    $sql = "select * from ejercicio";

    $sentencia = $conexion -> prepare($sql);
    $sentencia -> setFetchMode(PDO::FETCH_ASSOC);
    $sentencia -> execute();

    $i =1;
    echo "<table>";
    echo "<tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Número</th>
    </tr>";

    while($fila = $sentencia->fetch()){   
        echo "<tr>";   
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td>" . $fila["fecha"] . "</td>";
        echo "<td>" . $fila["numero"] . "</td>";
        echo "</tr>";   
    }
    echo "</table>";
}
?>
<form action="" method="post">
    <input type="text" name="nombre" id="nombre" placeholder="nombre"><br>
    <input type="date" name="fecha" id="fecha" placeholder="fecha"><br>
    <input type="number" name="numero" id="numero" placeholder="Numero"><br>
    <input type="submit" value="Insertar" name="insertar"><br>
    <input type="submit" value="Ver datos" name="datos"><br>
</form>

<style>
    td{
        border: 1px solid black;
    }
    tr th{
        border: 1px solid black;
    }
</style>

