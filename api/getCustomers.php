<?php
require '../vendor/autoload.php';

header("Content-Type: application/json");

use MongoDB\Client;

$uri = "mongodb+srv://oop:oop@cluster0.9knxc.mongodb.net/?appName=Cluster0";

$mongo = new Client($uri);

$database   = $mongo->students;
$collection = $database->Customer;

$datos = $collection->find();

$resultado = [];

foreach ($datos as $doc) {
    $resultado[] = [
        "id" => (string)$doc["_id"],
        "name" => $doc["name"] ?? null,
        "email" => $doc["email"] ?? null,
        "age" => $doc["age"] ?? null,
        "favorite_language" => $doc["favorite_language"] ?? null
    ];
}

echo json_encode($resultado);