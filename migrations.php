<?php

use App\Core\Application;
use App\Core\Database;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/app/Config/env.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
// autoload path

$db = new Database(
    $_ENV['DRIVER'], $_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']
);

$app = new Application($db);

$app->db->applyMigrations();