<?php

use App\Agent;
use App\Database;
use App\Validator;

$db = Agent::resolve(Database::class);

if ($_POST) {
    extract($_POST);
}

$eMsg = Validator::verifyUser($email);
$pMsg = Validator::verifyCreds($password);

$getUser = 'SELECT * FROM users WHERE email = :email';

$thisUser = $db->query($getUser, [':email' => $email])->find();

var_dump($thisUser);
// Returns False if No Record is Found

// $eMsg ?: $pMsg ?: login();

// viewPath('sessions/create.view.php', $viewData);

// Validate the User && Log In

?>