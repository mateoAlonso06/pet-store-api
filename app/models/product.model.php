<?php

class ProductModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tienda_mascotas;charset=utf8', 'root', '');
    }

    public function getProduct($id) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAllProducts(){
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento = null, $stock, $id_proveedor) {
        $query = $this->db->prepare('INSERT INTO productos (id_categoria, nombre, descripcion, precio, peso_neto, fecha_empaquetado, fecha_vencimiento, stock, id_proveedor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento, $stock, $id_proveedor]);

        return $this->db->lastInsertId();
    }

    public function deleteProduct($id){
        $query = $this->db->prepare('DELETE FROM productos WHERE id=?');
        $query->execute($id);
    }

    public function updateProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento, $stock, $id_proveedor){
        $query = $this->db->prepare('UPDATE productos SET id_categoria=?, nombre=?, descripcion=?, precio=?,
                                     peso_neto=?, fecha_empaquetado=?, fecha_vencimiento=?, stock=?, id_proveedor=?');
        $query->execute([$id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento,
                         $stock, $id_proveedor]);           
    }
}