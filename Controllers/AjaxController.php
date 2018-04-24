<?php


class AjaxController
{



    public function testMethod(){

        $twig=Config::$twig;
        //echo $twig->render('test.php' , ['config' => $config]);
        echo $twig->render('test.php');
    }


    /**
     * ajaxGetToken
     *
     * @return void
     */
    public function ajaxGetToken(){


        $arrOptions=[
            'strEmail'=>$_POST['strEmail'],
            'strPassword'=>$_POST['strPassword'],
            'token'=>Config::$str_API_Token
        ];


        $arrResult=array();
        $strError=false;
        $strResult="";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Config::$strTokenUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $postData = array(
            'username' => $arrOptions['strEmail'],
            'password' => $arrOptions['strPassword'],
            'client_id' => Config::$intClientID,
            'client_secret' => $arrOptions['token'],
            'grant_type' => Config::$srtGrantType
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

        if($arrResult['strError']){
            $strError=true;
        }

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' =>$arrResult['strToken'],
            'error' =>$strError
        ));
    }

}