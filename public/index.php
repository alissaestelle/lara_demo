<?php

use App\Router;

const BASE_PATH = __DIR__ . '/../';
// ↳ BASE_PATH = /Users/alissa/Desktop/KML/lara_sandbox/demo/

$thisURI = parse_url($_SERVER['REQUEST_URI'])['path'];
$methType = $_POST['_METHOD'] ?? $_SERVER['REQUEST_METHOD'];
// ↳ Use $_POST['_METHOD'] if it exists (and not NULL), otherwise use $_SERVER['REQUEST_METHOD']

session_start();

function basePath($path)
{
    return BASE_PATH . $path;
}

function viewPath($path, $attr = [])
{
    extract($attr);
    return include basePath("views/{$path}");
}

include basePath('App/functions.php');
// ↳ Output: /Users/alissa/Desktop/KML/lara_sandbox/demo/functions.php

// Autoload w/o Namespaces
// spl_autoload_register(fn($class) => include basePath("App/{$class}.php"));

// Autoload w/ Namespaces
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include basePath("{$class}.php");
});

include basePath('bootstrap.php');

$router = new Router();
$routes = include basePath('routes.php');

$router->route($thisURI, $methType);
?>