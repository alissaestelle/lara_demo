<?php

use App\Session;

$viewData = [
    // 'email' => Session::get('OLD', 'EMAIL') ?: false,
    'errors' => Session::get('_MSGS', 'ERRS') ?: []
];

viewPath('sessions/create.view.php', $viewData);