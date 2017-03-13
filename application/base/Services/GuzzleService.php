<?php

/**
 * Created by PhpStorm.
 * User: madzmar
 * Date: 12/3/17
 * Time: 9:11 PM
 *
 * GuzzleService Class
 * This will do a GuzzleHttp request to the API Server
 */
class GuzzleService
{
    private $client;
    // TODO: This should not be but should be inside a config or .env files
    private static $api_url = 'http://homestack/api/';

    /**
     * Send a get request to the API server
     *
     * @param $url - The api url appended with the url submitted by the requester
     * @param null $params - Parameter to used for additional validation. This is optional only
     * @return mixed - The response of the request
     */
    public static function sendGet($url, $params = null)
    {
        return self::send('get', $url, $params);
    }

    /**
     * Send a post request to the API Server
     *
     * @param $url - The post url target.
     * @param null $params - Post parameters
     * @return mixed
     */
    public static function sendPost($url, $params = null)
    {
        return self::send('post', $url, $params);
    }

    /**
     * Send a put request to the API Server
     *
     * @param $url - The put url target.
     * @param null $params
     * @return mixed
     */
    public static function sendPut($url, $params = null)
    {
        return self::send('put', $url, $params);
    }

    /**
     * Process all request type and send the response back
     * @param $type
     * @param $url
     * @param $params
     * @return mixed
     */
    protected static function send($type, $url, $params)
    {
        $client = new \GuzzleHttp\Client();
        $api = self::$api_url . $url;

        if ($type == 'post' || $type == 'put' || $type == 'patch') {

            $body = json_encode($params);

            $res = $client->$type($api, [
                'auth' => "Authorization: 123456",
                'headers'    => [
                    'Content-Type'    => 'application/json',
                    'Authorization' => "123456",
                ],
                'body'       => $body,
            ]);

        } else {
            $res = $client->$type(
                $api,
                [
                'auth' => "Authorization: 123456",
                'headers' => [
                    'Authorization' => "123456",
                ],
                'query'      => $params
                ]
            );
        }


        $resJson = json_decode($res->getBody()->getContents(), TRUE);

        return $resJson;
    }
}