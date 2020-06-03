<?php
//Dmytro Boichuk
//4/20/2020
// Dating Website


//to display errors
ini_set('display_errors',1);
error_reporting(E_ALL);


// require the autoload file
require_once("vendor/autoload.php");

session_start();

//instantiate the F3 Base class
$f3=Base::instance();
//instantiate controller
$controller=new Controller($f3);


// default route
$f3->route('GET /', function (){
    $GLOBALS['controller']->home();
});

$f3->route('GET|POST /personalInfo', function ($f3){
    $GLOBALS['controller']->personalInfo();
});


$f3->route('GET|POST /profileInfo', function ($f3){
    $GLOBALS['controller']->profileInfo();
});


$f3->route('GET|POST /interests', function ($f3){
    $GLOBALS['controller']->interests();
});

$f3->route('GET|POST /profileSummary', function ($f3){
    $GLOBALS['controller']->profileSummary();
});


// to run fat free
$f3->run();