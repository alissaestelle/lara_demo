<?php

use Illuminate\Support\Collection;

include __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

if ($numbers->contains(100)) {
    echo 'It Contains 10!';
}

$test = $numbers->filter(fn($n) => $n <= 5 );

var_dump($test);

?>