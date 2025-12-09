<form enctype=multipart/form-data action="" method="post">
Subir fotos <input type="file" name="fichero" id="">
<input type="submit" value="Subir" name="subir">
</form>

<?php
$carpeta = "./img/";
if(isset($_POST["borrar"])){
    unlink($carpeta.$_POST["archivo"]);
    echo "Borrada con exito";
}
if(isset($_POST["subir"])){
    $archivoDestino = $carpeta . basename($_FILES["fichero"]["name"]);
    echo "<pre>";
    if($_FILES["fichero"]["type"]== "image/png"){
        if(move_uploaded_file($_FILES["fichero"]["tmp_name"], $archivoDestino)){
            echo "Subido con exito <br>";
        }else
            echo "Error <br>";
    }else{
        echo "Tiene que ser una foto <br>";
    }
    print_r($_FILES);
    echo "</pre>";
}
 $carpetaLista = $carpeta;
    $archivos = array_slice(scandir($carpetaLista),2);
    foreach ($archivos as $archivo) {
        echo $archivo . '<form action ="" method="POST">
        <input type="hidden" value = "'.$archivo.'"name="archivo">
        <input type="submit" value="borrar"name="borrar"></form>';    
        echo "<img src='./img/$archivo' height='50px' width='50px'>";
    }

?>