<?php

use App\Agent;
use App\Authenticator;
use App\Database;
use App\Session;
use App\Validator;

$db = Agent::resolve(Database::class);

if ($_POST) {
    extract($_POST);
}

// Validate Form Input
function formData($arr, $x, $y)
{
    $email = Validator::verifyAcct($x);
    if ($email) {
        $arr[] = compact('email');
    }

    $password = Validator::verifyCreds($y);
    if ($password) {
        $arr[] = compact('password');
    }

    return $arr;
}

$errors = formData([], $email, $password);

// Valid User Input ? Authenticate User
if (!$errors) {
    $auth = new Authenticator();
    $success = $auth->register($_POST);

    if ($success) redirect('/');
}

// Invalid User Input
    // 1. Store Errors & User Data
Session::print('_MSGS', ['ERRS' => $errors]);
Session::print('OLD', [
    'FNAME' => $firstName,
    'LNAME' => $lastName,
    'EMAIL' => $email
]);

    // 2. Return to Register Page
redirect('/register');

?>