<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();

$navegador = new HttpBrowser($client);

$crawler = $navegador->request('GET', "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");

$html = $crawler->html();

$login = $navegador->clickLink("Login");

//poderemos usar qualquer coisa mas iremos por padrao usar o Go
$form = $navegador->submitForm('Go',[
    'username' => "paulojr@hotmail.com",
    'password' => "uma senha muito secreta"
], 'GET');


var_dump($form->html());

