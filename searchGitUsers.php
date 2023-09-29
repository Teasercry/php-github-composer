<?php

require './vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$res = $client->request('GET', 'https://api.github.com/users');
$html = $res->getBody();


foreach (json_decode($html) as $user) {
    echo $user->login . PHP_EOL;
}
