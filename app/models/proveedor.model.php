<?php
require_once './app/models/model.php';

class ProveedorModel extends Model {
    private $db;

    public function __construct() {
        parent::__construct();
    }

    public function getProveedorById($id) {
        $query = $this->db->prepare('SELECT * FROM proveedores WHERE id_proveedor = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}