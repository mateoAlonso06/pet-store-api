<?php

require_once 'app/models/product.model.php';
require_once 'app/views/json.view.php';

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

    // obtener producto mediante un id
    public function get($req, $res) {
        $id = $req->params->id;

        $product = $this->model->getProduct($id);

        if (!$product) {
            return $this->view->response("No encontrado", 404);
        }

        return $this->view->response($product);
    }

    public function insertProduct($req, $res) {
        if (empty($req->body->id_categoria) || empty($req->body->nombre) || empty($req->body->descripcion) ||
            empty($req->body->precio) || empty($req->body->peso_neto) || empty($req->body->fecha_empaquetado) ||
            empty($req->body->stock) || empty($req->body->id_proveedor))
        {
            return $this->view->response("Falta completar un campo: ", 400);
        }

        // si los parametros estan completos comprobamos si tanto la categoria como el proveedor existen
        $id_proveedor = $this->proveedorModel->getProveedorById($req->body->id_proveedor);
        if (!$id_proveedor) {
            return $this->view->response("El proveedor con ese id: $id_proveedor no existe", 404);
        }

        $id_categoria = $this->categoriaModel->getCategoriaById($req->body->id_categoria);
        if (!$id_categoria) {
            return $this->view->response("No existe categoria con id: $id_categoria", 404);
        }

        // si todo esta bien envio la solicitud
        $nombre = $req->body->nombre;
        $descripcion = $req->body->descripcion;
        $precio = $req->body->precio;
        $peso_neto = $req->body->peso_neto;
        $fecha_empaquetado = $req->body->fecha_empaquetado;
        $stock = $req->body->stock;

        $id = $this->model->insertProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento = null, $stock, $id_proveedor);

        if (!$id) {
            return $this->view->response("Error al insertar el producto en la base de datos", 500);
        }

        $producto = $this->model->getProduct($id);
        return $this->view->response($producto, 201);
    }
}