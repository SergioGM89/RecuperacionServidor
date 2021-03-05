<?php
class Producto{
    private $idProducto;
    private $producto;
    private $stock;
    private $precio;

    public function __construct($idProducto, $producto, $stock, $precio){
        $this->idProducto = $idProducto;
        $this->producto = $producto;
        $this->stock = $stock;
        $this->precio = $precio;
    }
    
    public function getIdProducto(){
        return $this->idProducto;
    }    
    
    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
        return $this;
    }

    public function getProducto(){
        return $this->producto;
    }    
    
    public function setProducto($producto){
        $this->producto = $producto;
        return $this;
    }

    public function getStock(){
        return $this->stock;
    }    
    
    public function setStock($stock){
        $this->stock = $stock;
        return $this;
    }

    public function getPrecio(){
        return $this->precio;
    }    
    
    public function setPrecio($precio){
        $this->precio = $precio;
        return $this;
    }

}

?>