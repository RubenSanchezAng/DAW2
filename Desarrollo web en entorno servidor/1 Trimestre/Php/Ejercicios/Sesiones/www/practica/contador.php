<?php
session_start();

if(!isset($_SESSION["num"])){
    $_SESSION["num"] = 0;
}
if(isset($_POST["mas"])){
    $_SESSION["num"] += 1;
}
if(isset($_POST["menos"])){
    $_SESSION["num"] -= 1;
}
if(isset($_POST["cero"])){
    $_SESSION["num"] = 0;
}
?>
<form action="" method="post">
    <input type="submit" name="menos" value="-">
    <?php
        echo "<p> ".$_SESSION['num'] ."</p>";
        
    ?>
    <input type="submit" name="mas" value="+"><br>
    <input type="submit" name="cero" value="Poner a cero">
</form>
