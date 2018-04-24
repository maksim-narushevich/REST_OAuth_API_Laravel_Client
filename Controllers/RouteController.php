<?php


class RouteController
{

    public function index()
    {
        $twig = Config::$twig;
        echo $twig->render('home.php');
    }

    public function register()
    {
        $twig = Config::$twig;
        echo $twig->render('register.php');
    }

    public function getToken()
    {

        $twig = Config::$twig;
        echo $twig->render('token.php');
    }
}