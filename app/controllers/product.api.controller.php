<?php
require_once './app/models/product.model.php';
require_once './app/views/json.view.php';

class ProductApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new JSONView();
    }

    public function getProduct($req, $res) {
        $id = $req->params->id;

        $product = $this->model->getProduct($id);

        if (!$product) {
            return $this->view->response("No se encontro el producto", 404);
        }

        return $this->view->response($product);
    }

    public function getAllProducts($req, $res){
        $products = $this->model->getAllProducts();

        $nombre = null;
        if (isset($req->query->nombre)) {
            $nombre = $req->query->nombre;
        }

        $descripcion = null;
        if (isset($req->query->descripcion)) {
            $descripcion = $req->query->descripcion;
        }

        if (!$products) {
            return $this->view->response("No se encontraron productos", 404);
        }

        return $this->view->response($products);
    }

    public function deleteProduct($req,$res){
        $id = $req->params->id;

        $product = $this->model->getProduct($id);

        if (!$product){
            return $this->view->response("El producto con el id=$id no existe", 404);
        }

        $this->model->deleteProduct($id);
        return $this->view->response("Se eliminó el producto con id=$id");
    }

    public function insertProduct($req,$res){
        $id_categoria = $req->body->id_categoria;
        $nombre = $req->body->nombre;
        $descripcion = $req->body->descripcion;
        $precio = $req->body->precio;
        $peso_neto = $req->body->peso_neto;
        $fecha_empaquetado = $req->body->fecha_empaquetado;
        $fecha_vencimiento = $req->body->fecha_vencimiento;
        $stock = $req->body->stock;
        $id_proveedor = $req->body->id_proveedor;

        if (empty($id_categoria)) {
            return $this->view->response("Falta completar id_categoria", 400);
        }
        if (empty($nombre)) {
            return $this->view->response("Falta completar nombre", 400);
        }
        if (empty($descripcion)) {
            return $this->view->response("Falta completar descripcion", 400);
        }
        if (empty($precio)) {
            return $this->view->response("Falta completar precio", 400);
        }
        if (empty($peso_neto)) {
            return $this->view->response("Falta completar peso_neto", 400);
        }
        if (empty($fecha_empaquetado)) {
            return $this->view->response("Falta completar fecha_empaquetado", 400);
        }
        if (empty($fecha_vencimiento)) {
            return $this->view->response("Falta completar fecha_vencimiento", 400);
        }
        if (empty($stock)) {
            return $this->view->response("Falta completar stock", 400);
        }
        if (empty($id_proveedor)) {
            return $this->view->response("Falta completar id_proveedor", 400);
        }

        $id = $this->model->insertProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, 
                                          $fecha_vencimiento, $stock, $id_categoria);

        $product = $this->model->getProduct($id);

        if (!$product){
            return $this->view->response("El producto con el id=$id no existe", 400);
        }

        return $this->view->response($product, 201);
    }

    public function editProduct($req, $res){
        $id = $req->params->id;

        $product = $this->model->getProduct($id);

        if (!$product){
            return $this->view->response("El producto con el id=$id no existe", 404);
        }

        $id_categoria = $req->body->id_categoria;
        $nombre = $req->body->nombre;
        $descripcion = $req->body->descripcion;
        $precio = $req->body->precio;
        $peso_neto = $req->body->peso_neto;
        $fecha_empaquetado = $req->body->fecha_empaquetado;
        $fecha_vencimiento = $req->body->fecha_vencimiento;
        $stock = $req->body->stock;
        $id_proveedor = $req->body->id_proveedor;

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