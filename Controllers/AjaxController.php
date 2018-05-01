<?php


class AjaxController
{


    public function testMethod()
    {

        $twig = Config::$twig;
        //echo $twig->render('test.php' , ['config' => $config]);
        echo $twig->render('test.php');
    }


    /**
     * ajaxGetToken
     *
     * @return void
     */
    public function ajaxGetToken()
    {

        $arrOptions = [
            'strEmail' => $_POST['strEmail'],
            'strPassword' => $_POST['strPassword'],
            'token' => Config::$str_API_Token
        ];

        $arrResult = array();
        $strError = false;
        $strResult = "";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Config::$strTokenUrl . '/oauth/token');
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
            $strError = $arrCurlResult->error;
        } else {
            $strResult = $arrCurlResult->access_token;
        }

        $arrResult['strError'] = $strError;
        $arrResult['strToken'] = $strResult;

        if ($arrResult['strError']) {
            $strError = true;
        }

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $arrResult['strToken'],
            'error' => $strError
        ));
    }

    /**
     * ajaxGetToken
     *
     * @return void
     */
    public function ajaxRegisterUser()
    {

        $arrOptions = [
            'strName' => $_POST['strName'],
            'strEmail' => $_POST['strEmail'],
            'strPassword' => $_POST['strPassword'],
            'token' => Config::$str_API_Token
        ];


        $curl = curl_init();
        $arrResult = array();
        $strError = false;
        $strResult = "";

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::$strTokenUrl . "/api/register",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"name\"\r\n\r\n" . $arrOptions['strName'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"email\"\r\n\r\n" . $arrOptions['strEmail'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\n" . $arrOptions['strPassword'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"c_password\"\r\n\r\n" . $arrOptions['strPassword'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
            CURLOPT_HTTPHEADER => array(
                "Cache-Control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
        ));
        curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $strError = true;
        } else {
            $arrResult['strName'] = $arrOptions['strName'];
        }

        //********* START getting authorization token ***************//
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, Config::$strTokenUrl . '/oauth/token');
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
            $strError = $arrCurlResult->error;
        } else {
            $strResult = $arrCurlResult->access_token;
        }
        $arrResult['strError'] = $strError;
        $arrResult['strToken'] = $strResult;

        if ($arrResult['strError']) {
            $strError = true;
        }
        //********* STOP getting authorization token ***************//


        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $arrResult['strName'],
            'token' => $arrResult['strToken'],
            'error' => $strError,
            'errorMessage' => $strError
        ));
    }


    /**
     * ajaxGetSpecificIten
     *
     * @return void
     */
    public function ajaxGetSpecificItem()
    {

        $arrOptions = [
            'ajaxUrlType' => $_POST['ajaxUrlType'],
            'intId' => $_POST['intId'],
            'strToken' => $_POST['strToken'],
            'token' => Config::$str_API_Token
        ];


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, Config::$strTokenUrl . "/api/v1/" . $arrOptions['ajaxUrlType'] . "/" . $arrOptions['intId']);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            "Authorization:Bearer {$arrOptions['strToken']}",
            'Accept: application/json'
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $strResult = "";
        $strErrorMesage = "";
        $strError = false;
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }

        }
        //********* STOP getting authorization token ***************//

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $strResult,
            'error' => $strError,
            'errorMessage' => $strErrorMesage
        ));
    }


    /**
     * ajaxGetItems
     *
     * @return void
     */
    public function ajaxGetItems()
    {

        $arrOptions = [
            'ajaxUrlType' => $_POST['ajaxUrlType'],
            'strToken' => $_POST['strToken'],
            'token' => Config::$str_API_Token
        ];


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, Config::$strTokenUrl . "/api/v1/" . $arrOptions['ajaxUrlType']);
        curl_setopt($curl, CURLOPT_HTTPGET, 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            "Authorization:Bearer {$arrOptions['strToken']}",
            'Accept: application/json'
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $strResult = "";
        $strErrorMesage = "";
        $strError = false;
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }

        }
        //********* STOP getting authorization token ***************//

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $strResult,
            'error' => $strError,
            'errorMessage' => $strErrorMesage
        ));
    }

    /**
     * ajaxAddItem
     *
     * @return void
     */
    public function ajaxAddItem()
    {

        $arrOptions = [
            'ajaxUrlType' => $_POST['ajaxUrlType'],
            'strToken' => $_POST['strToken'],
            'token' => Config::$str_API_Token
        ];
        $strParams = "";

        $curl = curl_init();

        if ($arrOptions['ajaxUrlType'] == 'books') {
            $arrParam = [
                'strTitle' => !empty($_POST['strTitle']) ? $_POST['strTitle'] : "",
                'strDetail' => !empty($_POST['strDetail']) ? $_POST['strDetail'] : "",
                'strAuthor' => !empty($_POST['strAuthor']) ? $_POST['strAuthor'] : "",
                'intCategoryId' => !empty($_POST['intCategoryId']) ? $_POST['intCategoryId'] : "",
                'intDate' => !empty($_POST['intDate']) ? $_POST['intDate'] : "",
                'intPublishYear' => !empty($_POST['intPublishYear']) ? $_POST['intPublishYear'] : ""
            ];
            $strParams = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"title\"\r\n\r\n" . $arrParam['strTitle'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"detail\"\r\n\r\n" . $arrParam['strDetail'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"category_id\"\r\n\r\n" . $arrParam['intCategoryId'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"author\"\r\n\r\n" . $arrParam['strAuthor'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"date\"\r\n\r\n" . $arrParam['intDate'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"publish_year\"\r\n\r\n" . $arrParam['intPublishYear'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--";
        }

        if ($arrOptions['ajaxUrlType'] == 'movies') {
            $arrParam = [
                'strTitle' => !empty($_POST['strTitle']) ? $_POST['strTitle'] : "",
                'strDetail' => !empty($_POST['strDetail']) ? $_POST['strDetail'] : "",
                'strAuthor' => !empty($_POST['strAuthor']) ? $_POST['strAuthor'] : "",
                'intCategoryId' => !empty($_POST['intCategoryId']) ? $_POST['intCategoryId'] : "",
                'intFinishedDate' => !empty($_POST['intFinishedDate']) ? $_POST['intFinishedDate'] : "",
                'intMovieCreatedYear' => !empty($_POST['intMovieCreatedYear']) ? $_POST['intMovieCreatedYear'] : ""
            ];
            $strParams = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"title\"\r\n\r\n" . $arrParam['strTitle'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"detail\"\r\n\r\n" . $arrParam['strDetail'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"category_id\"\r\n\r\n" . $arrParam['intCategoryId'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"author\"\r\n\r\n" . $arrParam['strAuthor'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"finished_date\"\r\n\r\n" . $arrParam['intFinishedDate'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"movie_created_year\"\r\n\r\n" . $arrParam['intMovieCreatedYear'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--";
        }

        if ($arrOptions['ajaxUrlType'] == 'products') {
            $arrParam = [
                'strName' => !empty($_POST['strName']) ? $_POST['strName'] : "",
                'strDetail' => !empty($_POST['strDetail']) ? $_POST['strDetail'] : ""
            ];
            $strParams = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"name\"\r\n\r\n" . $arrParam['strName'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"detail\"\r\n\r\n" . $arrParam['strDetail'] . "\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--";
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::$strTokenUrl . "/api/v1/" . $arrOptions['ajaxUrlType'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $strParams,
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer {$arrOptions['strToken']}",
                "Cache-Control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
        ));


        $strResult = "";
        $strErrorMesage = "";
        $strError = false;
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }

        }
        //********* STOP getting authorization token ***************//

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $strResult,
            'error' => $strError,
            'errorMessage' => $strErrorMesage
        ));
    }


    /**
     * ajaxEditItem
     *
     * @return void
     */
    public function ajaxEditItem()
    {

        $arrOptions = [
            'ajaxUrlType' => $_POST['ajaxUrlType'],
            'strToken' => $_POST['strToken'],
            'intId' => $_POST['intId'],
            'token' => Config::$str_API_Token
        ];
        $strParams = "";

        if ($arrOptions['ajaxUrlType'] == 'books') {
            $arrParam = [
                'strTitle' => !empty($_POST['strTitle']) ? $_POST['strTitle'] : "",
                'strDetail' => !empty($_POST['strDetail']) ? $_POST['strDetail'] : "",
                'strAuthor' => !empty($_POST['strAuthor']) ? $_POST['strAuthor'] : "",
                'intCategoryId' => !empty($_POST['intCategoryId']) ? $_POST['intCategoryId'] : "",
                'intDate' => !empty($_POST['intDate']) ? $_POST['intDate'] : "",
                'intPublishYear' => !empty($_POST['intPublishYear']) ? $_POST['intPublishYear'] : ""
            ];
            $strParams = "title=" . $arrParam['strTitle'];
            $strParams .= "&detail=" . $arrParam['strDetail'];
            $strParams .= "&author=" . $arrParam['strAuthor'];
            $strParams .= "&category_id=" . $arrParam['intCategoryId'];
            $strParams .= "&date=" . $arrParam['intDate'];
            $strParams .= "&publish_year=" . $arrParam['intPublishYear'];
            $strParams = str_replace(" ", "%20", $strParams);
        }

        if ($arrOptions['ajaxUrlType'] == 'movies') {
            $arrParam = [
                'strTitle' => !empty($_POST['strTitle']) ? $_POST['strTitle'] : "",
                'strDetail' => !empty($_POST['strDetail']) ? $_POST['strDetail'] : "",
                'strAuthor' => !empty($_POST['strAuthor']) ? $_POST['strAuthor'] : "",
                'intCategoryId' => !empty($_POST['intCategoryId']) ? $_POST['intCategoryId'] : "",
                'intFinishedDate' => !empty($_POST['intFinishedDate']) ? $_POST['intFinishedDate'] : "",
                'intMovieCreatedYear' => !empty($_POST['intMovieCreatedYear']) ? $_POST['intMovieCreatedYear'] : ""
            ];
            $strParams = "title=" . $arrParam['strTitle'];
            $strParams .= "&detail=" . $arrParam['strDetail'];
            $strParams .= "&author=" . $arrParam['strAuthor'];
            $strParams .= "&category_id=" . $arrParam['intCategoryId'];
            $strParams .= "&finished_date=" . $arrParam['intFinishedDate'];
            $strParams .= "&movie_created_year=" . $arrParam['intMovieCreatedYear'];
            $strParams = str_replace(" ", "%20", $strParams);
        }

        if ($arrOptions['ajaxUrlType'] == 'products') {
            $arrParam = [
                'strName' => !empty($_POST['strName']) ? $_POST['strName'] : "",
                'strDetail' => !empty($_POST['strDetail']) ? $_POST['strDetail'] : ""
            ];
            $strParams = "name=" . $arrParam['strName'];
            $strParams .= "&detail=" . $arrParam['strDetail'];
            $strParams = str_replace(" ", "%20", $strParams);
        }

        if ($arrOptions['ajaxUrlType'] == 'users') {
            $arrParam = [
                'strName' => !empty($_POST['strName']) ? $_POST['strName'] : "",
                'strEmail' => !empty($_POST['strEmail']) ? $_POST['strEmail'] : ""
            ];
            $strParams = "name=" . $arrParam['strName'];
            $strParams .= "&email=" . $arrParam['strEmail'];
            $strParams = str_replace(" ", "%20", $strParams);
        }


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::$strTokenUrl . "/api/v1/" . $arrOptions['ajaxUrlType'] . "/" . $arrOptions['intId'] . "?" . $strParams,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer {$arrOptions['strToken']}",
                "Cache-Control: no-cache"
            ),
        ));


        $strResult = "";
        $strErrorMesage = "";
        $strError = false;
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }

        }
        //********* STOP getting authorization token ***************//

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $strResult,
            'error' => $strError,
            'errorMessage' => $strErrorMesage
        ));
    }

    /**
     * ajaxDeleteItem
     *
     * @return void
     */
    public function ajaxDeleteItem()
    {

        $arrOptions = [
            'ajaxUrlType' => $_POST['ajaxUrlType'],
            'intId' => $_POST['intId'],
            'strToken' => $_POST['strToken'],
            'token' => Config::$str_API_Token
        ];


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => Config::$strTokenUrl . "/api/v1/" . $arrOptions['ajaxUrlType'] . "/" . $arrOptions['intId'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => array(
                "Accept: application/json",
                "Authorization: Bearer {$arrOptions['strToken']}",
                "Cache-Control: no-cache"
            ),
        ));

        $strResult = "";
        $strErrorMesage = "";
        $strError = false;
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }

        }
        //********* STOP getting authorization token ***************//

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $strResult,
            'error' => $strError,
            'errorMessage' => $strErrorMesage
        ));
    }


    /**
     * ajaxGetUserBooks
     *
     * @return void
     */
    public function ajaxGetUserBooks()
    {

        $arrOptions = [
            'ajaxUrlType' => $_POST['ajaxUrlType'],
            'intId' => $_POST['intId'],
            'strToken' => $_POST['strToken'],
            'token' => Config::$str_API_Token
        ];


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, Config::$strTokenUrl . "/api/v1/" . $arrOptions['ajaxUrlType'] . "/" . $arrOptions['intId'] . "/books");
        curl_setopt($curl, CURLOPT_HTTPGET, 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            "Authorization:Bearer {$arrOptions['strToken']}",
            'Accept: application/json'
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $strResult = "";
        $strErrorMesage = "";
        $strError = false;
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }

        }
        //********* STOP getting authorization token ***************//

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $strResult,
            'error' => $strError,
            'errorMessage' => $strErrorMesage
        ));

    }

    /**
     * ajaxGetUserMovies
     *
     * @return void
     */
    public function ajaxGetUserMovies()
    {

        $arrOptions = [
            'ajaxUrlType' => $_POST['ajaxUrlType'],
            'intId' => $_POST['intId'],
            'strToken' => $_POST['strToken'],
            'token' => Config::$str_API_Token
        ];


        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, Config::$strTokenUrl . "/api/v1/" . $arrOptions['ajaxUrlType'] . "/" . $arrOptions['intId'] . "/movies");
        curl_setopt($curl, CURLOPT_HTTPGET, 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            "Authorization:Bearer {$arrOptions['strToken']}",
            'Accept: application/json'
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $strResult = "";
        $strErrorMesage = "";
        $strError = false;
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $strErrorMesage = $err;

            $strError = true;
        } else {
            $arrResult = json_decode($response, true);
            if (isset($arrResult["success"]) && $arrResult["success"]) {
                $strResult = $arrResult['data'];
            } else {
                $strError = true;
                $strErrorMesage = $arrResult['message'];
            }

        }
        //********* STOP getting authorization token ***************//

        header('Content-Type: application/json');
        echo json_encode(array(
            'result' => $strResult,
            'error' => $strError,
            'errorMessage' => $strErrorMesage
        ));

    }

}