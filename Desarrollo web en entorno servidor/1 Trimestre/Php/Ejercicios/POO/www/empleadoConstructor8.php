<?php
class Empleado{
    private string $nombre;
    private string $apellidos;
    private float $sueldo;
    private array $telefonos = [];
    
    public function __construct(
            string $nombre,
            string $apellidos,
            float $sueldo = 1000,
            array $telefonos = []
        ) {}



    public function debePagarImpuestos(): bool {
        return $this->sueldo > 3333;
    } 
    public function anyadirTelefono(int $telefono): void {
        $this->telefonos[] = $telefono;
    }
    public function listarTelefonos(): string {
        return implode(", ", $this->telefonos);
    }
    public function vaciarTelefonos(): void {
        $this->telefonos = [];
    }

}
?>
