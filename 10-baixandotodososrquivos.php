
<?php

// link[rel="stylesheet"],script[src]
// https://symfony.com/doc/current/components/dom_crawler.html

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();

$navegador = new HttpBrowser($client);

$navegador->setServerParameter("HTTP_USER_AGENT","Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.22 Safari/537.36");

//
$crawler = $navegador->request('GET', "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");

$links = $crawler->filter('link[rel="stylesheet"],script[src]')->each(function($node){
     if ($node->attr('href') != "")
          return $node->attr('href');
     else return $node->attr('src');
    
});

print_r($links);

//OU
// $url = $crawler->filter('link, script[src], img')->each(function($node){
//      return $node->attr('src') ?: $node->attr('href');
//  });
