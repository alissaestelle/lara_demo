<?php

use App\Container;
use App\Database;
use App\Agent;

$dbCtnr = new Container();

$dbCtnr->bind('App\Database', function () {
    $dbConfig = include basePath('config.php');
    return new Database($dbConfig['database'], 'alissa', '');
});

Agent::set($dbCtnr);

// $db = $container->resolve('App\Database');

?>