<?php
/**
 * Created by PhpStorm.
 * User: JM
 * Date: 2/26/2015
 * Time: 1:31 AM
 */

namespace DecktraMailer\Core\Templates;


class EmailParser {
    protected $templatesPath;
    protected $view_file;
    protected $fileExtension = ".html";
    protected $html;

    public function __construct() {
        $this->templatesPath = realpath(dirname(__FILE__) . '/../../Templates/');
    }

    public function parse($view, $variables) {

        $this->initViewFileDirectory($view);
        $this->getHtmlString();
        $this->injectVariables($variables);
        return $this->html;
    }

    private function initViewFileDirectory($view) {
        $this->view_file = $this->templatesPath."/" . $view . $this->fileExtension;
    }

    private function injectVariables($variables) {
        foreach($variables as $key => $value){
            $this->html = str_replace("{{".$key."}}", strip_tags($value), $this->html);
        }
    }

    private function getHtmlString() {
        $this->html = file_get_contents($this->view_file);
    }
}