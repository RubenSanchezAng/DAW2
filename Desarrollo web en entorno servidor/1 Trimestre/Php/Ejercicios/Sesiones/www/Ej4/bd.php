<?php
session_start();
ob_start();

$usuarios=[ ['usuario'=>'estefania','password'=>'1111', 'nombre'=>'Estefania Maestre','rol'=>'ROLE_ALUMNO'],

 ['usuario'=>'julio','password'=>'2222', 'nombre'=>'Julio Noguera','rol'=>'ROLE_PROFE'],

 ['usuario'=>'jose','password'=>'4444', 'nombre'=>'José Vicente','rol'=>'ROLE_ALUMNO'],

 ['usuario'=>'ana','password'=>'333', 'nombre'=>'Ana Fuertes','rol'=>'ROLE_ALUMNO'],

 ['usuario'=>'admin','password'=>'999', 'nombre'=>'Administrador','rol'=>'ROLE_PROFE'],

];

 if(empty($_POST["nombre"]) || empty($_POST["contrasena"])){
     $_SESSION["vacio"] = true;
     header('Location: ./login.php');

  }else{
    $_SESSION["vacio"] = false;
    
    $i = 0;
    $encontrado = false;
    while($i < count($usuarios) && !$encontrado){
        if($usuarios[$i]["usuario"] == $_POST["nombre"]){
            if($usuarios[$i]["password"] == $_POST["contrasena"]){
                $encontrado = true;
                $nombreUsuario = $_POST["nombre"];
                $rolUsuario = $usuarios[$i]["rol"];

            }
            
        }
        $i++;
    }
    if($encontrado == false){
        $_SESSION["incorrecto"] = true;
        header('Location: ./login.php');

    }else{
        $_SESSION["incorrecto"] = false;
        $_SESSION["nombre"] = $nombreUsuario;
        $_SESSION["rol"] = $rolUsuario;
        if($_SESSION["rol"] == "ROLE_ALUMNO"){
            $_SESSION["tiempo"] = time() + 30;
        }else
            $_SESSION["tiempo"] = time() +60;


        header('Location: ./menu.php');
        
        if(isset($_POST["recordar"])){
            setcookie("nombre",$_SESSION["nombre"], time()+ 3600);
        }

    }


 }
  


    
 

?>