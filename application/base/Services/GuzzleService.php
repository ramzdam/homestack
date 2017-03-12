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
        return self::send('GET', $url, $params);
    }

    public static function sendPost($url, $params = null)
    {
        return self::send('POST', $url, $params);
    }

    protected static function send($type, $url, $params)
    {

        $client = new \GuzzleHttp\Client();
        $api = self::$api_url . $url;

        if ($type == 'POST' || $type == 'PUT' || $type == 'PATCH') {

            $res = $client->$type($api, [
                'exceptions' => false,
                'verify'     => false,
//                'auth'       => [$this->_apiKey . ':' . $nonce, $signature],
                'headers'    => [
                    'Content-Type'    => 'application/json',
                ],
                'body'       => json_encode($params),
            ]);
        } else {
            $api = 'http://homestack/api/user/list';
            $res = $client->$type($api, [

                'query'      => $params
            ]);
        }


        $resJson = json_decode($res->getBody()->getContents(), TRUE);

        return $resJson;
    }
}