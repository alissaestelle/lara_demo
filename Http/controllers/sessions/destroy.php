<?php 

use App\User;

(new User)->logout();

header('location: /login');
exit();

?>