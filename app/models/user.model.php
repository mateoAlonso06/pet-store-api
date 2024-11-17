<?php
require_once './app/models/model.php';

class UserModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function getUser($username) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$username]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}