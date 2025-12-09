<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-mQ93j7w4Mb9w3p9QJ0G+e0Qk9e1WZfFdF1MGxA2r9F9z9f0XlKZ0FhZf9Kx0Z0yZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Qw3D2kYz0P5F+6F5Q9G7pF6F8B9G4B6F6P5F6B9F6B9F6F6P5F6B9F6B9F6B9F6F" crossorigin="anonymous"></script>
  </head>
  <body>


  <form enctype="multipart/form-data" action="subir.php" method="post">
    <!-- El nombre del elemento input determina el nombre en el array $_FILES -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />

    Envíe este fichero: <input name="fichero" type="file" />
    <input type="submit" value="Enviar el fichero" />
  </form>













  <!-- <?php 
  //  if(isset($_POST["boton"])){
  //   $numero1 = $_POST["numero1"];
  //   $numero2 = $_POST["numero2"];
  //   echo $numero1 . " ". $numero2;
  //  }
   
  ?>
    <form action="" method="POST">
        <input type="text" name="numero1" id=""/><br/>
        <input type="text" name="numero2" id=""/><br/>

    <input type="submit" name="boton" value="boton">
    </form> -->
  </body>
</html>
