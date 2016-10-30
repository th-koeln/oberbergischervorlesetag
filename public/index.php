<?php
declare(strict_types = 1);
require 'vendor/autoload.php';
header("Content-Type: text/html");

$router = new AltoRouter();
$router->setBasePath('apps/vorlesetag/');
/* Setup the URL routing. This is production ready. */

// Main routes that non-customers see
$router->map('GET', '/', 'home.php', 'home');
$router->map('GET', 'home', function () {
    d("test");
}, 'home-home');


/* Match the current request */
$match = $router->match();
if ($match) {
    require $match['target'];
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404.html';
}
