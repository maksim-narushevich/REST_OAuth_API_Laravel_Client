<?php

//-- Get subfolder route
$strSubfolderRoute=Config::$strSubfolderRoute;

$router->map('GET',$strSubfolderRoute.'/', 'RouteController#index', 'home');
$router->map('GET',$strSubfolderRoute.'/get-token', 'RouteController#getToken', 'get-token');
$router->map('GET',$strSubfolderRoute.'/get-token/', 'RouteController#getToken', 'get-token/');
$router->map('GET',$strSubfolderRoute.'/register', 'RouteController#register', 'register');
$router->map('GET',$strSubfolderRoute.'/register/', 'RouteController#register', 'register/');
$router->map('GET',$strSubfolderRoute.'/test', 'AjaxController#testMethod', 'testMethod');


//-- Ajax routes
$router->map('POST',$strSubfolderRoute.'/get_token_ajax', 'AjaxController#ajaxGetToken', 'ajaxGetToken');
$router->map('POST',$strSubfolderRoute.'/register_user_ajax', 'AjaxController#ajaxRegisterUser', 'ajaxRegisterUser');