<?php

$arrOptions=[
    'strName'=>'anna',
    'strEmail'=>'anna@gmail.com',
    'strPassword'=>'annaqwerty',
    'token'=>'rIGU7NLzDUCzXcUHqhZctGVwP2d9Jc0hwtW2BWDT'
];

$arrDetails = [
    'intId' =>2
];


$arrResult = GetToken($arrOptions);
if (!$arrResult['strError']) {
    if (!empty($arrResult['strToken'])) {
        $arrDetails['strToken'] = $arrResult['strToken'];
        ReturnProductById($arrDetails);
    } else {
        echo "Token is expired or not correct!";
    }
}else {
    print_r($arrResult['strError']);
}

function GetToken($arrOptions){
    $arrResult = array();
    $strError = false;
    $strResult = "";
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
        $strError = $arrCurlResult->error;
    } else {
        $strResult = $arrCurlResult->access_token;
    }

    $arrResult['strError'] = $strError;
    $arrResult['strToken'] = $strResult;

    return $arrResult;
}



function ReturnProductById($arrDetails)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "http://larapassport.local/api/v1/products/" . $arrDetails['intId']);
    curl_setopt($curl, CURLOPT_HTTPGET, 1);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = [
        "Authorization:Bearer {$arrDetails['strToken']}",
        'Accept: application/json'
    ];

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $arrResult = json_decode($response, true);
        if (isset($arrResult["success"]) && $arrResult["success"]) {
            var_dump($arrResult);
        }else{
            echo "No items found!Try to use correct ID";
        }

    }
}