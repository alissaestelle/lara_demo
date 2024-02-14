<?php

use App\User;
use Http\Forms\Entry;

extract($_POST);

// Validate User Login Form:
$form = Entry::validate(['email' => $email, 'password' => $password]);

// If User Input Valid → Authenticate the User:
$auth = (new User())->attempt($email, $password);

// Check for Auth Errors
$errors = $auth ?: false;

// User Auth Fails ? Generate Error : Redirect to User Dashboard
$errors ? $form->setError($auth)->throw() : redirect('/notes');

?>