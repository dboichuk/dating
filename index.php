<?php
//Dmytro Boichuk
//4/20/2020
// Dating Website


//to display errors
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

// require the autoload file
require_once("vendor/autoload.php");
require_once ("model/validate.php");

//instantiate the F3 Base class
$f3=Base::instance();

// default route
$f3->route('GET /', function (){
    $view = new Template();
    echo $view->render("views/home.html");
});

$f3->route('GET|POST /personalInfo', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['fname']=$_POST['fname'];
        $_SESSION['lname']=$_POST['lname'];
        $_SESSION['age']=$_POST['age'];
        $_SESSION['gender']=$_POST['gender'];
        $_SESSION['phone']=$_POST['phone'];





        $f3->reroute('profileInfo');
    }



    $view = new Template();
    echo $view->render("views/personal.html");
});


$f3->route('GET|POST /profileInfo', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $_SESSION['email']=$_POST['email'];
        $_SESSION['state']=$_POST['state'];
        $_SESSION['seeking']=$_POST['seeking'];
        $_SESSION['bio']=$_POST['bio'];

        $f3->reroute('interests');
    }



    $view = new Template();
    echo $view->render("views/profile.html");
});


$f3->route('GET|POST /interests', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {


        $_SESSION['interests']=$_POST['options'];



        $f3->reroute("profileSummary");
    }
    $view = new Template();
    echo $view->render("views/interests.html");

});

$f3->route('GET|POST /profileSummary', function ($f3){


    $view = new Template();
    echo $view->render("views/profileSummary.html");

});


// to run fat free
$f3->run();