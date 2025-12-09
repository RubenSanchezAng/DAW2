<?php
session_start();

 $correos = [];
 $fitxer=fopen("datos.ex", "r");
    while(!feof($fitxer)){
        $i=0;
       $persona = fgets($fitxer);
       $persona = strtolower($persona);
       $nombresCompletos = explode(" ", $persona);
        $correo = "";
        for ($i=0; $i < count($nombresCompletos); $i++) { 
            if($i == 0){
                $primeraLetra = $nombresCompletos[0];
                $correo = $correo . $primeraLetra[0];
            }else{
                $correo = $correo . $nombresCompletos[$i];

            }
        }
        $correo = $correo . "@iesfuentesanluis.org";
        array_push($correos, $correo);
    }
    fclose($fitxer);


    $fp = fopen('emails.jul', 'a');
    foreach ($correos as $correoCreado) {
        echo $correoCreado . "<br>";
        fwrite($fp, $correoCreado);
        fwrite($fp, ",");
    }
    fclose($fp);
?>