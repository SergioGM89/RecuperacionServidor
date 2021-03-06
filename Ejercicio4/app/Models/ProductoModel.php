<?php
namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model{
    protected $table = 'productos';

    public function getProductos(){
        return $this->findAll();
    }
}

?>