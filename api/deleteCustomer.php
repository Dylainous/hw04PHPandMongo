<?php
require '../vendor/autoload.php';

$data = json_decode(file_get_contents("php://input"), true);

$client = new MongoDB\Client("mongodb+srv://oop:oop@cluster0.9knxc.mongodb.net/?appName=Cluster0");
$coleccion = $client->students->Customer;

$coleccion->deleteOne([
  "_id" => new MongoDB\BSON\ObjectId($data["id"])
]);

?>