<?php
header('Content-Type: application/json');
require_once('database.php');
require_once('Producto.php');

//LLamada a la función según parámetro introducido
if($_GET['opcion'] == 'mostrar'){
    echo json_encode(obtenerProductoPorNombre($_GET['producto']));
}elseif($_GET['opcion'] == 'insertar'){
    echo json_encode(insertarProducto($_GET['idProducto'], $_GET['producto'], $_GET['stock'], $_GET['precio']));
}else{
    echo json_encode(error("Falta poner parámetros."));
}

//Muestra mensaje de error
function error($mensaje){
    $respuesta = array(
        "tipo" => "error",
        "mensaje" => $mensaje
    );
    return $respuesta;
}

//Devuelve la URL correcta
function url($segmento){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }else{
        $protocol = "http";
    }
    return $protocol."://".$_SERVER['HTTP_HOST'].$segmento;

}

//Devuelve los datos del producto y su URL introduciendo el nombre del mismo
function obtenerProductoPorNombre($nombre){
    $producto = array();
    $db = Database::conexionBD();

    $result = $db->prepare("SELECT * FROM productos WHERE producto = :nombre");
    $result->bindParam(':nombre', $nombre);
    $result->execute();

    $db = Database::desconectarBD();

    foreach($result->fetchAll(PDO::FETCH_ASSOC) as $fila){
        $producto = array(
            "idProducto" => $fila['idProducto'],
            "producto" => $fila['producto'],
            "stock" => $fila['stock'],
            "precio" => $fila['precio'],
            "link" => url("/API_productos.php?opcion=mostrar&producto=".$fila['producto'])
        );
    }
    return $producto;

}

//Devuelve los datos y la URL del producto que se acaba de insertar en la BD
function insertarProducto($id, $nombre, $stock, $precio){
    $db = Database::conexionBD();

    $result = $db->prepare("INSERT INTO productos (idProducto, producto, stock, precio) VALUES (:idProd, :prod, :stock, :precio)");
    $result->bindParam(':idProd', $id);
    $result->bindParam(':prod', $nombre);
    $result->bindParam(':stock', $stock);
    $result->bindParam(':precio', $precio);
    $result->execute();

    $db = Database::desconectarBD();

    return "Producto introducido en la BD";

}


?>