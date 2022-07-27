<?php
session_cache_limiter(false);

session_start(); 

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../config/db.php';
$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("This is root page,");

    return $response;
});

$app->get('/login/{username}/{password}', function (Request $request, Response $response, array $args) {

    try {
        $username = $args['username'];
        $password = $args['password'];
        $sql = "SELECT * FROM user where username = '$username' and password = '$password'";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetchAll(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();
        $db = null;
        $_SESSION['role'] = $user[0]->role;
        $_SESSION['username'] = $user[0]->username;
       
        return $response->withJson($user);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});

//signUP
$app->post('/signUp', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $name = $data['name'];
    $role = $data['role'];
    $age= $data['age'];
    $address = $data['address'];
    $city = $data['city'];
    $country = $data['country'];
    $postal= $data['postal'];
    
    $sql = "INSERT INTO user (username, password, email, name,  role) 
    VALUES (:username, :password, :email, :name, :role)";

    $sql2="INSERT INTO customer (userId,age,address,city,country,postal)
    VALUES (:username,:age,:address,:city,:country,:postal)";
    
    try {
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
       
        $stmt->bindParam(':role', $role);
       
        $stmt->execute();
        $db = null;
        $db = new db();
        $db = $db->connect();

        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':username', $username);
        $stmt2->bindParam(':age', $age);
        $stmt2->bindParam(':address', $address);
        $stmt2->bindParam(':city', $city);
        $stmt2->bindParam(':country', $country);
        $stmt2->bindParam(':postal', $postal);
        $stmt2->execute();

        $db = null;
        $data = array(
            "status" => "success"
        );
        return $response->withJson($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});


//Read all users
$app->get('/user', function (Request $request, Response $response, array $args) {

    try {
        $sql = "SELECT * FROM user";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();
        $db = null;
        
        $data = array(
            "status" => "success",
            "rowcount" => $count
        );

        return $response->withJson($users);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});

$app->get('/user/{username}', function (Request $request, Response $response, array $args) {

    try {
        $username = $args['username'];
        $sql = "SELECT * FROM user where username = '$username'";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();
        $db = null;
        
        $data = array(
            "status" => "success",
            "rowcount" => $count
        );

        return $response->withJson($user);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});

//read customer (admin)
$app->get('/customer/{username}', function (Request $request, Response $response, array $args) {

    try {
        $username = $args['username'];
        $sql = "SELECT * FROM customer where userId = '$username'";
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $cust = $stmt->fetch(PDO::FETCH_OBJ);
        $count = $stmt->rowCount();
        $db = null;
        
        $data = array(
            "status" => "success",
            "rowcount" => $count
        );
        return $response->withJson($cust);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});

//Read hall
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


//Create user
$app->post('/user', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $name = $data['name'];
    $role = $data['role'];
   
    $sql = "INSERT INTO user (username, password, email, name,  role) 
    VALUES (:username, :password, :email, :name, :role)";
    try {
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':name', $name);
       
        $stmt->bindParam(':role', $role);
       
        $stmt->execute();
        $db = null;
        $data = array(
            "status" => "success"
        );
        return $response->withJson($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});

//Update user
$app->put('/user/{username}', function (Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $username = $args['username'];
    $password = $data['password'];
    $email = $data['email'];
    $name = $data['name'];
    $role = $data['role'];
    $sql = "UPDATE user SET password = '$password', email = '$email', name = '$name', role = '$role' WHERE username = '$username'";
    try {
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        $data = array(
            "status" => "success"
        );
        return $response->withJson($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});

//Update customer
$app->put('/cust/{username}', function (Request $request, Response $response, array $args) {

    $data = $request->getParsedBody();
    $username = $args['username'];
    $password = $data['password'];
    $email = $data['email'];
    $name = $data['name'];
    $role = $data['role'];
    $age = $data['age'];
    $address = $data['address'];
    $city = $data['city'];
    $postal = $data['postal'];
    $country = $data['country'];

    $sql = "UPDATE user SET email = '$email', role = '$role' WHERE username = '$username'";

    try {
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        $data = array(
            "status" => "success"
        );
        return $response->withJson($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);
    }
    return $response;
});

//Delete User
$app->delete('/user/{username}', function (Request $request, Response $response, array $args) {
    $username = $args['username'];
    $sql = "DELETE FROM user WHERE username = '$username'";
    try {
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        $data = array(
            "status" => "success"
        );
        return $response->withJson($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => $e
        );
        echo json_encode($data);
    }
    return $response;
});

$app->run();