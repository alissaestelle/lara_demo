<?php

use App\Authenticator;
use Http\Forms\Login;

extract($_POST);

// Validate User Input:
$form = new Login();
$validation = $form->validate($email, $password);

// Validation Fails → Return to Login Page:
if (!$validation) {
    $viewData = [
        'email' => $email,
        'password' => $password,
        'errors' => $form->getErrors()
    ];

    return viewPath('sessions/create.view.php', $viewData);

    // https://medium.com/@albertcolom/how-to-use-arrow-function-in-php-c28490ff7fb7
}

// Validation Passes → Authenticate User:
$auth = new Authenticator();
$status = $auth->attempt($email, $password);

// If Error Found → Generate Error:
$error = $status ?: false;

// Authentication Fails ? Return Error : Redirect to User Dashboard
$error ? $form->setError($status) : redirect('/');

// $_SESSION['_log']['errors'] = $form->getErrors();

$viewData = [
    'email' => $email,
    'password' => $password,
    'errors' => $form->getErrors()
];

viewPath('sessions/create.view.php', $viewData);

?>