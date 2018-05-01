<?php
/**
 * Created by PhpStorm.
 * User: Maxim.Narushevich
 * Date: 28.04.2018
 * Time: 16:09
 */

class UserController
{
    public function index()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/users/';
        $playground=true;
        $token=true;
        echo $twig->render('users/get_all.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

    public function getSpecificUser()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/users/';
        $playground=true;
        $token=true;
        echo $twig->render('users/get.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }


    public function update()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/users/';
        $playground=true;
        $token=true;
        echo $twig->render('users/edit.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

    public function delete()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/users/';
        $playground=true;
        $token=true;
        echo $twig->render('users/delete.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

    public function books()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/users/';
        $playground=true;
        $token=true;
        echo $twig->render('users/books.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

    public function movies()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/users/';
        $playground=true;
        $token=true;
        echo $twig->render('users/movies.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

}