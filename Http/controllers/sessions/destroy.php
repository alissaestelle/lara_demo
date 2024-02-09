<?php 

use App\Authenticator;

(new Authenticator)->logout();

header('location: /');
exit();

?>