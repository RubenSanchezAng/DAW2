<?php
session_start();
 $valores = []; 

if(!isset($_SESSION["monedas"])){
    $_SESSION["monedas"] = 0;
}

if(isset($_POST["moneda"])){
    $_SESSION["monedas"] += 1;
}

if(isset($_POST["jugar"])){
    if( $_SESSION["monedas"] > 0){
        $_SESSION["monedas"] -= 1;
        $auxNum;
        $ganador = true;

        for ($i=0; $i < 3; $i++) { 
            $valor = rand(1,5);
            array_push($valores, $valor);
            $auxNum = $valor;
        }
        foreach ($valores as $dato) {

            if($auxNum != $dato){
                $ganador = false;
            }
        switch ($dato) {
            case 1:
                echo "<img src='1.svg' width=50px height=50px>";
                break;
            case 2:
                echo "<img src='2.svg' width=50px height=50px>";
            break; 
            case 3:
                echo "<img src='3.svg' width=50px height=50px>";
            break; 
            case 4:
                echo "<img src='4.svg' width=50px height=50px>";
            break; 
            case 5:
                echo "<img src='5.svg' width=50px height=50px>";
            break;
        }
        }
        if($ganador){
            echo "<h1 style='color:green'>Has ganado</h1>";
        }
    }else{
        echo "<h1 style='color:red'>No tienes suficientes monedas</h1>";

    }

}
?>

<form action="" method="post">
    <input type="submit" value="Meter moneda" name="moneda"><br>
    <p><?=$_SESSION["monedas"]?></p><br>
    <input type="submit" value="Jugar" name="jugar"><br>
</form>
