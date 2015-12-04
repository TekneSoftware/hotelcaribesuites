<?php

namespace DecktraMailer\Core;

use DecktraMailer\Config\EmailConfig;
use PHPMailer;

class Mailer extends PHPMailer {
    function __construct() {
        parent::__construct();
        self::setLanguage('es', './PHPMailer/language');
        if (EmailConfig::SMTP) {
            self::isSMTP();
            $this->Host = EmailConfig::HOST;
            $this->Port = 587;
            $this->SMTPAuth = true;
            $this->Username = EmailConfig::EMAIL;
            $this->Password = EmailConfig::PASSWORD;
            $this->SMTPSecure = "tls";
        }
        $this->From = EmailConfig::EMAIL;
        $this->FromName = EmailConfig::FROM_NAME;
    }

    public function enviar($recipients, $subject, $message) {
        foreach ($recipients as $email => $name) {
            self::addAddress($email, ucwords($name));
        }
        self::isHTML(true);
        $message = utf8_decode($message);
        $subject = utf8_decode($subject);
        $this->Subject = $subject;
        $this->Body = $message;
        $this->AltBody = htmlentities($message);
        try {
            return parent::send();
        } catch (\Exception $e) {
            throw $e;
        }
    }

}