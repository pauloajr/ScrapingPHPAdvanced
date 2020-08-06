
<?php

//USANDO SELETORES CSS

//article .title - console
//https://symfony.com/doc/current/components/dom_crawler.html

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

function write($texto){
     print_r($texto);
     echo PHP_EOL;
}

$client = HttpClient::create();

$navegador = new HttpBrowser($client);

$navegador->setServerParameter("HTTP_USER_AGENT","Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.22 Safari/537.36");


//
$crawler = $navegador->request('GET', "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//");

$nomes = $crawler->filter('article .title')->each(function ($node){
     return $node->text();
});

write($nomes);


//OUTROS JEITOS
// foreach($crawler->filter('article .title') as $p) {
//      $texto[] = $p->nodeValue;
// }

// print_r($texto);

// $list = $crawler->filter('article .title');
// for($i=0;$i < $list->count(); $i++){
//      $text[] = $list->eq($i)->text();
// }
// print_r($texto);
