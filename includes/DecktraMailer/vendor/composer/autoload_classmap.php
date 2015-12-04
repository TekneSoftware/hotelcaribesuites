<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'DecktraMailer\\Config\\EmailConfig' => $baseDir . '/Config/EmailConfig.php',
    'DecktraMailer\\Core\\Dispatchers\\ContactFormDispatcher' => $baseDir . '/Core/Dispatchers/ContactFormDispatcher.php',
    'DecktraMailer\\Core\\Frontend\\Frontend' => $baseDir . '/Core/Frontend/Frontend.php',
    'DecktraMailer\\Core\\Mailer' => $baseDir . '/Core/Mailer.php',
    'DecktraMailer\\Core\\Responders\\AjaxResponder' => $baseDir . '/Core/Responders/AjaxResponder.php',
    'DecktraMailer\\Core\\Responders\\BaseResponder' => $baseDir . '/Core/Responders/BaseResponder.php',
    'DecktraMailer\\Core\\Templates\\EmailParser' => $baseDir . '/Core/Templates/EmailParser.php',
    'PHPMailer' => $vendorDir . '/phpmailer/phpmailer/class.phpmailer.php',
    'POP3' => $vendorDir . '/phpmailer/phpmailer/class.pop3.php',
    'SMTP' => $vendorDir . '/phpmailer/phpmailer/class.smtp.php',
    'phpmailerException' => $vendorDir . '/phpmailer/phpmailer/class.phpmailer.php',
);
