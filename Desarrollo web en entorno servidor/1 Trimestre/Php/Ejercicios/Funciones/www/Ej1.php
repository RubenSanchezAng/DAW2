<?php

function esPar(int $num) : bool{
  $esPar = false;
  if($num % 2 == 0){
    $esPar = true;
  }

  return $esPar;
}
 if(esPar(5)){
  echo "Par";
 }else{
  echo "No es par";
 }
 echo "<h1>2Ej</h1>";

 function arrayAleatorio (int $tam ,int $a, int $b): array{
  $array = [];
  for ($i=0 ; $i < $tam ; $i++ ) { 
    $array[$i] = rand($a, $b);
  }
  return $array;
 }

 $valores = arrayAleatorio(5,1,10);
 print_r($valores);

 echo "<h1>3Ej</h1>";
 function cantidad(array &$array) : int{
  $array = count($array);
  return $array;
 }

 $a = [1,2,3,4,5];
 print_r ($a);
 cantidad($a);
 echo $a;

 echo "<h1>4Ej</h1>";
 function mayor() : int{
    $array = func_get_args();
    $valor = 0;
    for ($i=0; $i < count($array) ; $i++) { 
      if($valor < $array[$i]){
        $valor = $array[$i];
      }

    }
    return $valor;
 }
 echo mayor(1,3,4,5,7,5,6,8,1);
 
 
 echo "<h1>5Ej</h1>";
 function concatenar(...$palabras) : string{
  $frase = "";
  $array = func_get_args();

    for ($i=0; $i < count($array); $i++) { 
      $frase .= $array[$i]. " ";
    }

    return $frase;
 }

 echo concatenar("a", "e", "i", "o", "u");

 echo "<h1>6Ej</h1>";
 function digitos(int $num): int {
    $num = abs($num);
    $contador = 0;
    if ($num < 10){
      $contador = 1;
    }else{
      while ($num > 0) {
        $num = (int) ($num / 10);
        $contador++;
      }
    }
   
    return $contador;
}

echo digitos(20);

 echo "<h1>7Ej</h1>";

function digitoN($num, $pos) {
    $numStr = "" . $num;        

    return $numStr[$pos];      
}
 echo digitoN(123, 1);
 
 echo "<h1>8Ej</h1>";

 function quitaPorDetras(int $num, int $cant): int {
    return (int)($num / (10 ** $cant)); 
} 

echo quitaPorDetras(123123123, 3);
 
echo "<h1>8Ej</h1>";
function quitaPorDelante(int $num, int $cant): int {
    $numStr = (string) ($num);       
    $numStr = substr($numStr, $cant);   

    return (int) $numStr;
}
echo quitaPorDelante(123123123, 9);

?>