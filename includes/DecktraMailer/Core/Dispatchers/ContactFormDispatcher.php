<?php

namespace DecktraMailer\Core\Dispatchers;

use DecktraMailer\Config\EmailConfig;
use DecktraMailer\Core\Mailer;
use DecktraMailer\Core\Templates\EmailParser;

class ContactFormDispatcher {

    protected $responder;
    protected $mailer;
    protected $templateParser;

    function __construct($processorName) {
        $nameSpaceName = $className = "DecktraMailer\\Core\\Responders\\";
        $className = $nameSpaceName . ucfirst($processorName) . "Responder";
        $this->responder = new $className();
        $this->mailer = new Mailer();
        $this->templateParser = new EmailParser();
    }

    function parseView() {
        return $this->templateParser->parse($_POST["action"], $_POST);
    }

    public function dispatch() {
        try {
            if ($this->mailer->enviar(array(EmailConfig::TO => ""), EmailConfig::SUBJECT, $this->parseView()))
                $this->responder->sendSuccessResponse();
            $this->responder->sendFailureResponse();
        } catch (\Exception $e) {
            $this->responder->sendFailureResponse();
        }

    }

}