<?php
require 'vendor/autoload.php';


$router = new AltoRouter();

// Specify our Twig templates location
$loader = new Twig_Loader_Filesystem(__DIR__.'/views/templates');
// Instantiate our Twig
$twig = new Twig_Environment($loader);



//-- Initialize application routes
require_once 'routes/route.php';

$match = $router->match();
// do we have a match?
if($match) {
    list( $controller, $action ) = explode( '#', $match['target'] );
    if ( is_callable(array($controller, $action)) ) {
        call_user_func_array(array($controller,$action), array($match['params']));
    } else {
        // here your routes are wrong.
        // Throw an exception in debug, send a  500 error in production
    }
} else {
  header("HTTP/1.0 404 Not Found");
  require 'views/404.html';
}


