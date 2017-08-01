<?php
class Message {
    public $text;
    public $timestamp;

    public function __construct($text) {
        $this->text = $text;
        $this->timestamp = new DateTime();
        
    }
    function getText() {
        return $this->text;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }


}