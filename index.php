<?php
//Dmytro Boichuk
//4/20/2020
// Dating Website


//to display errors
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

$f3->route('GET /personalInfo', function (){
    $view = new Template();
    echo $view->render("views/personal.html");
});




// to run fat free
$f3->run();