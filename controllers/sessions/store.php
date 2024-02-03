<?php

use App\Agent;
use App\Database;
use App\Validator;

$db = Agent::resolve(Database::class);

var_dump($_POST);
extract($_POST);
$formPass = $password;

$getUser = 'SELECT * FROM users WHERE email = :email';
$thisUser = $db->query($getUser, [':email' => $email])->find();
// Returns False if No Record is Found

$eMsg = Validator::verifyAcct($email);
$pMsg = Validator::verifyCreds($password);

function verifyUser($user, $pw)
{
    extract($user);
    $hashPass = $password;

    $passCheck = password_verify($pw, $hashPass) ? true : false;
    var_dump($passCheck);

    if ($passCheck) {
        login($name, $email);
        header('location: /notes');
        exit();
    }

    return 'Incorrect Password';
}


$logMsg = $thisUser ? verifyUser($thisUser, $password) : 'No Account Found';

$viewData = [
    'email' => ($email ??= false),
    'password' => ($password ??= false),
    'eMsg' => !$thisUser ? $eMsg : false,
    'pMsg' => !$thisUser ? $pMsg : false,
    'logMsg' => $eMsg || $pMsg ? false : $logMsg
];

viewPath('sessions/create.view.php', $viewData);

// Validate the User && Log In

?>