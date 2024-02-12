<?php

use App\Authenticator;
use App\Session;
use Http\Forms\Login;

extract($_POST);

// Validate User Login Form:
$form = new Login();
$validation = $form->validate($email, $password);

// If User Input Valid → Authenticate the User:
if ($validation) {
    $auth = new Authenticator();
    $status = $auth->attempt($email, $password);

    // Check for Auth Errors
        // Errors Found → (Errors = True)
        // Errors Not Found → (Errors = False)
    $errors = $status ?: false;

    // User Authentication
        // Errors === True ? Generate Errors
        // Errors === False ? Redirect to User Dashboard
    $errors ? $form->setError($status) : redirect('/');
}

// If User Input Invalid
    // 1. Save User Input & Errors to Session
Session::print('_MSGS', ['ERRS' => $form->getErrors()]);
Session::print('OLD', ['EMAIL' => $email]);

    // 2. Return to Login Page
redirect('/login');

?>