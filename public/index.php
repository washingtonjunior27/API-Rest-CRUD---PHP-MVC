<?php

date_default_timezone_set("America/Manaus");

require_once __DIR__ . "/../vendor/autoload.php";

define('BASE_URL', '/api-rest');

session_start();

$route = $_GET['route'] ?? "login";
$parts = explode("/", $route);

$map = [
    "login" => App\Controllers\AuthController::class,
    "register" => App\Controllers\AuthController::class,
    "api-user" => App\Controllers\Api\UserApiController::class,
    "logout" => App\Controllers\AuthController::class,
    "home" => App\Controllers\AppController::class,
    "profile" => App\Controllers\AppController::class,
    "product" => App\Controllers\AppController::class
];

$prefix = $parts[0];

if (isset($map[$prefix])) {
    $classe = $map[$prefix];
    $controller = new $classe;

    if (isset($parts[1]) && !empty($parts[1])) {
        $method = $parts[1];
    } else {
        $method = method_exists($controller, $prefix) ? $prefix : 'index';
    }

    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        http_response_code(404);
    }
} else {
    http_response_code(404);
}
