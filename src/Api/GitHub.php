<?php

namespace App\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Log;

class GitHub {

    /**
     * Declaration type GuzzleHttp
     *
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * Set base uri
     *
     * @var string
     */
    private $baseUri = 'https://api.github.com';

    public function __construct(string $baseUri = 'https://api.github.com') {
        $this->baseUri = $baseUri;
        $this->httpClient = new Client(['base_uri' => $this->baseUri]);
    }

    public function get(string $endpoint, string $type = "GET"): object | null {
        $return = (object)null;
        Log::info('New request >> get');
        try {
            $res = $this->httpClient->request($type, $endpoint);
            $return->body = $res->getBody();
            $return->header = $res->getHeaders();
            $return->statusCode = $res->getStatusCode();
            Log::info('Request >> get SUCCESS');
        } catch (\Throwable $th) {
            $return->error = $th;
        }
        return $return;
    }

    public function getUsers(int $perPage = 30) {
        Log::info('New request >> getUsers');
        $res = $this->httpClient->request('GET', "/users?per_page={$perPage}");
        $html = $res->getBody();
        foreach (json_decode($html) as $user) {
            showMessage($user->login);
        }
    }
}
