<?php
use App\Database;
use App\Agent;

$db = Agent::resolve(Database::class);
if ($user) extract($user);

$email = [':email' => $email];

$thisUser = $db->query("SELECT * FROM users WHERE email = :email", $email)->find();

$thisUser && extract($thisUser);

$first = $name ? explode(' ', $name) : false;
$name = $first[0];
?>

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">
            <!-- <?= $page ?> -->
            Hello, <?= $name ?? 'Guest' ?>
        </h1>
    </div>
</header>