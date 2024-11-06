<?php

class CategoriaModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda_mascotas;charset=utf8', 'root', '');
    }

    public function getCategoriaById($id_categoria) {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $query->execute([$id_categoria]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}