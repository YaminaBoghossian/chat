<?php
require_once("model/Message.php");
require_once('model/Database.php');
    
if (empty($_POST['message'])) {
    http_response_code(400);
    header('Content-Type: text/plain');
    echo 'expect a message parameter';
    exit(1);
}

try {
    //creation dune nouvelle instance de database
    $db = new Database();

    // creation dun nouvel objet
    $msg = new Message($_POST['message'] );


    //utiliser la fonction qui est dans la database (qui cree les messages dans la database)
    $db->createMessage($msg);

    // DEBUG: remove when connected to DB.
    header('Content-Type: text/plain');
    //echo $msg;

} catch(Exception $e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo 'DB not working';
}

