<?php
require_once './app/models/model.php';

class CategoriaModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function getCategoriaById($id_categoria) {
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id_categoria = ?');
        $query->execute([$id_categoria]);
    
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getCategorias($nombre = null, $descripcion = null, $orderBy = false) {
        $sql = 'SELECT * FROM categorias';
        $params = [];

        if ($nombre !== null) {
            $sql.= " WHERE nombre LIKE ?";
            $params[] = "%$nombre%";
        }

        if ($nombre !== null && $descripcion !== null) {
            $sql.= " AND descripcion LIKE ?";
            $params[] = "%$descripcion%";
        } else {
            if ($nombre == null && $descripcion !== null) {
                $sql.= " WHERE descripcion LIKE ?";
                $params[] = "%$descripcion%";  
            }
        }

        if($orderBy) {
            switch($orderBy) {
                case 'nombre':
                    $sql .= ' ORDER BY nombre ASC';
                    break;
                case 'descripcion':
                    $sql .= ' ORDER BY prioridad ASC';
                    break;
            }
        }

        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertarCategoria($nombre, $descripcion) {
        $query = $this->db->prepare('INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)');
        $query->execute([$nombre, $descripcion]);

        return $this->db->lastInsertId();
    }

    public function eliminarCategoria($id_categoria) {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute([$id_categoria]);
    }

    public function actualizarCategoria($id_categoria, $nombre, $descripcion) {
        $query = $this->db->prepare('UPDATE categorias SET nombre = ?, descripcion = ? WHERE id_categoria = ?');
        $query->execute([$nombre, $descripcion, $id_categoria]);
    }
}