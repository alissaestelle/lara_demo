<?php
include 'functions.php';

$thisURI = parse_url($_SERVER['REQUEST_URI'])['path'];
?>

<!-- <pre><?= formatArr($thisURI) ?></pre> -->

<?php
function switchViews($uri)
{
    switch ($uri) {
        case '/':
            include 'controllers/index.php';
            break;
        case '/about':
            include 'controllers/about.php';
            break;
        case '/contact':
            include 'controllers/contact.php';
            break;
        default:
            echo 'Currently Lost in Space';
    }
}

// switchViews($thisURI);

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php'
];

$err404 = 'views/404.php';

function eHandler() {
  
}

foreach ($routes as $x => $y) {
    $thisURI === $x ? include $y : include $err404;
}


?>
