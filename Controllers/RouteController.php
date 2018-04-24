<?php


class RouteController
{

    public function index() {
        $twig=$GLOBALS["twig"];
        echo $twig->render('home.php' );
    }

    public function register() {
        $twig=$GLOBALS["twig"];
        echo $twig->render('register.php' );
    }

    public function getToken() {

        $twig=$GLOBALS["twig"];

        $arrOptions=[
            'strName'=>'anna',
            'strEmail'=>'anna@gmail.com',
            'strPassword'=>'annaqwerty',
            'token'=>'rIGU7NLzDUCzXcUHqhZctGVwP2d9Jc0hwtW2BWDT'
        ];


        $arrResult=array();
        $strError=false;
        $strResult="";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://larapassport.local/oauth/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $postData = array(
            'username' => $arrOptions['strEmail'],
            'password' => $arrOptions['strPassword'],
            'client_id' => '2',
            'client_secret' => $arrOptions['token'],
            'grant_type' => 'password'
        );

        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $arrCurlResult = json_decode(curl_exec($ch));
        if (isset($arrCurlResult->error) && $arrCurlResult->error) {
            $strError=$arrCurlResult->error;
        }else{
            $strResult=$arrCurlResult->access_token;
        }

        $arrResult['strError']=$strError;
        $arrResult['strToken']=$strResult;

        if(!$arrResult['strError']){
            echo $twig->render('token.php', ['token' => $arrResult['strToken']] );
        }else{
            echo $twig->render('token.php', ['token' => $arrResult['strError']] );
        }
    }
}