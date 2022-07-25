<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
$app = new \Slim\App;


$app->get('/halls', function (Request $request, Response $response, array $args) {

    try {
        $sql = "SELECT * FROM hall";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $halls = $stmt->fetchAll(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();
        $db = null;
        
        $data = array(
            "status" => "success",
            "rowcount" => $count
        );

        return $response->withJson($halls);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});
