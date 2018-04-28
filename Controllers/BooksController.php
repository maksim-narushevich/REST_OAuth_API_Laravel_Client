<?php
/**
 * Created by PhpStorm.
 * User: Maxim.Narushevich
 * Date: 28.04.2018
 * Time: 16:07
 */

class BooksController
{
    public function index()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('books/get_all.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

    public function getSpecificBook()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('books/get.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

    public function create()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('books/add.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

    public function update()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('books/edit.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }

    public function delete()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $playground=true;
        $token=true;
        echo $twig->render('books/delete.php' , ['strSubfolderRoute' => $strSubfolderRoute,'playground'=>$playground,'token'=>$token]);
    }
}