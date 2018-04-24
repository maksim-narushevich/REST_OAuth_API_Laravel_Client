<?php


class AjaxController
{



    public function testMethod(){

        $twig=$GLOBALS["twig"];
        echo $twig->render('test.php' );
    }



    /**
     * ajaxGetToken
     *
     *
     * @return void
     */
    public function ajaxGetToken(){


        $arrOptions=[
            'strName'=>'anna',
            'strEmail'=>$_POST['strEmail'],
            'strPassword'=>$_POST['strPassword'],
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