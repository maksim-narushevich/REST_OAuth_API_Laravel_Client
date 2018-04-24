<?php

$router->map('GET','/', 'RouteController#index', 'home');
$router->map('GET','/get-token', 'RouteController#getToken', 'get-token');
$router->map('GET','/get-token/', 'RouteController#getToken', 'get-token/');
$router->map('GET','/register', 'RouteController#register', 'register');
$router->map('GET','/register/', 'RouteController#register', 'register/');
$router->map('GET','/test', 'AjaxController#testMethod', 'testMethod');


//-- Ajax routes
$router->map('POST','/test_ajax', 'AjaxController#ajaxGetToken', 'ajaxGetToken');