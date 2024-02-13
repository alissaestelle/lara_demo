<?php

use App\Authenticator;
use Http\Forms\Account;

extract($_POST);

// Validate User Login Form:
$form = Account::validate(['email' => $email, 'password' => $password]);

// If User Input Valid → Authenticate the User:
$auth = (new Authenticator)->attempt($email, $password);

// Check for Auth Errors
$errors = $auth ?: false;

// User Auth Fails ? Generate Error : Redirect to User Dashboard
$errors ? $form->setError($auth)->throw() : redirect('/notes');

// 2. Return to Login Page
// redirect('/login');

?>