<?php
require_once('ProductoCrud.php');
$todo = new ProductoCrud();
$prod = new Producto(6, "Fanta", 35, 1.40);
var_dump($todo->getProductos());
var_dump($todo->getProducto(2));
echo "<br><br>";
echo "".$todo->insertar($prod);


?>