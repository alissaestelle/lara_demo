<?php

use App\Router;
use App\Session;

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

// $_SESSION ?? formatArr($_SESSION);

// Autoload w/o Namespaces
// spl_autoload_register(fn($class) => include basePath("App/{$class}.php"));

// Autoload w/ Namespaces
// It's important to note that namespaces create virtual directories, so if a file declares its parent folder as a namespace, the name of the parent folder is then automatically prepended to the given file.
// Ex: <File>.php contains a <File> class and is located inside <Folder>. <File>.php declares <Folder> as its namespace, so when the <File> class is passed as an argument to spl_autoload_register(), it's actually passing the full namespaced path: <Folder>/<File>.

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include basePath("{$class}.php");
});

include basePath('bootstrap.php');

$router = new Router();
$routes = include basePath('routes.php');

$router->route($thisURI, $methType);

if ($thisURI === '/register' || $thisURI === '/login') Session::erase();
?>