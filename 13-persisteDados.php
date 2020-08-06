
<?php

// link[rel="stylesheet"],script[src]
// https://symfony.com/doc/current/components/dom_crawler.html

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

function nav($cont) {
     if ($cont == "" || $cont == 1) {
          return "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//";
     }
     return "https://vitormattos.github.io/poc-lineageos-cellphone-list-statics//" . $cont;
}

$client = HttpClient::create();

$navegador = new HttpBrowser($client);

$navegador->setServerParameter("HTTP_USER_AGENT","Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.22 Safari/537.36");

//
$crawler = $navegador->request('GET', nav(""));

$totalPaginas = $crawler->filter('header div span')->text();
// \D nao numeros \d numeros
$totalPaginas = preg_replace('/\D/','', $totalPaginas);
$totalPaginas = ceil($totalPaginas/10);

$modelos = $crawler->filter("article")->each(function($node){
     $return["modelo"] = $node->filter('.title')->text();
     $atributos = $node->filter('th')->each(function ($attr){
          return $attr->text();
     });
     $valores = $node->filter('td')->each(function ($attr){
          return $attr->text();
     });
     $return = array_merge($return, array_combine($atributos, $valores));
     return $return;
});

print_r($modelos);


// foreach($modelos as $modelo){
//      echo $modelo . PHP_EOL;
// }

// Pegando todos os TH teremos os nome das caracteristicas
// Pegando todos os TD teremos os valores

//OU
// echo explode(' ', $str)[0];
// Estamos quebrando a string pelos espaços, utilizando a função explode e pegando a primeira parte, que é o número desejado.

// preg_match('/\d+/', $str, $matches);
// echo $matches[0];
// A função preg_match faz o inverso da função que utilizamos no vídeo, pois ela retorna tudo que coincide com a expressão regular e coloca todas as ocorrências no array $matches. Como o número 268 está na primeira posição do array, estamos pegando ele utilizando $matches[0].
