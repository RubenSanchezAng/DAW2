<?php
session_start();
include "conecta.php";

if(!isset($_SESSION["conecta"])){
    $conecta = new Conecta();
    $_SESSION["conecta"] = serialize($conecta);
}
$objeto = unserialize($_SESSION["conecta"]);

function tabla(){
    
    echo "<table>";
    echo '<tr><form method="post">';
    for($j=0;$j<7;$j++){
        echo '<td><button type="submit" name="boton" value="'.$j.'">+</button></td>';
    }
    echo '</form></tr>';
    for ($i=5; $i >= 0; $i--) { 
        echo "<tr>";
        for ($j=0; $j < 7; $j++) { 
            if(isset($_SESSION["array"][$j][$i])){
                if($_SESSION["array"][$j][$i] == 1){
                    echo "<td style='background-color:red'></td>";
                }else if($_SESSION["array"][$j][$i] == 2){
                    echo "<td style='background-color:yellow'></td>";
                }
            }else{
                echo "<td style='background-color:white'></td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}
if(isset($_POST["boton"])){
    $jugador = $objeto->getPlayer();

    $objeto->insertarValor($_POST["boton"]);
    $_SESSION["conecta"] = serialize($objeto);
    $_SESSION["array"] = $objeto->getValores();  
    
    if ($objeto->comprobarEmpate()) {
        echo "<h1>Habeis empatado</h1>";
        session_destroy();
    } else {
        if ($objeto->comprobarVictoriaVertical($jugador) || $objeto->comprobarVictoriaHorizontal($jugador)) {
            if($jugador == 1){
                echo "<h1 style='color:green'>Enhorabuena has ganado color rojo</h1>";
            }else{
                echo "<h1 style='color:green'>Enhorabuena has ganado color amarillo</h1>";
            }

            session_destroy();
        } else {
            echo "Seguir jugando";
        }
    }
}

tabla();

?>
<style>
    table{
        height: 350px;
        width: 350px;
        background-color: blue;
    }
    td{
        height: 50px;
        width: 50px;
        border: 1px solid black;
        background-color: white;
        border-radius: 50%;
    }
    button{
        height: 50px;
        width: 50px;
        background-color: white;
        border: 0px solid black;
        align-items: center;
        border-radius: 50%;

    }

</style>
