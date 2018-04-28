<?php
/**
 * Created by PhpStorm.
 * User: Maxim.Narushevich
 * Date: 28.04.2018
 * Time: 15:21
 */

class PlaygroundController
{
    public function index()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $home=true;
        echo $twig->render('playground.php' , ['strSubfolderRoute' => $strSubfolderRoute,'home'=>$home]);
    }


    public function books()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $home=true;
        echo $twig->render('books.php' , ['strSubfolderRoute' => $strSubfolderRoute,'home'=>$home]);
    }

    public function movies()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $home=true;
        echo $twig->render('movies.php' , ['strSubfolderRoute' => $strSubfolderRoute,'home'=>$home]);
    }

    public function users()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $home=true;
        echo $twig->render('users.php' , ['strSubfolderRoute' => $strSubfolderRoute,'home'=>$home]);
    }

    public function products()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $home=true;
        echo $twig->render('products.php' , ['strSubfolderRoute' => $strSubfolderRoute,'home'=>$home]);
    }

}