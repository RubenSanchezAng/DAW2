<?php
session_start();
if(isset($_SESSION["tiempo"])){
    if($_SESSION["tiempo"] < time()){
        $_SESSION["cerrada"] = true;
        header('Location: ./login.php');
    }
}
if($_SESSION["rol"] == "ROLE_ALUMNO"){
    echo "<h3>Hola ".$_SESSION['nombre']."</h3>";
    echo "<ul>
            <li>Mates</li>
            <li>fisica</li>
          </ul>";
}else{
    echo "<h1>Hola ".$_SESSION['nombre']."</h1>";
}

?>
<form action="login.php" method="post">
    <input type="submit" value="logout" name="volver">
</form>

