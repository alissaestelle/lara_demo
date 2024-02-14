<?php

namespace App;

use App\Agent;
use App\Database;
use App\Session;

class User
{
    function login($x)
    {
        extract($x);

        Session::print('USER', [
            'FNAME' => $firstName,
            'EMAIL' => $email
        ]);

        session_regenerate_id(true);
    }

    function logout()
    {
        Session::expire();
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

    function register($form)
    {
        $db = Agent::resolve(Database::class);
        extract($form);

        $getUser = 'SELECT * FROM users WHERE email = :email';
        $newUser =
            'INSERT INTO users (firstName, lastName, email, password) VALUES (:firstName, :lastName, :email, :password)';

        $user = $db->query($getUser, [':email' => $email])->find();
        // Returns False if No Record is Found

        if (!$user) {
            $config = [
                ':firstName' => $firstName,
                ':lastName' => $lastName,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_BCRYPT)
            ];

            $db->query($newUser, $config);

            $user = ['firstName' => $firstName, 'email' => $email];
            $this->login($user);
            return true;
        }

        return false;
    }
}

?>