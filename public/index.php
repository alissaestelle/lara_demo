<?php

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
spl_autoload_register(function ($class) 
{
    $class = str_replace('\\', '/', $class);
    include basePath("{$class}.php");
});

include basePath('App/router.php');
// ↳ Output: /Users/alissa/Desktop/KML/lara_sandbox/demo/router.php