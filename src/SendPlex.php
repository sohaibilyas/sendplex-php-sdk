<?php

namespace SohaibIlyas\SendPlexPhpSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class SendPlex
{
    const BASE_URL = 'https://api.sendplex.org/';

    private $client;
    private $response;
    private $accessToken;

    public function __construct()
    {

        $this->client = new Client(['base_uri' => self::BASE_URL]);
    }

    public function auth($email, $password)
    {
        try {
            $this->response = json_decode($this->client->post('login', [
                'form_params' => [
                    'email' => $email,
                    'password' => $password
                ],
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ]
            ])->getBody()->getContents());

            if (!empty($this->response->access_token)) {
                $this->client = new Client(['base_uri' => self::BASE_URL, 'headers' => [
                    'Authorization' => 'Bearer ' . $this->response->access_token
                ]]);

                return true;
            }
        } catch (ClientException $e) {
            return false;
        }

        return false;
    }

    public function setAccessToken(string $accessToken)
    {
        $this->client = new Client(['base_uri' => self::BASE_URL, 'headers' => [
            'Authorization' => 'Bearer ' . $accessToken
        ]]);

        $this->accessToken = $accessToken;
    }

    public function getAccessToken()
    {
        return $this->response->access_token;
    }

    public function account()
    {
        return $this->client->get('me')->getBody()->getContents();
    }
}
