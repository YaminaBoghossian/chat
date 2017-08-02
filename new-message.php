<?php

include 'model/Database.php';
//creation dune nouvelle instance de database
$db = new Database();

if (empty($_POST['message'])) {
    http_response_code(400);
    header('Content-Type: text/plain');
    echo 'expect a message parameter';
    exit(1);
}
require_once("model/Message.php");
// creation dun nouvel objet
$msg = new Message($_POST['message'] );


//utiliser la fonction qui est dans la database (qui cree les messages dans la database)
$db->createMessage($msg);

// DEBUG: remove when connected to DB.
header('Content-Type: text/plain');
var_dump($msg);

