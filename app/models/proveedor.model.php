<?php

class ProveedorModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda_mascotas;charset=utf8', 'root', '');
    }

    public function getProveedorById($id) {
        $query = $this->db->prepare('SELECT * FROM proveedores WHERE id_proveedor = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}