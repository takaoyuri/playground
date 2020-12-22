<?php

use Dotenv\Dotenv;
use Jumbojett\OpenIDConnectClient;

require __DIR__ . '/vendor/autoload.php';

$a = Dotenv::createImmutable(__DIR__);
$a->load();

$client = new OpenIDConnectClient(
    getenv("MY_PROVIDER"),
    getenv("CLIENT_ID"),
    getenv("CLIENT_SECRET")
);
$client->setRedirectURL('http://localhost:8080/?action=callback');
$client->authenticate();

if ($_GET['action'] == 'callback') {
    $token = $client->getAccessToken();
    print_r([
        'access_token' => $client->getAccessToken(),
        'refresh_token' => $client->getRefreshToken(),
        'access_token_payload' => $client->getAccessTokenPayload(),
        'id_token' => $client->getIdToken(),
        'id_token_payload' => $client->getIdTokenPayload(),
    ]);
    print_r($client->requestUserInfo());
}
