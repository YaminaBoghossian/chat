<?php

//CREATION de la classe DATABASE
class Database {

    public $datab;

    //Connexion a la database.
    public function __construct() {
        try {
            $this->datab = new PDO('mysql:host=localhost;dbname=ajax-chat', 'ajax-chat-user', 'We Love SQL API!');
            $this->datab->setAtrribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo 'Fail to connect DB:' . $e->getMessage();
            exit(1);
        }
    }

//creer la fonction qui creera le message dans la database//
    public function createMessage(Message $message) {
        $text = $message->getText();
        $timestamp = $message->getTimestamp();
        $stmt = $this->datab->prepare('INSERT INTO message(text, timestamp) VALUES (:text, :timestamp);');
        //On va remplacer les arguments dans le prepare avec le bindvalue 
        $stmt->bindValue('text', $text);
        $stmt->bindValue('timestamp', $timestamp);

        // on va executer ce quon demande 

        $stmt->execute();
    }

}
