<?php
namespace DecktraMailer\Core\Responders;

interface BaseResponder{

    function __construct();

    public function sendSuccessResponse();
    public function sendFailureResponse();
}
?>