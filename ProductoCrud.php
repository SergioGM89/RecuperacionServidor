<?php
require_once('database.php');
require_once('Producto.php');

class ProductoCrud{

    //Devuelve un array con todos los productos
    public function getProductos(){
       
        $db = Database::conexionBD();

        $sql = "SELECT * FROM productos";
        $results = $db->query($sql);

        $db = Database::desconectarBD();

        return $results->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getProducto($id)
    {

        $db = Database::conexionBD();

        $sql = "SELECT * FROM productos WHERE idProducto = :id";
        $query = $db->prepare($sql);

        //Enlazamos los parámetros
        $query->bindValue(':id', $id);

        $query->execute();
        $results = $query->fetch(PDO::FETCH_ASSOC);

        $db = Database::desconectarBD();

        $producto = new Producto($results['idProducto'], $results['producto'], $results['stock'], $results['precio']);

        return $producto;
    }

    //Inserta un nuevo producto en la BD
    public static function insertar($producto)
    {

        //Pasamos los datos del producto a variables
        $idProducto = $producto->getIdProducto();
        $prod = $producto->getProducto();
        $stock = $producto->getStock();
        $precio = $producto->getPrecio();

        $db = Database::conexionBD();

        $sql = "INSERT INTO productos (idProducto, producto, stock, precio) VALUES (:idProd, :prod, :stock, :precio)";
        $query = $db->prepare($sql);

        //Enlazamos los parámetros
        $query->bindValue(':idProd', $idProducto);
        $query->bindValue(':prod', $prod);
        $query->bindValue(':stock', $stock);
        $query->bindValue(':precio', $precio);

        $query->execute();
        $filas_insertadas = $query->rowCount();

        $db = Database::desconectarBD();

        return $filas_insertadas;//Devolvemos el nº de filas afectadas
    }

    //Borra un producto de la BD
    public static function eliminar($id)
    {

        $db = Database::conexionBD();

        $sql = "DELETE FROM productos where idProducto = $id";
        $query = $db->prepare($sql);
        $query->execute();
        $filas_eliminadas = $query->rowCount();

        $db = Database::desconectarBD();

        return $filas_eliminadas;
    }

    //Actualiza los datos de un producto
    public static function actualizar($producto)
    {

        //Pasamos los datos del producto a variables
        $idProducto = $producto->getIdProducto();
        $prod = $producto->getProducto();
        $stock = $producto->getStock();
        $precio = $producto->getPrecio();

        $db = Database::conexionBD();

        $sql = "UPDATE productos SET producto = :prod, stock = :stock, precio = :precio WHERE idProducto = :idProd";
        $query = $db->prepare($sql);

        //Enlazamos los parámetros
        $query->bindValue(':idProd', $idProducto);
        $query->bindValue(':prod', $prod);
        $query->bindValue(':stock', $stock);
        $query->bindValue(':precio', $precio);

        $query->execute();
        $filas_actualizadas = $query->rowCount();

        $db = Database::desconectarBD();

        return $filas_actualizadas;
    }
    
}

?>
