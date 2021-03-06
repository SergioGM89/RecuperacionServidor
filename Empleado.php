<?php
abstract class Empleado{
    protected $nombre;
    protected $apellidos;
    protected $dni;
    protected $direccion;
    protected $anyosAntiguedad;
    protected $tlf;
    protected $salario;

    public function __construct($nombre, $apellidos, $dni, $direccion, $anyosAntiguedad, $tlf, $salario){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->anyosAntiguedad = $anyosAntiguedad;
        $this->tlf = $tlf;
        $this->salario = $salario;
    }

    public function imprimir(){
        echo "Nombre: ".$this->nombre."<br>";
        echo "Apellidos: ".$this->apellidos."<br>";
        echo "DNI: ".$this->dni."<br>";
        echo "Dirección: ".$this->direccion."<br>";
        echo "Años de antigüedad: ".$this->anyosAntiguedad."<br>";
        echo "Teléfono: ".$this->tlf."<br>";
        echo "Salario: ".$this->salario."<br>";
    }

    abstract public function calculaSalario();
}


?>