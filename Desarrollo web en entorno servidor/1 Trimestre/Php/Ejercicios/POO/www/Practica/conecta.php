<?php
    class Conecta{
        private array $array;
        private int $player;
        
        public function __construct(){
            $this->array = [[],[],[],[],[],[],[]];
            $this->player = rand(1,2);
        }
        
        public function cambiarJugador() : void{
            if($this->player == 1){
                $this->player = 2;
            }else{
                $this->player = 1;
            }
        }
        
        public function comprobarTamanyoColumna($columna) : bool{
            $llena = false;
            if(count($this->array[$columna]) > 5){
                $llena = true;
           } 
           return $llena;
        }

        public function insertarValor($columna) : void{
            if($this->comprobarTamanyoColumna($columna) == true){
                echo "<h1 style='color: red'>Esa columna está llena</h1>";
            }else{
                $this->array[$columna][] = $this->player;
                
                $this->cambiarJugador();
            }
        }

        public function getValores() : array{
            return $this->array;
        }

        public function getPlayer(){
                return $this->player;
        }

        public function comprobarEmpate() : bool{
            $empate = true;
            for ($i=0; $i <count($this->array) ; $i++) { 
                if(count($this->array[$i]) < 6){
                    $empate = false;
                }
            }
            return $empate;
        }
        public function comprobarVictoriaVertical(int $jugador) : bool{
            $victoria = false;
            for ($i=0; $i < count($this->array) ; $i++) { 
                $contador = 0;
                for ($j=0; $j < count($this->array[$i]) ; $j++) { 
                    if($jugador == $this->array[$i][$j]){
                        $contador++;
                        if($contador == 4){
                            $victoria = true;
                        }
                    }else if($contador < 4){
                        $contador = 0;
                    }
                }                
            }
            return $victoria;
        }

        public function comprobarVictoriaHorizontal(int $jugador) : bool{
            $victoria = false;
            for ($i=0; $i < 6 ; $i++) { 
                $contador = 0;
                for ($j=0; $j < 7 ; $j++) { 
                    if(isset($this->array[$j][$i])){
                        if($jugador ==$this->array[$j][$i]){
                            $contador++;
                            if($contador == 4){
                                $victoria = true;
                            }
                        }else{
                            $contador = 0;
                        }
                    }
                }
            }
            return $victoria;
        }
    }
?>

