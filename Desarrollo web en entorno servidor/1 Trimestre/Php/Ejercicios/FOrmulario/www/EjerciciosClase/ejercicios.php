<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Primer ejercicio FOrmulario grande 
    <form action="enviarEjercicios.php" method="post">
        <h3>Datos personales</h3>
        <input type="text" name="nombre" id="" placeholder= "nombre"> 
        <input type="text" name="apellido" id="" placeholder= "apellido"> 
        <input type="password" name="contraseña" id="" placeholder= "contraseña"> 
        <h3>Rol</h3>
        <select name="colegio" id="">
            <option value="alumno">Alumno</option>
            <option value="profesor">Profesor</option>
        </select> <br>
        <h3>Cursos</h3>
        <input type="checkbox" name="curso[]" value="daw" /> daw <br/>
        <input type="checkbox" name="curso[]" value="asir" /> asir<br/>
        <input type="checkbox" name="curso[]" value="smr" /> smr<br/>
        <input type="checkbox" name="curso[]" value="universidad" /> universidad <br/>
        <h3>Genero:</h3>
        <input type="radio" name="genero"value = "Masculino"> M<br>
        <input type="radio" name="genero"value = "Femeninio"> F<br>
        <h3>Edad</h3>
        <input type="number" name="edad" min="18" max="99">
        <h3>Comentarios</h3>
        <textarea name="comentario" id=""></textarea>
        <h3>Color</h3>
        <input type="color" name="color" id="">
        <h3>Oculto</h3>
        <input type="hidden" name="oculto" value="oculto">

        <input type="submit" name="boton" value="enviar">
    </form>

     <!-- Segundo ejercicio
     <form action="enviarEjercicios.php" method="post">
        <input type="number" name="numero1" id="">
        <input type="number" name="numero2" id="">
        <input type="submit" name="boton" value="enviar">
     </form> 
     -->
     
     <!--Formulario y Vectores* -->
     
</body>
</html>