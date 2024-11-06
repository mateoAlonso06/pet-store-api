<?php
    class Request {
        public $body = null; # { nombre: 'Saludar', descripcion: 'Saludar a todos' }
        public $params = null; # /api/tareas/:id
        public $query = null; # ?soloFinalizadas=true

        public function __construct() {
            try {
                $this->body = json_decode(file_get_contents('php://input'));
            }
            catch (Exception $e) {
                $this->body = null;
            }
            $this->query = (object) $_GET;
        }
    }