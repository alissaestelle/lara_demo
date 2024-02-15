<?php

use App\User;
use Http\Forms\Entry;

// Validate User Registration Form:
$form = Entry::validate($_POST);

// If User Input Valid → Create a New User:
$auth = (new User())->register($_POST);

// New User Success ? Redirect to Dashboard : Return to Register Pg
$auth ? redirect('/notes') : $form->setError('Account Already Exists')->throw();

?>