<?php
require_once('Empleado.php');

class Vendedor extends Empleado{
    private $movil;
    private $areaVenta;
    private $comisiones;

    public function __construct($nombre, $apellidos, $dni, $direccion, $anyosAntiguedad, $tlf, $salario, $movil, $areaVenta, $comisiones){
        parent::__construct($nombre, $apellidos, $dni, $direccion, $anyosAntiguedad, $tlf, $salario);
        $this->movil = $movil;
        $this->areaVenta = $areaVenta;
        $this->comisiones = $comisiones;
    }

    public function imprimir(){
        parent::imprimir();
        echo "Móvil: ".$this->movil."<br>";
        echo "Área de venta: ".$this->areaVenta."<br>";
        echo "Porcentaje de venta: ".$this->comisiones."%<br>";
    }

    public function calculaSalario(){
        $sueldo = $this->salario + ($this->salario * 0.1 * $this->anyosAntiguedad);
        return $sueldo;
    }
}


?>