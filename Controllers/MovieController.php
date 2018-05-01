<?php
/**
 * Created by PhpStorm.
 * User: Maxim.Narushevich
 * Date: 28.04.2018
 * Time: 16:09
 */

class MovieController
{
    public function index()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.Config::$strSubfolderRoute.'/api/v1/movies/';
        $playground=true;
        $token=true;
        echo $twig->render('movies/get_all.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

    public function getSpecificMovies()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/movies/';
        $playground=true;
        $token=true;
        echo $twig->render('movies/get.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

    public function create()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/movies/';
        $playground=true;
        $token=true;
        echo $twig->render('movies/add.php' , [
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
        $strBaseAPI_URL=Config::$strTokenUrl.Config::$strSubfolderRoute.'/api/v1/movies/';
        $playground=true;
        $token=true;
        echo $twig->render('movies/edit.php' , [
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
        $strBaseAPI_URL=Config::$strTokenUrl.Config::$strSubfolderRoute.'/api/v1/movies/';
        $playground=true;
        $token=true;
        echo $twig->render('movies/delete.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }
}