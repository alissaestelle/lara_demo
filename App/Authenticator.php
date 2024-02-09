<?php

namespace App;

use App\Agent;
use App\Database;

class Authenticator
{
    function login($x)
    {
        extract($x);

        $_SESSION['_USER'] = [
            'firstName' => $firstName,
            'email' => $email
        ];

        session_regenerate_id(true);
    }

    function attempt($x, $y)
    {
        $db = Agent::resolve(Database::class);

        $getUser = 'SELECT * FROM users WHERE email = :email';
        $user = $db->query($getUser, [':email' => $x])->find();
        // Returns False if No Record is Found

        $user && extract($user);
        $hashPass = $password ?? false;

        $passCheck = password_verify($y, $hashPass) ? true : false;

        if ($passCheck) {
            $this->login($user);
            return $error = false;
        }

        $error = $user ? 'Incorrect Password' : 'No Account Found';

        return $error;
    }

    function logout()
    {
        Session::expire();
    }
}

?>