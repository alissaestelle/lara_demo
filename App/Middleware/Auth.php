<?php

namespace App\Middleware;
use App\Session;

class Auth
{
    function handle()
    {
        $user = Session::get('USER');

        if (!$user) {
            header('location: /register');
            exit();
        }

        return;
    }
}
?>

<!-- NOTES -->

<!-- 
    ** See L:13 → (!$user) **

    Standard Conditionals

    1.  if (true) { echo 'True' } else { echo 'False' }
        ↳ Output: 'True'
    
    2. if (false) { echo 'True' } else { echo 'False' }
        ↳ Output: 'False'
    
    
    Inverted Conditionals (!)

    1.  if (!true) { echo 'True' } else { echo 'False' }
        ↳ Output: 'False'
    
    2. if (!false) { echo 'True' } else { echo 'False' }
        ↳ Output: 'True'
    
    
    Explanation:
    
    If the original value is truthy, the bang operator flips it to falsy.

        Ex: (-) + (+) = (-)
    
    Likewise, if the original value is falsy, the bang operator flips it to truthy.

        Ex: (-) + (-) = (+)

    The bang operator takes the original result of value and inverts it. 
-->