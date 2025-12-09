 <!-- Ejercicio de formulario
<?php
    echo "<h1>Datos del formulario</h1>";

    echo "<h3>Nombre:</h3>";
    echo $_POST["nombre"];

    echo "<h3>Apellido:</h3>";
    echo $_POST["apellido"];

    echo "<h3>COntraseña:</h3>";
    echo $_POST["contraseña"];

    echo "<h3>Rol colegio:</h3>";
    echo $_POST["colegio"];

    echo "<h3>Gustos:</h3>";
    foreach ($_POST["curso"] as $key => $curso) {
        echo $curso ."<br>";
    }

    echo "<h3>Genero:</h3>";
    echo $_POST["genero"];

    echo "<h3>Edad:</h3>";
    echo $_POST["edad"];

    echo "<h3>Comentarios:</h3>";
    echo $_POST["comentario"];

    echo "<h3>Color:</h3>";
    $color = $_POST["color"];
    echo '<p style="background-color: $color; width: 80px; height: 20px">$color</p>';

    echo "<h3>Oculto:</h3>";
    echo $_POST["oculto"];
?>


<?php
    $suma = $_POST["numero1"] + $_POST["numero2"];
    echo "La suma de {$_POST["numero1"]} y {$_POST["numero2"]} es {$suma}";
?> 
-->

<?php
 if(isset($_POST["boton"])){
    $suma = 0;
    foreach ($_POST["valores"] as $key => $numeros) {
        $suma += $numeros;
    }
    echo 'La suma de los numeros es '. $suma;
 }
 echo '<form action= "" method ="post">';
 for ($i=0; $i < 10 ; $i++) { 
      echo '<input type="number" name="valores[]"><br>';
 }
 echo '<input type= "submit" name="boton" value="enviar">';
 echo "<form/>";
?>