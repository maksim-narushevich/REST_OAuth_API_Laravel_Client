<?php

$arrOptions = [
    'strName' => 'nathan',
    'strEmail' => 'nathan@gmail.com',
    'strPassword' => 'nathanqwerty',
    'token' => 'rIGU7NLzDUCzXcUHqhZctGVwP2d9Jc0hwtW2BWDT'
];

$arrDetails = [
    'intId' =>2,
    'strName' => "Product 88 AGAIN",
    'strDetail' => "Detail 8 AGAIN"
];


$strToken = GetToken($arrOptions);
if (!empty($strToken)) {
    $arrDetails['strToken'] = $strToken;
    UpdateItem($arrDetails);
} else {
    echo "Token is expired or not correct!";
}


function GetToken($arrOptions)
{
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
    $ans = json_decode(curl_exec($ch));
    return $ans->access_token;
}


function UpdateItem($arrDetails)
{

    $curl = curl_init();
    $strUrl="http://larapassport.local/api/v1/products/" . $arrDetails['intId'] . "?name=" . $arrDetails['strName'] . "&detail=" . $arrDetails['strDetail'];
    $strUrl = str_replace(" ", "%20",$strUrl);

    curl_setopt_array($curl, array(
        CURLOPT_URL => $strUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_HTTPHEADER => array(
            "Accept: application/json",
            "Authorization: Bearer {$arrDetails['strToken']}",
            "Cache-Control: no-cache"
        ),
    ));

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
