<?php

namespace Tipusultan\WhatsappApi;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class WhatsappService
{
    protected $client;
    protected $apiUrl;
    protected $apiKey;
    protected $sender;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = config('whatsapp.api_url');
        $this->apiKey = config('whatsapp.api_key');
        $this->sender = config('whatsapp.sender');
    }

    public function sendMessage($number, $message, $footer = 'Sent via mpwa')
    {
        try {
            $response = $this->client->post($this->apiUrl, [
                'json' => [
                    'number' => $number,
                    'message' => $message,
                    'api_key' => $this->apiKey,
                    'sender' => $this->sender,
                    'footer' => $footer
                ]
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->hasResponse() ? json_decode($e->getResponse()->getBody()->getContents(), true) : null
            ];
        }
    }
}
