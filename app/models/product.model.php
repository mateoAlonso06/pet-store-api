<?php
require_once './app/models/model.php';

class ProductModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function getProduct($id) {
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_producto = ?');
        $query->execute([$id]);

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function getAllProducts($precio = null, $orderBy = false, $nombre = null, $descripcion = null) {
        $sql = 'SELECT * FROM productos';
        $params = [];

        if ($nombre !== null) {
            $sql.= " WHERE nombre LIKE ?";
            $params[] = "%$nombre%";
        }

        if ($descripcion !== null) {
            if ($nombre == null) {
                $sql.= " WHERE descripcion LIKE ?";
            } else {
                $sql.= " AND descripcion LIKE ?";
            }
            $params[] = "%$descripcion%";
        }

        if ($precio !== null) {
            if ($nombre == null && $descripcion == null) {
                $sql.= " WHERE precio <= ?";
            } else {
                // ya con que alguna de las otros parametros no sea null significa que debo usar un AND
                $sql.= " AND precio <= ?";
            }
            $params[] = $precio;
        }
        
        if ($orderBy == true){
            switch($orderBy){
                case 'precio':
                    $sql .= ' ORDER BY precio';
                    break;
                case 'stock':
                    $sql .= ' ORDER BY stock';
            }
        }

        //ejecuto la consulta
        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento = null, $stock, $id_proveedor) {
        $query = $this->db->prepare('INSERT INTO productos (id_categoria, nombre, descripcion, precio, peso_neto, fecha_empaquetado, fecha_vencimiento, stock, id_proveedor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento, $stock, $id_proveedor]);

        return $this->db->lastInsertId();
    }

    public function deleteProduct($id){
        $query = $this->db->prepare('DELETE FROM productos WHERE id_producto=?');
        $query->execute([$id]);
    }

    public function updateProduct($id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento, $stock, $id_proveedor){
        $query = $this->db->prepare('UPDATE productos SET id_categoria=?, nombre=?, descripcion=?, precio=?,
                                     peso_neto=?, fecha_empaquetado=?, fecha_vencimiento=?, stock=?, id_proveedor=?');
        $query->execute([$id_categoria, $nombre, $descripcion, $precio, $peso_neto, $fecha_empaquetado, $fecha_vencimiento,
                         $stock, $id_proveedor]);           
    }
}