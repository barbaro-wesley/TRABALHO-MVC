<?php
// Configurações básicas
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

// Headers de segurança
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

// Autoloader de classes
spl_autoload_register(function ($class) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Requer arquivos essenciais
require_once 'core/Database.php';
require_once 'controllers/NoticiaController.php';
require_once 'controllers/AdminController.php';

try {
    // Conectar ao banco de dados
    $db = Database::conectar();
    
    // Validar e sanitizar entrada
    $controllerName = isset($_GET['controller']) ? strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['controller'])) : 'noticia';
    $action = isset($_GET['action']) ? strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['action'])) : 'listar';
    
    // Mapa de controladores
    $controllers = [
        'noticia' => 'NoticiaController',
        'admin' => 'AdminController'
    ];
    
    // Validar controlador
    if (!isset($controllers[$controllerName])) {
        throw new Exception('Controlador não encontrado: ' . htmlspecialchars($controllerName));
    }
    
    $controllerClass = $controllers[$controllerName];
    $controller = new $controllerClass($db);
    
    // Validar ação
    if (!method_exists($controller, $action)) {
        throw new Exception('Ação não encontrada: ' . htmlspecialchars($action));
    }
    
    // Executar ação
    $controller->$action();
    
} catch (Exception $e) {
    // Log de erro
    error_log('Erro no roteador: ' . $e->getMessage());
    
    // Exibir página de erro
    http_response_code(500);
    include 'views/error.php';
    exit;
}