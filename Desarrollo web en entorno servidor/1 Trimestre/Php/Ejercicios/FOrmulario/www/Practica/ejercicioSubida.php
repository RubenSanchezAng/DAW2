<form enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="TAMANYO_MAXIMO" value="30000">
    Subir Fichero:<input type="file" name="fichero" id="">
    <input type="submit" value="Enviar" name="enviar">
</form>
<?php
    $carpeta = "./subida/";


    if(isset($_POST["borrar"])){
        $archivoBorrado = $_POST["nombre"];
        unlink($carpeta . $archivoBorrado);
        echo "Archivo $archivoBorrado con éxito<br>";
    }
    if(isset($_POST["descargar"])){
        
    }
    if(isset($_POST["enviar"])){
        $archivoGuardado = $carpeta . basename($_FILES["fichero"]["name"]);

        echo "<pre>";

        if(move_uploaded_file($_FILES["fichero"]["tmp_name"], $archivoGuardado)){
            echo "<h3>Archivo subido con éxito</h3>";
        }else{
            echo '<h3  style="color:red">Fallo al subir archivo</h3>';
        }
    }
    $carpetaAux = $carpeta;
    $listaArchivos = array_slice(scandir($carpetaAux),2);
    foreach($listaArchivos as $archivo){
        echo $archivo;
        echo "<form action='' method='post'>
                <input type='hidden' value='$archivo' name='nombre'>
                <input type='submit' value='Borrar' name='borrar'>
                <input type='submit' value='Descargar' name='descargar'>
              </form>";

        echo "<img src='./subida/$archivo' width='100px' height='100px'> <br>";
    }
?>