<?php
session_start();
?>
<style>
    form{
        border: 1px solid black;
        width: 200px;
        height: 150px;
    }
</style>

<form action="bd.php" method="post">
    <input type="text" name="nombre" id="" placeholder= "nombre" value= "<?php if(isset($_COOKIE['nombre']))echo $_COOKIE['nombre'] ?>"><br>
    <input type="password" name="contrasena" id="" placeholder= "contraseña"><br>
    Recordar <input type="checkbox" name="recordar" id=""><br>
    <input type="submit" value="Enviar" name="boton">
</form>
<?php
        if((isset($_SESSION["vacio"]))){
            if($_SESSION["vacio"] == true){
                echo '<h1 style="color:red"> Usuario o contraseña vacios</h1>';
            }
        }
        if((isset($_SESSION["incorrecto"]))){
            if($_SESSION["incorrecto"] == true){
                echo '<h1 style="color:red"> Usuario o contraseña incorrectos</h1>';
            }
        }
        if((isset($_SESSION["cerrada"]))){
            if($_SESSION["cerrada"]== true){
                echo '<h1>Se ha cerrado la sesión</h1>';
            }           
        }
        
        

        unset($_SESSION["vacio"]);
        unset($_SESSION["incorrecto"]);
        unset($_SESSION["cerrada"]);


?>

