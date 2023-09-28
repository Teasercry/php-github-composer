<?php

require 'vendor\autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();

$res = $client->request('GET', 'https://api.github.com/users');
$html = $res->getBody();
$dowCrawler = new Crawler($html);
var_dump($res);