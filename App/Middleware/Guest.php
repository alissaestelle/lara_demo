<?php

namespace App\Middleware;
use App\Session;

class Guest
{
    function handle()
    {
        $user = Session::get('USER');
        
        if ($user) {
            header('location: /notes');
            exit();
        }
        
        return;
    }
}

?>