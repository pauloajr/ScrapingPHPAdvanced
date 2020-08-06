
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

$images = $crawler->filter('article .img-thumbnail')->images();

if(!is_dir('images'))
     mkdir('images');

foreach($images as $image){
     $url = $image->getUri();
     $name = basename($url);
     file_put_contents(
          'images/' . $name, 
          file_get_contents($url));
}

//OU
// file_put_contents(
//      'images/' . $name,
//      fopen($uri, 'rb')
//  );
