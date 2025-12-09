<?php
class Empleado{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
   
    public function __constructor(string $nombre, string $apellidos, float $sueldo){
        $this -> nombre = $nombre;
        $this -> apellidos = $apellidos;
        $this -> sueldo = $sueldo;
    }

    public function setNombre(string $nombre): void{
        $this -> nombre = $nombre;
    }
    
    public function setApellido(string $apellidos): void{
        $this -> apellidos = $apellidos;
    }
    public function setSueldo(string $sueldo): void{
        $this -> sueldo = $sueldo;
    }
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getSueldo(): float {
        return $this->sueldo;
    }
    public function getNombreCompleto(): string {
        return $this->nombre . " " . $this->apellidos;
    }

    public function debePagarImpuestos(): bool {
        return $this->sueldo > 3333;
    }
}
?>