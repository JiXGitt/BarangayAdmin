<?php

use App\Core\Application;
use App\Core\Database;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Config/env.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$db = new Database(
    $_ENV['DRIVER'], $_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']
);

$app = new Application($db);

$app->router
    ->get('/', [App\Controllers\AuthController::class, 'login'])
    ->post('/', [App\Controllers\AuthController::class, 'login'])

    ->get('/login', [App\Controllers\AuthController::class, 'login'])
    ->post('/login', [App\Controllers\AuthController::class, 'login'])

    ->get('/register', [App\Controllers\AuthController::class, 'register'])
    ->post('/register', [App\Controllers\AuthController::class, 'register'])
    
    ->get('/dashboard', [App\Controllers\DashboardController::class, 'index'])
    ->get('/report', 'reports')

    ->get('/logout', [App\Controllers\AuthController::class, 'logout'])
    ;


$app->run();