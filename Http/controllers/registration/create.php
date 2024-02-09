<?php

use App\Session;

// var_dump($_SERVER);

$viewData = [
    // 'email' => Session::get('_USER', 'EMAIL') ?? false,
    // 'password' => $password ?? false,
    'errors' => Session::get('_MSGS', 'ERRS') ?? []
];

viewPath('registration/create.view.php', $viewData);

?>