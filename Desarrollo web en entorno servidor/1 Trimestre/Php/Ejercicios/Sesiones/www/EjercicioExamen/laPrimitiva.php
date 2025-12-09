<?php
session_start();
?>
<style>
    #formulario{
        height: 160px;
        width: 160px;
    }
    #formulario input{
        width: 40px;
    }
</style>
<?php
if(!isset($_SESSION["acumulado"])){
    $_SESSION["acumulado"] = 0;
    $_SESSION["tiradas"] = 0;
    $_SESSION["numeros"] = [];
    for ($i=0; $i < 5; $i++) { 
        $n = rand(1,15);
        // $_SESSION["numero"][]=$n; Otra forma de añadir 
        array_push($_SESSION["numeros"], $n);
    }
}

if(isset($_POST["boton"])){
    if(in_array($_POST["boton"],$_SESSION["numeros"])){
        $_SESSION["tiradas"] += 1;
        $_SESSION["acumulado"] += 1000;
    }else{
        $_SESSION["tiradas"] += 1;
    }
}


echo('<h2>Numeros premiados</h2>');
foreach ($_SESSION["numeros"] as $numero) {
    echo $numero . " ";
}
echo('<h2 style="color:blue">Premios acumulados:'.$_SESSION["acumulado"].'</h2>');
echo('<h2 style="color:blue">Tiradas:'.$_SESSION["tiradas"].'</h2>');

echo '<form action="" method="post" id="formulario">';
    for ($i=0; $i < 16; $i++) { 
        if($i % 4 == 0){
            echo "<br>";
        }
        echo "<input type ='submit' value= '$i' name='boton'>";
    }
    echo '</form>';

    if( $_SESSION["tiradas"] == 5){
        echo "<h1>Has conseguido = ". $_SESSION["acumulado"] ." euros</h1>";
        $_SESSION["acumulado"] = 0;
        $_SESSION["tiradas"] = 0;
        $_SESSION["numeros"] = [];
        for ($i=0; $i < 5; $i++) { 
            $n = rand(1,15);
            array_push($_SESSION["numeros"], $n);
        }
    }
?>

