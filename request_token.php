<?php

$arrOptions=[
    'strName'=>'nathan',
    'strEmail'=>'nathan@gmail.com',
    'strPassword'=>'nathanqwerty',
    'token'=>'rIGU7NLzDUCzXcUHqhZctGVwP2d9Jc0hwtW2BWDT'
];


$strToken=GetToken($arrOptions);
print_r($strToken);


function GetToken($arrOptions){
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
//print_r($ans);
//print_r($ans->access_token);
    return $ans->access_token;
}

