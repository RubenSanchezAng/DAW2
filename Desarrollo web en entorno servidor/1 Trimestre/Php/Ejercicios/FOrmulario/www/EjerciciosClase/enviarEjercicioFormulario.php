<?php
/********************************************************************
 *              APUNTES DEL SISTEMA DE SUBIDA Y BORRADO
 ********************************************************************
 * 1. $carpetaSubidas → carpeta donde se guardan las imágenes
 * 2. Si se envía $_POST["foto"] → se borra la imagen
 * 3. Si se envía $_POST["boton"] → se sube la imagen
 * 4. scandir() lee todas las imágenes de la carpeta
 * 5. Se muestran todas en una tabla con botón de borrar
 ********************************************************************/

// 1️⃣ Carpeta donde se guardan las imágenes
$carpetaSubidas = './imagenes/';

/********************************************************************
 * 2️⃣ BORRAR UNA IMAGEN
 ********************************************************************/
if (isset($_POST['foto'])) {

    $nombreFoto = $_POST['foto'];                 // Nombre de la foto a borrar
    $rutaFotoBorrar = $carpetaSubidas . $nombreFoto; // Ruta completa

    unlink($rutaFotoBorrar); // Borra el archivo del servidor
}

/********************************************************************
 * 3️⃣ SUBIR UNA IMAGEN
 ********************************************************************/
if (isset($_POST["boton"])) {

    // Ruta completa donde se va a guardar la imagen
    $rutaSubida = $carpetaSubidas . basename($_FILES["fichero"]["name"]);

    echo "<pre>";

    // Mover fichero desde la carpeta temporal al servidor
    if (move_uploaded_file($_FILES['fichero']['tmp_name'], $rutaSubida)) {

        echo "El fichero es válido y se subió con éxito.\n";

    } else {

        echo "⚠️ ¡Posible ataque por carga de ficheros!\n";
    }

    echo "Información de depuración:\n";
    print_r($_FILES);

    echo "</pre>";
}

/********************************************************************
 * 4️⃣ LEER TODOS LOS ARCHIVOS DE LA CARPETA
 ********************************************************************/
$carpeta = $carpetaSubidas;
$listaArchivos = array_slice(scandir($carpeta), 2); // Quitamos . y ..

/********************************************************************
 * 5️⃣ MOSTRAR TODAS LAS FOTOS EN UNA TABLA
 ********************************************************************/
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Fotos guardadas</th><th>Acciones</th></tr>";

foreach ($listaArchivos as $foto) {

    echo "<tr>";

    // Mostrar la imagen
    echo "<td><img src='./imagenes/$foto' width='100'></td>";

    // Botón para borrarla
    echo "<td>";
    echo "<form action='' method='post'>";
    echo "<button type='submit' name='foto' value='$foto'>Borrar</button>";
    echo "</form>";
    echo "</td>";

    echo "</tr>";
}

echo "</table>";

?>

<!-- FORMULARIO DE SUBIDA -->
<form enctype="multipart/form-data" action="" method="post">
    Suba una imagen:
    <input type="file" name="fichero">
    <button type="submit" name="boton">Subir archivo</button>
</form>
