<?php
$uploaddir = './imagenes/';
$uploadfile = $uploaddir . basename($_FILES['fichero']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['fichero']['tmp_name'], $uploadfile)) {
    echo "El fichero es válido, y ha sido cargado con éxito. Aquí hay más información :\n";
} else {
    echo "Ataque potencial por carga de ficheros. Aquí hay más información :\n";
}
echo 'Aquí hay algunas informaciones de depuración :';
print_r($_FILES);
foreach($_FILES as $key => $valor){
    echo "Tipo de archivo subido ".$valor["type"] . "<br>";
    echo 'Tamaño de archivo '.$valor["size"] .  "<br>";

}
echo '</pre>';

?>