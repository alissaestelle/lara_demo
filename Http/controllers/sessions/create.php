<?php

use App\Session;

// $_SESSION && extract($_SESSION);
var_dump($_SESSION);

$viewData = [
    'email' => $email ?? false,
    'password' => $password ?? false,
    'errors' => Session::get('ERRS') ?? []
];

viewPath('sessions/create.view.php', $viewData);