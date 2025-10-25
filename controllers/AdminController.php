<?php
require_once 'models/Noticia.php';

class AdminController {
    private $model;

    public function __construct($db) {
        session_start();
        $this->model = new Noticia($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['usuario'];
            $senha = md5($_POST['senha']);
            
            $db = Database::conectar();
            $stmt = $db->prepare("SELECT * FROM admins WHERE usuario=? AND senha=?");
            $stmt->execute([$user, $senha]);

            if ($stmt->fetch()) {
                $_SESSION['admin'] = $user;
                header("Location: index.php?controller=admin&action=painel");
                exit;
            } else {
                $erro = "Usuário ou senha inválidos";
            }
        }
        include 'views/admin/login.php';
    }

    public function painel() {
        $this->verificaLogin();
        $noticias = $this->model->listarTodas();
        include 'views/admin/noticias_listar.php';
    }

    public function adicionar() {
        $this->verificaLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $this->model->adicionar($titulo, $conteudo);
            header("Location: index.php?controller=admin&action=painel");
            exit;
        }
        include 'views/admin/noticia_form.php';
    }

    private function verificaLogin() {
        if (!isset($_SESSION['admin'])) {
            header("Location: index.php?controller=admin&action=login");
            exit;
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}
