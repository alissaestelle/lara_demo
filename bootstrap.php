<?php

use App\Container;
use App\Database;
use App\Magic;

$dbCtnr = new Container();

$dbCtnr->bind('App\Database', function () {
    $dbConfig = include basePath('config.php');
    return new Database($dbConfig['database'], 'alissa', '');
});

Magic::set($dbCtnr);


// $db = $container->resolve('App\Database');

?>