<?php

use App\Agent;
use App\Database;
use App\Validator;
use Http\Forms\Login;

$db = Agent::resolve(Database::class);

extract($_POST);

$getUser = 'SELECT * FROM users WHERE email = :email';
$thisUser = $db->query($getUser, [':email' => $email])->find();
// Returns False if No Record is Found

// $eMsg = Validator::verifyAcct($email);
// $pMsg = Validator::verifyCreds($password);

$eMsg = false;
$pMsg = false;

$form = new Login();
$validation = $form->validate($email, $password);

if (!$validation) {
    global $eMsg, $pMsg;
    $errs = $form->getErrors();

    $assignErr = fn($e) => $e === 'email' || 'password';
    $eMsg = array_filter($errs, $assignErr);

    // Keys Need to Be Looped
    var_dump($eMsg);

    // https://medium.com/@albertcolom/how-to-use-arrow-function-in-php-c28490ff7fb7
}

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