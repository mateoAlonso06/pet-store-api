<?php
require_once './app/models/product.model.php';
require_once './app/views/json.view.php';
require_once './app/models/proveedor.model.php';
require_once './app/models/categoria.model.php';

class ProductApiController {
    private $model;
    private $view;
    private $proveedorModel;
    private $categoriaModel;

    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new JSONView();
        $this->proveedorModel = new ProveedorModel();
        $this->categoriaModel = new CategoriaModel();
    }

    public function getProduct($req, $res) {
        $id = $req->params->id;

        $product = $this->model->getProduct($id);

        if (!$product) {
            return $this->view->response("No se encontro el producto con id: $id", 404);
        }

        return $this->view->response($product);
    }

    public function getAllProducts($req, $res){
        $precio = null;
        if(isset($req->query->precio)){
            $precio = $req->query->precio;
        }

        $orderBy = false;
        if(isset($req->query->orderBy))
            $orderBy = $req->query->orderBy;

        $nombre = null;
        if (isset($req->query->nombre)) {
            $nombre = $req->query->nombre;
        }

        $descripcion = null;
        if (isset($req->query->descripcion)) {
            $descripcion = $req->query->descripcion;
        }

        $products = $this->model->getAllProducts($precio, $orderBy, $nombre, $descripcion);

        if (!$products) {
            return $this->view->response("No se encontraron productos", 404);
        }

        return $this->view->response($products);
    }

    public function deleteProduct($req, $res) {
        if (!$res->user) {
            return $this->view->response("No autorizado", 401);
        }
        
        $id = $req->params->id;

        $product = $this->model->getProduct($id);

        if (!$product){
            return $this->view->response("El producto con el id=$id no existe", 404);
        }

        $this->model->deleteProduct($id);
        return $this->view->response("Se eliminó el producto con id=$id");
    }

    public function insertProduct($req, $res) {
        if (!$res->user) {
            return $this->view->response("No autorizado", 401);
        }

         // Este es un objeto std class
        $body = $req->body;
        
        $requiredFields = ['id_categoria', 'nombre', 'descripcion', 'precio', 'peso_neto', 'fecha_empaquetado', 'fecha_vencimiento', 'stock', 'id_proveedor'];

        $error = $this->validateRequiredFields($body, $requiredFields);

        if ($error) {
            return $this->view->response($error, 400);
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

        if (!$this->existeCategoria($id_categoria) && !$this->existeProveedor($id_proveedor)) {
            return $this->view->response("La categoria o el proveedor no existen", 404);
        }

        $id = $this->model->insertProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto,
        $fecha_empaquetado, $fecha_vencimiento, $stock, $id_categoria);

        $product = $this->model->getProduct($id);

        if (!$product){
            return $this->view->response("El producto con el id: $id, no existe", 404);
        }

        return $this->view->response($product, 201);
    }

    public function editProduct($req, $res) {
        if (!$res->user) {
            return $this->view->response("No autorizado", 401);
        }

        $id = $req->params->id;

        $body = $req->body; 
        
        $requiredFields = ['id_categoria', 'nombre', 'descripcion', 'precio', 'peso_neto', 'fecha_empaquetado', 'fecha_vencimiento', 'stock', 'id_proveedor'];

        $error = $this->validateRequiredFields($body, $requiredFields);

        if ($error) {
            return $this->view->response($error, 400);
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

        if (!$this->existeCategoria($id_categoria) && !$this->existeProveedor($id_proveedor)) {
            return $this->view->response("La categoria o el proveedor no existen", 404);
        }

        $this->model->updateProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto,
        $fecha_empaquetado, $fecha_vencimiento, $stock, $id_categoria);

        $product = $this->model->getProduct($id);

        // devuelvo el producto actualizado
        return $this->view->response($product, 200);
    }

    private function existeProveedor($id_proveedor) {
        $proveedor = $this->proveedorModel->getProveedorById($id_proveedor);

        if (!$proveedor) {
            return false;
        }
        return true;
    }

    private function existeCategoria($id_categoria) {
        $categoria = $this->categoriaModel->getCategoriaById($id_categoria);

        if (!$categoria) {
            return false;
        }
        return true;
    }

    // Recibo un objeto y un array con los valores de los campos a verificar
    public function validateRequiredFields($body, $fields) {
        foreach ($fields as $field) {
            if (empty($body->$field)) {
                return "Falta completar el campo $field";
            }
        }
        return null;  
    }
}