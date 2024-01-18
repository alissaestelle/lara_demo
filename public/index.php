<?php

use App\Router;

const BASE_PATH = __DIR__ . '/../';
// ↳ BASE_PATH = /Users/alissa/Desktop/KML/lara_sandbox/demo/

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

// include basePath('Database.php');
// ↳ Output: /Users/alissa/Desktop/KML/lara_sandbox/demo/Database.php

// Autoload w/o Namespaces
// spl_autoload_register(fn($class) => include basePath("App/{$class}.php"));

// Autoload w/ Namespaces
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include basePath("{$class}.php");
});

$router = new Router();
$routes = include basePath('routes.php');
// $router->routes[] = $routes;
foreach ($routes as $k => $v) {
    $router->routes[] = [$k => $v];
}
$thisURI = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_METHOD'] ?? $_SERVER['REQUEST_METHOD'];

$router->route();
?>

<pre><?= formatArr($routes) ?></pre>