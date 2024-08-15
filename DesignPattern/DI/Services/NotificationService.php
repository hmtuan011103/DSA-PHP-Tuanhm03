<?php

class NotificationService {

    private MessageInterface $sender;

    public function __construct(MessageInterface $sender) {
        $this->sender = $sender;
    }

    public function notify($message): void
    {
        $this->sender->send($message);
    }

}