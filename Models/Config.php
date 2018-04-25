<?php


class Config
{

    /**
     *  Twig template engine instance
     */
    public static $twig;

    /**
     *  API token for request authorization
     */
    public static $str_API_Token = "rIGU7NLzDUCzXcUHqhZctGVwP2d9Jc0hwtW2BWDT";

    /**
     *  Default client ID for API requests
     */
    public static $intClientID = "2";

    /**
     *  Default grant type for API requests
     */
    public static $srtGrantType = "password";


    /**
     *  Default API token url
     */
    public static $strTokenUrl = "http://larapassport.local/oauth/token";

    /**
     *  Default API token url
     */
    public static $strSubfolderRoute = "/restclient";

}