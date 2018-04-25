<?php

$router->map('GET','/', 'RouteController#index', 'home');
$router->map('GET','/get-token', 'RouteController#getToken', 'get-token');
$router->map('GET','/get-token/', 'RouteController#getToken', 'get-token/');
$router->map('GET','/register', 'RouteController#register', 'register');
$router->map('GET','/register/', 'RouteController#register', 'register/');
$router->map('GET','/test', 'AjaxController#testMethod', 'testMethod');


//-- Ajax routes
$router->map('POST','/get_token_ajax', 'AjaxController#ajaxGetToken', 'ajaxGetToken');
$router->map('POST','/register_user_ajax', 'AjaxController#ajaxRegisterUser', 'ajaxRegisterUser');