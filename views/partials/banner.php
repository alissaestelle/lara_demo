<?php

use App\Session;

$firstName = Session::get('USER', 'FNAME') ?: false;
$name = $firstName ?: 'Guest';
$name = "Hello, {$name}";

?>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            <!-- <?= $page ?> -->
            <?= $page ?? $name ?>
        </h1>
    </div>
</header>