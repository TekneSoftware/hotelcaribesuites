<?php

namespace DecktraMailer\Core\Frontend;

class Frontend
{
    protected static $libraries = array(
        "/bower_components/jquery.validate/dist/jquery.validate.js",
        "/bower_components/bootstrap-growl/jquery.bootstrap-growl.min.js",
        "/js/locale.js",
        "/js/utils.js",
        "/js/main.js"
    );

    public static function init(){
        self::output_javascript_headers();
        echo self::output_scripts();
    }

    private static function output_scripts(){
        $output = "";
        foreach (self::$libraries as $file) {
            $file = __DIR__.$file;
            $output .= file_get_contents($file);
        }
        $output = str_replace("{{post-url}}", "DecktraMailer/dispatch.php",$output);
        return $output;
    }

    private static function output_javascript_headers() {
        header('Content-type: application/json');
    }
}