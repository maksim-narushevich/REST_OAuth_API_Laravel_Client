<?php
require 'vendor/autoload.php';

$router = new AltoRouter();

// setup routes
$router->map('GET','/', 'views/home.php', 'home');
$router->map('GET','/register', 'views/register.php', 'register');
$router->map('GET','/register/', 'views/register.php', 'register/');
$router->map('GET','/get-token', 'views/token.php', 'get-token');
$router->map('GET','/get-token/', 'views/token.php', 'get-token/');
$match = $router->match();
// do we have a match?
if($match) {
  require $match['target'];
} else {
  header("HTTP/1.0 404 Not Found");
  require 'views/404.html';
}