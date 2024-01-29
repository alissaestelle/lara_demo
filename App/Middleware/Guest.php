<?php

namespace App\Middleware;

class Guest
{
    function handle()
    {
        $sessData = count($_SESSION);
        if ($sessData > 0) extract($_SESSION);
        $user ??= false;
        
        if ($user) {
            header('location: /notes');
            exit();
        }
        
        return;
    }
}

?>