<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

// require the autoload file
require_once("vendor/autoload.php");

//instantiate the F3 Base class
$f3=Base::instance();

// default route
$f3->route('GET /', function (){
    $view = new Template();
    echo $view->render("views/home.html");
});





$f3->run();