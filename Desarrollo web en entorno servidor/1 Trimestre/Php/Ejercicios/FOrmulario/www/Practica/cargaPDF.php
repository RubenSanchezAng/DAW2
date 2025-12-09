<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de PDFs</title>
</head>
<body>

<h1>Gestión de PDFs</h1>

<!-- Formulario para subir archivos PDF y buscar por nombre -->
<form enctype="multipart/form-data" action="" method="post">
    Añada un PDF: <input type="file" name="fichero">
    <input type="submit" value="Subir" name="subir">
    <input type="text" name="buscar" placeholder="Buscar por nombre">
    <input type="submit" value="Buscar" name="botonBuscar">
</form>

<?php
$carpeta = "./pdf/";

// ---------------------------------------------------------------
// 1️⃣ BORRAR ARCHIVOS
// ---------------------------------------------------------------
if(isset($_POST['borrar'])) {
    $archivoBorrar = $_POST['borrar'];
        unlink($carpeta . $archivoBorrar);
        echo "<p>Archivo '$archivoBorrar' borrado con éxito.</p>";
    
}

// ---------------------------------------------------------------
// 2️⃣ SUBIR ARCHIVOS
// ---------------------------------------------------------------
if(isset($_POST["subir"])) {
    $archivoDestino = $carpeta . basename($_FILES["fichero"]["name"]);

    echo "<pre>";

    if($_FILES["fichero"]["type"] == "application/pdf") {
        if(move_uploaded_file($_FILES["fichero"]["tmp_name"], $archivoDestino)) {
            echo "PDF subido con éxito.<br>";
        } else {
            echo "Error al subir el PDF.<br>";
        }
    } else {
        echo "Solo se pueden subir archivos PDF.<br>";
    }

    print_r($_FILES);
    echo "</pre>";
}

// ---------------------------------------------------------------
// 3️⃣ LISTAR ARCHIVOS
// ---------------------------------------------------------------
$listaArchivos = array_slice(scandir($carpeta), 2);

if(isset($_POST["botonBuscar"]) && !empty($_POST["buscar"])) {
    $terminoBusqueda = $_POST["buscar"];
    $listaArchivos = array_filter($listaArchivos, function($archivo) use ($terminoBusqueda) {
        return str_contains($archivo, $terminoBusqueda);
    });
}

// Mostramos los archivos con botones funcionales
foreach ($listaArchivos as $archivo) {
    echo "<p>";
    echo $archivo . " ";

    // Formulario para ver archivo
    echo '<form style="display:inline;" action="" method="post">';
    echo '<input type="hidden" name="ver" value="'. $archivo .'">';
    echo '<input type="submit" value="Ver">';
    echo '</form> ';

    // Formulario para borrar archivo
    echo '<form style="display:inline;" action="" method="post">';
    echo '<input type="hidden" name="borrar" value="'. $archivo .'">';
    echo '<input type="submit" value="Borrar">';
    echo '</form>';
    echo "</p>";

    // -----------------------------------------------------------
    // 4️⃣ VER ARCHIVOS
    // -----------------------------------------------------------
    if(isset($_POST["ver"]) && $_POST["ver"] == $archivo) {
        echo "<embed src='".$carpeta.$archivo."' type='application/pdf' width='600' height='400'>";
    }
}

?>
</body>
</html>
