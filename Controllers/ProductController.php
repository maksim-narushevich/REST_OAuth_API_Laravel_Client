<?php
/**
 * Created by PhpStorm.
 * User: Maxim.Narushevich
 * Date: 28.04.2018
 * Time: 16:09
 */

class ProductController
{
    public function index()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.Config::$strSubfolderRoute.'/api/v1/products/';
        $playground=true;
        $token=true;
        echo $twig->render('products/get_all.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }

    public function getSpecificProduct()
    {
        $twig = Config::$twig;
        $strSubfolderRoute=Config::$strSubfolderRoute;
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/products/';
        $playground=true;
        $token=true;
        echo $twig->render('products/get.php' , [
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
        $strBaseAPI_URL=Config::$strTokenUrl.'/api/v1/products/';
        $playground=true;
        $token=true;
        echo $twig->render('products/add.php' , [
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
        $strBaseAPI_URL=Config::$strTokenUrl.Config::$strSubfolderRoute.'/api/v1/products/';
        $playground=true;
        $token=true;
        echo $twig->render('products/edit.php' , [
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
        $strBaseAPI_URL=Config::$strTokenUrl.Config::$strSubfolderRoute.'/api/v1/products/';
        $playground=true;
        $token=true;
        echo $twig->render('products/delete.php' , [
            'strSubfolderRoute' => $strSubfolderRoute,
            'playground'=>$playground,
            'token'=>$token,
            'strBaseAPI_URL'=>$strBaseAPI_URL
        ]);
    }
}