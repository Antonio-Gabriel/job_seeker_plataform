<?php

session_start();

ini_set('display_error', 1);
error_reporting(E_ALL);

require_once "./vendor/autoload.php";
$clientRoutes = require_once "./src/Routes/Client/Routes.php";

use Slim\App;
use Dotenv\Dotenv;


// Inicializando as variáveis de ambiente
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configuração do Slim para roteamento

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

// EndPoint da aplicação
$clientRoutes($app);

$app->run();
