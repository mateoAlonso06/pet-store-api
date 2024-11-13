<?php

require_once './app/models/categoria.model.php';
require_once './app/views/json.view.php';

class CategoriaApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new JSONView();
    }

    public function getCategoria($req, $res) {
        // if (!$res->user) {
        //     return $this->view->response("No autorizado", 401);
        // }
        $id = $req->params->id;
    
        $categoria = $this->model->getCategoriaById($id);

        if (!$categoria) {
            return $this->view->response('La categoria no existe', 404);
        }

        return $this->view->response($categoria);
    }

    public function getCategorias($req, $res) {
        $nombre = null;
        if (isset($req->query->nombre)) {
            $nombre = $req->query->nombre;
        }

        $descripcion = null;
        if (isset($req->query->descripcion)) {
            $descripcion = $req->query->descripcion;
        }

        $categorias = $this->model->getCategorias($nombre, $descripcion);

        if (!$categorias) {
            return $this->view->response('No se encontraron resultados', 404);
        }

        return $this->view->response($categorias);
    }

    public function insertarCategoria($req, $res) {
        if (empty($req->body->nombre)) {
            return $this->view->response('Falta completar el campo nombre: ', 400);
        }
        if (empty($req->body->descripcion)) {
            return $this->view->response('Falta completar el campo descripcion: ', 400);
        }

        $nombre = $req->body->nombre;
        $descripcion = $req->body->descripcion;

        $id = $this->model->insertarCategoria($nombre, $descripcion);

        if (!$id) {
            return $this->view->response('Error al insertar la categoria: ', 500);
        }

        $producto = $this->model->getCategoriaById($id);
        return $this->view->response($producto, 201);
    }

    public function eliminarCategoria($req, $res) {
        $id = $req->params->id;

        $categoria = $this->model->getCategoriaById($id);

        if (!$categoria) {
            return $this->view->response("La categoria con el id: $id no existe", 404);
        }

        $this->model->eliminarCategoria($id);
        return $this->view->response("La categoria con el id:$id fue eliminada con exito");
    }

    public function actualizarCategoria($req, $res) {
        $id = $req->params->id;

        $categoria = $this->model->getCategoriaById($id);

        if (!$categoria) {
            return $this->view->response("La categoria con el id:$id no existe", 404);
        }

        if (!isset($req->body->nombre) || !isset($req->body->descripcion)) {
            return $this->view->response("Faltan completar campos", 400);
        }

        $nombre = $req->body->nombre;
        $descripcion = $req->body->descripcion;

        $this->model->actualizarCategoria($id, $nombre, $descripcion);

        $categoria = $this->model->getCategoriaById($id);
        return $this->view->response($categoria, 200);
    }
}