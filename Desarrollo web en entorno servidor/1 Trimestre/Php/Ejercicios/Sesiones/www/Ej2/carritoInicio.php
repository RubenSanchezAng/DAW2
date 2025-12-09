<?php
session_start();
?>
<form action="" method="post">
    <p>Tele</p>
    <p>precio: 100 euros</p>
    <input type="number" name="tele" id="" min=0 value=0>
    <input type="submit" name="enviar" value="comprar">
    <p>ratón</p>
    <p>precio: 5 euros</p>
    <input type="number" name="raton" id="" min=0 value=0>
    <input type="submit" name="enviar" value="comprar">
    <p>teclado</p>
    <p>precio: 10 euros</p>
    <input type="number" name="teclado" id="" min=0 value=0>
    <input type="submit" name="enviar" value="comprar">
    <p>cpu</p>
    <p>precio: 200 euros</p>
    <input type="number" name="cpu" id="" min=0 value=0>
    <input type="submit" name="enviar" value="comprar">
    
    <input type="submit" value="Eliminar Secciones" name="eliminar">
</form>

<?php
    if (!isset($_SESSION['tele'])) $_SESSION['tele'] = 0;
    if (!isset($_SESSION['raton'])) $_SESSION['raton'] = 0;
    if (!isset($_SESSION['teclado'])) $_SESSION['teclado'] = 0;
    if (!isset($_SESSION['cpu'])) $_SESSION['cpu'] = 0;
    $enviado = false;
    if(isset($_POST["enviar"])){
       $enviado = true;
    }
    if($enviado){
    $cantTele = $_POST['tele'];
    $cantRaton = $_POST['raton'];
    $cantTeclado = $_POST['teclado'];
    $cantCpu = $_POST['cpu'];

    $_SESSION['tele'] += $cantTele;
    $_SESSION['raton'] += $cantRaton;
    $_SESSION['teclado'] += $cantTeclado;
    $_SESSION['cpu'] += $cantCpu;

    echo '<h1>Factura</h1>';
    echo '<h3>Detalles</h3>';
    
    echo 'Televisiones -> '.$_SESSION['tele'] ."<br>";
    echo '<form action="" method= "post">
            <input type="submit" name="borrarTele" value="borrar">
          </form>';
    echo 'Ratones -> '.$_SESSION['raton'] ."<br>";
    echo '<form action="" method= "post">
            <input type="submit" name="borrarRaton" value="borrar">
          </form>';
    echo 'Teclados -> '.$_SESSION['teclado'] ."<br>";
    echo '<form action="" method= "post">
            <input type="submit" name="borrarTeclado" value="borrar">
          </form>';
    echo 'CPu -> '.$_SESSION['cpu'] . "<br>";
    echo '<form action="" method= "post">
            <input type="submit" name="borrarCpu" value="borrar">
          </form>';

    $precioTotal = $_SESSION['tele'] * 100 
    + $_SESSION['raton'] * 5 
    + $_SESSION['teclado'] * 10 
    + $_SESSION['cpu'] * 200 ;

    echo "<h4>Precio ".$precioTotal . "</h4>";
}
 if(isset($_POST['borrarTele'])){
            unset($_SESSION['tele']);
            
 }
 if(isset($_POST['borrarRaton'])){
            unset($_SESSION['raton']);
 } 
 if(isset($_POST['borrarCpu'])){
            unset($_SESSION['cpu']);
 }
  if(isset($_POST['borrarTeclado'])){
            unset($_SESSION['teclado']);
 }
if(isset($_POST['eliminar'])){
    $_SESSION = array();
    echo "Sesiones cerradas";
}
?>