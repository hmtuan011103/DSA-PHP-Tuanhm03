<?php

require_once "EmailSender.php";
require_once "SmsSender.php";
require_once "Interfaces/MessageInterface.php";
require_once "Services/NotificationService.php";

$emailSender = new EmailSender();
$smsSender = new SmsSender();

$notificationService = new NotificationService($smsSender);
$notificationService->notify("Hello, this is a test message!");

// DI ở đây là việc đưa các dependency cụ thể (như $emailSender và $smsSender) vào NotificationService, một class phụ thuộc vào interface MessageInterface. Đây chính là cốt lõi của Dependency Injection.