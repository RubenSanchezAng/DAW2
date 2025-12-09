
<form action="" enctype="multipart/form-data" method="post">
    Sube un fichero<input type="file" name="fichero" id="">
    <input type="submit" name="enviar">
</form>
<?php
 $carpeta = "./img/";

 if(isset($_POST["enviar"])){
    $archivo = $carpeta . basename($_FILES["fichero"]["name"]);
    echo '<pre>';
    if(move_uploaded_file($_FILES["fichero"]["tmp_name"],$archivo)){
        echo "Pdf subido";
    }else{
        echo "Error de conexion";
    }
    echo "</pre>";
 }
 $carpetaAux = $carpeta;
 $archivos = array_slice(scandir($carpetaAux),2);
 foreach ($archivos as $archivo) {
    echo $archivo;
    echo "<img src='./img/$archivo' width>";
 }

?>
