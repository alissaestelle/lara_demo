<?php

use App\Agent;
use App\Database;
use Http\Forms\Login;

$db = Agent::resolve(Database::class);

extract($_POST);

$getUser = 'SELECT * FROM users WHERE email = :email';
$thisUser = $db->query($getUser, [':email' => $email])->find();
// Returns False if No Record is Found


$form = new Login();
$validation = $form->validate($email, $password);

if (!$validation) {
    $viewData = [
        'email' => $email,
        'password' => $password,
        'errors' => $form->getErrors()
    ];

    return viewPath('sessions/create.view.php', $viewData);

    // https://medium.com/@albertcolom/how-to-use-arrow-function-in-php-c28490ff7fb7
}

function verifyUser($user, $pw, $class)
{
    extract($user);
    $hashPass = $password;

    $passCheck = password_verify($pw, $hashPass) ? true : false;

    if ($passCheck) {
        login($name, $email);
        header('location: /notes');
        exit();
    }

    $class->setError('Incorrect Password');
}

$thisUser
    ? verifyUser($thisUser, $password, $form)
    : $form->setError('No Account Found');

$viewData = [
    'email' => $email,
    'password' => $password,
    'errors' => $form->getErrors()
];

viewPath('sessions/create.view.php', $viewData);

?>