<?php
namespace App\Controllers;

use App\Models\ProductoModel;
use CodeIgniter\Controller;

class ProductosController extends Controller{

    public function index(){
        $model = new ProductoModel();
        $data = [
            'listaProd' => $model->getProductos()
        ];
    
        echo view('listado', $data);
    }

}


?>