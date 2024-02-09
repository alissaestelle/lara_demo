<?php

use App\Session;

// $_SESSION && extract($_SESSION);
// var_dump($_SESSION);

$viewData = [
    // 'email' => Session::get('_USER', 'EMAIL') ?? false,
    // 'password' => $password ?? false,
    'errors' => Session::get('_MSGS', 'ERRS') ?? []
];

viewPath('sessions/create.view.php', $viewData);