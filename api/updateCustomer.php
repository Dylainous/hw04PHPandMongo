<?php
require '../vendor/autoload.php';

$data = json_decode(file_get_contents("php://input"), true);

$id = $data["id"];
unset($data["id"]);

$client = new MongoDB\Client("mongodb+srv://oop:oop@cluster0.9knxc.mongodb.net/?appName=Cluster0");
$coleccion = $client->students->Customer;

$coleccion->updateOne(
  ["_id" => new MongoDB\BSON\ObjectId($id)],
  ['$set' => $data]
);

?>