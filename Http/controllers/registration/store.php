<?php

use App\User;
use Http\Forms\Entry;

extract($_POST);

// Validate User Registration Form:
$form = Entry::validate($_POST);

// If User Input Valid → Create a New User:
$auth = (new User)->register($_POST);

$auth ? redirect('/notes') : redirect('/register');

?>