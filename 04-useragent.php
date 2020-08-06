<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();

$client = HttpClient::create([
    'headers' => [
        'User-agent' => 'O que o site precisa'
    ]
]);


$navegador = new HttpBrowser($client);

$navegador->setServerParameter("HTTP_USER_AGENT","Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.22 Safari/537.36");

$crawler = $navegador->request('GET', "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");

print_r($navegador->getRequest());

