<?php

require_once "Interfaces/MessageInterface.php";

class SmsSender implements MessageInterface {

    public function send($message) {
        echo "Sms email: $message\n";
    }

}