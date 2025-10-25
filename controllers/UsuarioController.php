<?php
require_once 'models/Usuario.php';

class UsuarioController {
    private $model;

    public function __construct($db) {
        $this->model = new Usuario($db);
    }

    public function listar() {
        $usuarios = $this->model->listar();
        include 'views/usuarios.php';
    }
}
