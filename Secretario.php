<?php
require_once('Empleado.php');

class Secretario extends Empleado{
    private $despacho;
    private $fax;

    public function __construct($nombre, $apellidos, $dni, $direccion, $anyosAntiguedad, $tlf, $salario, $despacho, $fax){
        parent::__construct($nombre, $apellidos, $dni, $direccion, $anyosAntiguedad, $tlf, $salario);
        $this->despacho = $despacho;
        $this->fax = $fax;
    }

    public function imprimir(){
        parent::imprimir();
        echo "Despacho: ".$this->despacho."<br>";
        echo "Fax: ".$this->fax."<br>";
    }

    public function calculaSalario(){
        $sueldo = $this->salario + ($this->salario * 0.05 * $this->anyosAntiguedad);
        return $sueldo;
    }
}


?>