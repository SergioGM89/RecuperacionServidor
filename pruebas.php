<?php
require_once('ProductoCrud.php');
require_once('Vendedor.php');
require_once('Secretario.php');

$todo = new ProductoCrud();
$prod = new Producto(4, "Cocacola", 10, 1.50);
var_dump($todo->getProductos());
var_dump($todo->getProducto(2));
echo "<br><br>";
//echo "".$todo->insertar($prod);
//echo "".$todo->actualizar($prod);
//echo "".$todo->eliminar(3);

$vendedor = new Vendedor("Juan", "Rodríguez", "85000318J", "C/ Riu Serpis, 36, pta 8", 2, 645400874, 1120, 645400874, "Levante", 10);
$vendedor->imprimir();
echo "".$vendedor->calculaSalario();

$secretario = new Secretario("Miguel", "Antón", "789456852A", "C/ Riu Segura, 5, pta 2", 5, 6789412532, 1520, "planta 2", 963223601);
$secretario->imprimir();
echo "".$secretario->calculaSalario();

?>