<?php

//-- Get subfolder route
$strSubfolderRoute=Config::$strSubfolderRoute;

$router->map('GET',$strSubfolderRoute.'/', 'RouteController#index', 'home');
$router->map('GET',$strSubfolderRoute.'/get-token', 'RouteController#getToken', 'get-token');
$router->map('GET',$strSubfolderRoute.'/get-token/', 'RouteController#getToken', 'get-token/');
$router->map('GET',$strSubfolderRoute.'/register', 'RouteController#register', 'register');
$router->map('GET',$strSubfolderRoute.'/register/', 'RouteController#register', 'register/');
$router->map('GET',$strSubfolderRoute.'/test', 'AjaxController#testMethod', 'testMethod');
$router->map('GET',$strSubfolderRoute.'/playground', 'PlaygroundController#index', 'playground');
$router->map('GET',$strSubfolderRoute.'/playground/users', 'PlaygroundController#users', 'playground-users');
$router->map('GET',$strSubfolderRoute.'/playground/movies', 'PlaygroundController#movies', 'playground-movies');
$router->map('GET',$strSubfolderRoute.'/playground/books', 'PlaygroundController#books', 'playground-books');
$router->map('GET',$strSubfolderRoute.'/playground/products', 'PlaygroundController#products', 'playground-products');


//-- Ajax routes
$router->map('POST',$strSubfolderRoute.'/get_token_ajax', 'AjaxController#ajaxGetToken', 'ajaxGetToken');
$router->map('POST',$strSubfolderRoute.'/register_user_ajax', 'AjaxController#ajaxRegisterUser', 'ajaxRegisterUser');