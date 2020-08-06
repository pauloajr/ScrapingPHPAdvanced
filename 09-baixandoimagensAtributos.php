
<?php

// https://symfony.com/doc/current/components/dom_crawler.html

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();

$navegador = new HttpBrowser($client);

$navegador->setServerParameter("HTTP_USER_AGENT","Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.22 Safari/537.36");


//
$crawler = $navegador->request('GET', "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");

$images = $crawler->filter('article .img-thumbnail')->each(function($node){
     //cadad node é uma imagem
     //queremos pegar o atributo alt
     return $node->attr('alt');
     //poderiamos ter pego o atributo src
});

print_r($images);

//OU
// $images = $crawler->filter('img')->each(function($node){
//      return $node->extract(['alt'])[0];
//  });
