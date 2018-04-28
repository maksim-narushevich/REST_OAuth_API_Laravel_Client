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
        curl_setopt($ch, CURLOPT_URL, Config::$strTokenUrl.'/oauth/token');
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
            'result' =>"Bearer ".$arrResult['strToken'],
            'error' =>$strError
        ));
    }

    /**
     * ajaxGetToken
     *
     * @return void
     */
    public function ajaxRegisterUser(){

        $arrOptions=[
            'strName'=>$_POST['strName'],
            'strEmail'=>$_POST['strEmail'],
            'strPassword'=>$_POST['strPassword'],
            'token'=>Config::$str_API_Token
        ];


        $curl = curl_init();
        $arrResult=array();
        $strError=false;
        $strResult="";

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::$strTokenUrl."/api/register",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"name\"\r\n\r\n".$arrOptions['strName']."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\n".$arrOptions['strEmail']."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\n".$arrOptions['strPassword']."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"c_password\"\r\n\r\n".$arrOptions['strPassword']."\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
        ));
        curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $strError=true;
        } else {
            $arrResult['strName']= $arrOptions['strName'];
        }

        //********* START getting authorization token ***************//
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Config::$strTokenUrl.'/oauth/token');
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
        //********* STOP getting authorization token ***************//


        header('Content-Type: application/json');
        echo json_encode(array(
            'result' =>$arrResult['strName'],
            'token'=>"Bearer ".$arrResult['strToken'],
            'error' =>$strError,
            'errorMessage' =>$strError
        ));
    }

}