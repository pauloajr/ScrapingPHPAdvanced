<?php

use Symfony\Component\HttpClient\HttpClient;

require_once 'vendor/autoload.php';

$client = HttpClient::create();

$request = $client->request("GET", "http://www.cefet-rj.br/index.php/alunos-graduacao/5161-processo-seletivo-para-os-cursos-de-graduacao-2-semestre-2021");

$status = $request->getStatusCode();

if (!($status > 199 && $status < 300)) {
    echo "Houve um erro!" . PHP_EOL;
    echo "Codigo " . $status . PHP_EOL;
    exit();
}

$conteudo = $request->getContent();

var_dump($conteudo);