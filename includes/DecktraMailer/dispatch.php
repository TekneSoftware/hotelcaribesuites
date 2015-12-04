<?php
require_once 'vendor/autoload.php';
use \DecktraMailer\Core\Dispatchers\ContactFormDispatcher;

$dispatcher = new ContactFormDispatcher("ajax");
$dispatcher->dispatch();