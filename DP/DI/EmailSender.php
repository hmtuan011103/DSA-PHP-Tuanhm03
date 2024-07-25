<?php

require_once "Interfaces/MessageInterface.php";

class EmailSender implements MessageInterface {

    public function send($message) {
        echo "Sending email: $message\n";
    }

}