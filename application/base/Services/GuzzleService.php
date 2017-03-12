<?php

/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 12/3/17
 * Time: 9:11 PM
 */
class GuzzleService
{
    private $client;
    private static $api_url = 'http://homestack/api/';

    public function __construct()
    {

    }

    public static function sendGet($url, $params = null)
    {
        self::send('GET', $url, $params);
    }

    public static function sendPost($url, $params = null)
    {
        self::send('POST', $url, $params);
    }

    protected static function send($type, $url, $params)
    {

        $client = new \GuzzleHttp\Client();
        $api_url = self::$api_url . $url;

        if ($type == 'POST' || $type == 'PUT' || $type == 'PATCH') {

            $res = $client->$type($api_url, [
                'exceptions' => false,
                'verify'     => false,
//                'auth'       => [$this->_apiKey . ':' . $nonce, $signature],
                'headers'    => [
                    'Content-Type'    => 'application/json',
                ],
                'body'       => json_encode($params),
            ]);
        } else {
            $res = $client->$type($api_url, [
                'exceptions' => false,
                'verify'     => false,
//                'auth'       => [$this->_apiKey . ':' . $nonce, $signature],
                'query'      => $params
            ]);
        }
        echo $api_url;exit;
var_dump($res);exit;
        $resJson = json_decode($res->getBody()->getContents(), TRUE);
        if ($res->getStatusCode() != 401) {
            echo "<pre>";var_dump($resJson);exit;
        }
        var_dump($res);exit;


        return $resJson;
    }
}