<?php
require_once 'models/Noticia.php';

class NoticiaController {
    private $model;

    public function __construct($db) {
        $this->model = new Noticia($db);
    }

    public function listar() {
        $noticias = $this->model->listarTodas();
        include 'views/site/noticias_listar.php';
    }
}
