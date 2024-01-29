<?php

namespace App\Middleware;

class Auth
{
    function handle()
    {
        $sessData = count($_SESSION);
        if ($sessData > 0) extract($_SESSION);
        $user ??= false;

        if (!$user) {
            header('location: /register');
            exit();
        }

        return;
    }
}

?>