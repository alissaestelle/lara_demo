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

// $errors = [];

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

if ($errors) {
    var_dump('Yay, No Errors!');
    // $auth = new Authenticator();
    // $status = $auth->register($_POST);
    // var_dump($status);
}

Session::print('_MSGS', ['ERRS' => $errors]);
Session::print('OLD', [
    'FNAME' => $firstName,
    'LNAME' => $lastName,
    'EMAIL' => $email
]);

// formatArr($_SESSION);

// Check if User Exists
// function createUser($v, $w, $x, $y, $z)
// {
//     $getUser = 'SELECT * FROM users WHERE email = :email';
//     $saveUser =
//         'INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)';

//     $user = $v
//         ->query($getUser, [
//             ':email' => $y
//         ])
//         ->find();

//     if ($user) {
//         extract($user);
//         // $first = explode(' ', $name);

//         login($firstName, $email);
//         header('location: /');
//         exit();
//     }

//     if (!$user) {
//         $config = [
//             ':firstName' => $w,
//             ':lastName' => $x,
//             ':email' => $y,
//             ':password' => password_hash($z, PASSWORD_BCRYPT)
//         ];

//         $v->query($saveUser, $config);

//         login($w, $y);
//         header('location: /');
//         exit();
//     }
// }

// $eMsg ?: $pMsg ?: createUser($db, $firstName, $lastName, $email, $password);

$viewData = [
    'firstName' => Session::get('OLD', 'FNAME') ?? false,
    'lastName' => Session::get('OLD', 'LNAME') ?? false,
    'email' => Session::get('OLD', 'EMAIL') ?? false,
    'errors' => Session::get('_MSGS', 'ERRS') ?? []
];

redirect('/register', $viewData);

?>