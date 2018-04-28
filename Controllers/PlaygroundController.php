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
        echo $twig->render('playground.php' , ['strSubfolderRoute' => $strSubfolderRoute]);
    }


    public function books()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('books/books.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

    public function movies()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('movies/movies.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

    public function users()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('users/users.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

    public function products()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('products/products.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

}