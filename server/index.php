<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

app->group('/f1', function() use ($app) {

    function getConnection()
    {
        $conn = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->exec("SET CHARACTER SET utf8");
        return $conn;
    }

});

$app->get('/usuarios', function (Request $request, Response $response, array $args){

});
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $data = array();

    for ($i = 0; $i < 3 ; $i++) { 
        array_push($data, $name);
    }

    $response->getBody($data, 201);
    $newResponse = $response->withJson($data);
    return $newResponse;
});
$app->run();