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

//--User's routes
$router->map('GET',$strSubfolderRoute.'/playground/users', 'PlaygroundController#users', 'playground-users');

//-- Movies's routes
$router->map('GET',$strSubfolderRoute.'/playground/movies', 'PlaygroundController#movies', 'playground-movies');
$router->map('GET',$strSubfolderRoute.'/playground/movies/all', 'MovieController#index', 'playground-movies-all');
$router->map('GET',$strSubfolderRoute.'/playground/movies/id', 'MovieController#getSpecificMovies', 'playground-movie-id');
$router->map('GET',$strSubfolderRoute.'/playground/movies/create', 'MovieController#create', 'playground-movies-create');
$router->map('GET',$strSubfolderRoute.'/playground/movies/update', 'MovieController#update', 'playground-movies-update');
$router->map('GET',$strSubfolderRoute.'/playground/movies/delete', 'MovieController#delete', 'playground-movies-delete');

//-- Book's routes
$router->map('GET',$strSubfolderRoute.'/playground/books', 'PlaygroundController#books', 'playground-books');
$router->map('GET',$strSubfolderRoute.'/playground/books/all', 'BooksController#index', 'playground-books-all');
$router->map('GET',$strSubfolderRoute.'/playground/books/id', 'BooksController#getSpecificBook', 'playground-books-id');
$router->map('GET',$strSubfolderRoute.'/playground/books/create', 'BooksController#create', 'playground-books-create');
$router->map('GET',$strSubfolderRoute.'/playground/books/update', 'BooksController#update', 'playground-books-update');
$router->map('GET',$strSubfolderRoute.'/playground/books/delete', 'BooksController#delete', 'playground-books-delete');

//-- Product's routes
$router->map('GET',$strSubfolderRoute.'/playground/products', 'PlaygroundController#products', 'playground-products');


//-- Ajax routes
$router->map('POST',$strSubfolderRoute.'/get_token_ajax', 'AjaxController#ajaxGetToken', 'ajaxGetToken');
$router->map('POST',$strSubfolderRoute.'/register_user_ajax', 'AjaxController#ajaxRegisterUser', 'ajaxRegisterUser');
$router->map('POST',$strSubfolderRoute.'/get_specific_item_user_ajax', 'AjaxController#ajaxGetSpecificItem', 'ajaxGetSpecificItem');
$router->map('POST',$strSubfolderRoute.'/get_all_items_user_ajax', 'AjaxController#ajaxGetItems', 'ajaxGetItems');
$router->map('POST',$strSubfolderRoute.'/create_item_user_ajax', 'AjaxController#ajaxAddItem', 'ajaxAddItem');
$router->map('POST',$strSubfolderRoute.'/update_item_user_ajax', 'AjaxController#ajaxEditItem', 'ajaxEditItem');
$router->map('POST',$strSubfolderRoute.'/delete_item_user_ajax', 'AjaxController#ajaxDeleteItem', 'ajaxDeleteItem');