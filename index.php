<?php
//Dmytro Boichuk
//4/20/2020
// Dating Website


//to display errors
ini_set('display_errors',1);
error_reporting(E_ALL);


// require the autoload file
require_once("vendor/autoload.php");
require_once ("model/validate.php");
session_start();

//instantiate the F3 Base class
$f3=Base::instance();

// default route
$f3->route('GET /', function (){
    $view = new Template();
    echo $view->render("views/home.html");
});

$f3->route('GET|POST /personalInfo', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(!validName($_POST['fname'])){
            $f3->set("errors['fname']","Please provide valid first name.");
        }
        if(!validName($_POST['lname'])){
            $f3->set("errors['lname']","Please provide valid last name.");
        }
        if(!validAge($_POST['age'])){
            $f3->set("errors['age']","Please provide valid age.");
        }
        if(!validPhone($_POST['phone'])){
            $f3->set("errors['phone']","Please provide valid phone number.");
        }



        if (empty($f3->get('errors'))) {
            if(isset($_POST['premium'])){
                $_SESSION['premiumMember']=new PremiumMember($_POST['fname'],$_POST['lname'],
                    $_POST['age'],$_POST['gender'],$_POST['phone']);
            }
            else{
                $_SESSION['member']=new Member($_POST['fname'],$_POST['lname'],
                    $_POST['age'],$_POST['gender'],$_POST['phone']);
            }

            $f3->reroute('profileInfo');
        }


    }


    $f3->set('fname',$_POST['fname']);
    $f3->set('lname',$_POST['lname']);
    $f3->set('age',$_POST['age']);
    $f3->set('genders',array("male","female"));
    $f3->set('selectedGender', $_POST['gender']);
    $f3->set('phone',$_POST['phone']);
    $view = new Template();
    echo $view->render("views/personal.html");
});


$f3->route('GET|POST /profileInfo', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(!validEmail($_POST['email'])){
            $f3->set("errors['email']","Please provide valid email.");
        }
        else{
            $_SESSION['email']=$_POST['email'];
            $_SESSION['state']=$_POST['state'];
            $_SESSION['seeking']=$_POST['seeking'];
            $_SESSION['bio']=$_POST['bio'];

            $f3->reroute('interests');
        }




    }

    $f3->set('email', $_POST['email']);
    $f3->set('state', $_POST['state']);
    $f3->set('bio', $_POST['bio']);
    $f3->set('seeking',array("male","female"));
    $f3->set('selectedSeeking', $_POST['seeking']);
    $f3->set('states',array("Please Select", "Washington","Oregon","Arizona"));
    $f3->set("selectedState",$_POST['state']);
    $view = new Template();
    echo $view->render("views/profile.html");
});


$f3->route('GET|POST /interests', function ($f3){

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(!validIndoor($_POST['optionsIn'])){
            $f3->set("errors['indoor']","Please provide valid indoor activities.");
        }
        if(!validOutdoor($_POST['optionsOut'])){
            $f3->set("errors['outdoor']","Please provide valid outdoor activities.");
        }

        if (empty($f3->get('errors'))) {
            if(is_array($_POST['optionsOut'])&&is_array($_POST['optionsIn'])) {
                $_SESSION['interests'] = array_merge($_POST['optionsIn'], $_POST['optionsOut']);
                $f3->reroute("profileSummary");
            }
            else{
                if(is_array($_POST['optionsOut'])){
                    $_SESSION['interests'] = $_POST['optionsOut'];
                    $f3->reroute("profileSummary");
                }
                else{
                    $_SESSION['interests'] = $_POST['optionsIn'];
                    $f3->reroute("profileSummary");
                }
            }


        }


    }

    $f3->set('outdoor', array(array("hiking","walking"), array("biking", "climbing"),array("swimming"), array("collecting")));
    $f3->set('indoor',array(array("tv","puzzles"),array("movies","reading"), array("cooking", "playing cards"),array("board games", "video games")));

    if(isset($_POST['optionsIn'])) {
        $f3->set('selectedIn', $_POST['optionsIn']);
    }
    else{
        $f3->set('selectedIn', array("empty"));
    }

    if(isset($_POST['optionsOut'])) {
        $f3->set('selectedOut', $_POST['optionsOut']);
    }
    else{
        $f3->set('selectedOut', array("empty"));
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