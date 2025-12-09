<?php

if(isset($_POST["dibujar"])){
    $color = $_POST["color"];


    if($_POST["numero"] % 2 == 0){
        echo "<h2>El número es par, no se puede hacer</h2>";
    }else{
        echo "<table>";
        for ($i=0; $i < $_POST["numero"]; $i++) { 
            echo "<tr>";
            for ($j=0; $j < $_POST["numero"]; $j++) { 
                if($i == (floor($_POST["numero"]/2))|| $j == (floor($_POST["numero"]/2))){
                    echo "<td class='centro'></td>";
                }else{
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

   
}


?>

<style>
    td{
        height: 40px;
        width: 40px;
    }
    .centro{
        height: 40px;
        width: 40px;
        background-color: <?=$color?>;
        border-radius:50%;
    }
</style>

<form action="" method="post">
<h2>La cruz</h2>

Tamaño:<input type="number" name="numero" id="" min=1 max=25><br>
Color:<input type="color" name="color" id=""><br>
<input type="submit" value="Dibujar" name="dibujar">

</form>
