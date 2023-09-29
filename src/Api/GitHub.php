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

    public function __construct(string $baseUri) {
        $this->baseUri = $baseUri;
        $this->httpClient = new Client(['base_uri' => $this->baseUri]);
    }

    public function get(string $endpoint, string $type = "GET"): string {
        $res = $this->httpClient->request($type, $endpoint);
        return json_decode($res->getBody());
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
