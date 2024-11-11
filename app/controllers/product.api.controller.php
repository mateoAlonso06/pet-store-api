<?php
require_once './app/models/product.model.php';
require_once './app/models/proveedor.model.php';
require_once './app/models/categoria.model.php';
require_once './app/views/json.view.php';

class ProductApiController {
    private $model;
    private $view;
    private $proveedorModel;
    private $categoriaModel;

    public function __construct() {
        $this->model = new ProductModel();
        $this->proveedorModel = new ProveedorModel();
        $this->categoriaModel = new CategoriaModel();
        $this->view = new JSONView();
    }

    public function getAll() {
        $productos = $this->model->getProducts();
        $this->view->response($productos);
    }

    public function get($req, $res) {
        $id = $req->params->id;

        $product = $this->model->getProduct($id);

        if (!$product) {
            return $this->view->response("No encontrado", 404);
        }

        return $this->view->response($product);
    }

    //Obtegno un json con todos los productos desde la bd
    public function getAllProducts($req, $res){
        $products = $this->model->getAllProducts();

        if (!$products) {
            return $this->view->response("No encontrado", 404);
        }

        return $this->view->response($products);
    }

    //Eliminar un producto
    public function deleteProduct($req,$res){
        $id = $req->params->id:

        $product = $this->model->getProduct($id);

        if (!$product){
            return $this->view->response("El producto con el id=$id no existe", 404);
        }


        $this->model->deleteProduct($id);
        $this->view->response("Se eliminó el producto con id=$id");
    }

    //inserto un producto
    public function insertProduct($req,$res){
        $id_categoria = $req->body->id_categoria;
        $nombre = $req->body->nombre;
        $descripcion = $req->body->descripcion;
        $precio = $req->body->precio;
        $peso_neto = $req->body->peso_neto;
        $fecha_empaquetado = $req->body->$fecha_empaquetado;
        $fecha_vencimiento = $req->body->$fecha_vencimiento;
        $stock = $req->body->stock;
        $id_proveedor = $req->body->$id_proveedor;

        if (empty($id_categoria) || empty($nombre) || empty($descripcion) || empty($precio) || empty($peso_neto)
            || empty($fecha_empaquetado) || empty($fecha_vencimiento) || empty($stock) || empty ($id_proveedor))
        {
            return $this->view->response("Faltan completar datos", 400);
        }

        $id = $this->model->insertProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, 
                                          $fecha_vencimiento, $stock, $id_categoria);


        if(!$id){
            return $this->view->response("Error al insertar el producto", 500);
        } else { //devuelvo el producto insertado
            $product = $this->model->getProduct($id);
            return $this->view->response($product, 201);
        }
    }

    public function editProduct($req, $res){
        
        $id = $req->params->id;
        if (!$id){
            return $this->view->response("El producto con el id=$id no existe", 404);
        }

        $id_categoria = $req->body->id_categoria;
        $nombre = $req->body->nombre;
        $descripcion = $req->body->descripcion;
        $precio = $req->body->precio;
        $peso_neto = $req->body->peso_neto;
        $fecha_empaquetado = $req->body->$fecha_empaquetado;
        $fecha_vencimiento = $req->body->$fecha_vencimiento;
        $stock = $req->body->stock;
        $id_proveedor = $req->body->$id_proveedor;

        if (empty($id_categoria) || empty($nombre) || empty($descripcion) || empty($precio) || empty($peso_neto)
            || empty($fecha_empaquetado) || empty($fecha_vencimiento) || empty($stock) || empty ($id_proveedor))
        {
            return $this->view->response("Faltan completar datos", 400);
        }

        $this->model->updateProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, 
                                    $fecha_vencimiento, $stock, $id_proveedor);
        $product = $this->model->getProduct($id);
        return $this->view->response($product, 200);
    }
}