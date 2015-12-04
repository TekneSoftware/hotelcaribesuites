<?php
namespace DecktraMailer\Core\Responders;
use DecktraMailer\Core\Responders\BaseResponder;


class AjaxResponder implements BaseResponder{

    function __construct(){

    }

    public function sendSuccessResponse(){
        echo json_encode(array(
            'type'=>'success',
            'message'=>'Su mensaje ha sido enviado.'
        ));
        die;
    }
    public function sendFailureResponse(){
        echo json_encode(array(
            'type'=>'failure',
            'message'=>'Su mensaje no pudo ser enviado.'
        ));
        die;
    }
}
?>