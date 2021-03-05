<?php
require_once('ProductoCrud.php');
$todo = new ProductoCrud();
$prod = new Producto(4, "Cocacola", 10, 1.50);
var_dump($todo->getProductos());
var_dump($todo->getProducto(2));
echo "<br><br>";
//echo "".$todo->insertar($prod);
//echo "".$todo->actualizar($prod);
//echo "".$todo->eliminar(3);


?>