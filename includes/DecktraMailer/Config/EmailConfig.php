<?php
namespace DecktraMailer\Config;

class EmailConfig {
    const SMTP          = false,                    //Required | Boolean
          HOST          = '',                       //Optional if SMTP is false
          PASSWORD      = '',                       //Optional if SMTP is false
          EMAIL         = 'formulario@hotelcaribesuites.com',  //(EDITAR) Mail que envia, Required 
          FROM_NAME     = 'HotelCaribeSuites Homepage Mailer',         //Required
          SUBJECT       = "Formulario de Contacto", //Required
          TO            = "contacto@hotelcaribesuites.com";    //(EDITAR) Mail que recibe, Required
}
