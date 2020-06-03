<?php

/**
 * Class Controller
 * this is controller for the website
 */
class Controller
{
    private $_f3;
    private $_validate;

    /**
     * Controller constructor.
     * @param $f3
     */
    public function __construct($f3)
    {
        $this->_f3=$f3;
        $this->_validate=new Validate();
    }

    /**
     * this is for home route
     */
    public function home()
    {
        session_destroy();
        $view = new Template();
        echo $view->render("views/home.html");
    }

    /**
     * this for personal Information route
     */
    public function personalInfo()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!$this->_validate->validName($_POST['fname'])){
                $this->_f3->set("errors['fname']","Please provide valid first name.");
            }
            if(!$this->_validate->validName($_POST['lname'])){
                $this->_f3->set("errors['lname']","Please provide valid last name.");
            }
            if(!$this->_validate->validAge($_POST['age'])){
                $this->_f3->set("errors['age']","Please provide valid age.");
            }
            if(!$this->_validate->validPhone($_POST['phone'])){
                $this->_f3->set("errors['phone']","Please provide valid phone number.");
            }



            if (empty($this->_f3->get('errors'))) {
                if(isset($_POST['premium'])){
                    $_SESSION['premiumMember']=new PremiumMember($_POST['fname'],$_POST['lname'],
                        $_POST['age'],$_POST['gender'],$_POST['phone']);
                }
                else{
                    $_SESSION['member']=new Member($_POST['fname'],$_POST['lname'],
                        $_POST['age'],$_POST['gender'],$_POST['phone']);
                }

                $this->_f3->reroute('profileInfo');
            }


        }

        $this->_f3->set('fname',$_POST['fname']);
        $this->_f3->set('lname',$_POST['lname']);
        $this->_f3->set('age',$_POST['age']);
        $this->_f3->set('genders',array("male","female"));
        $this->_f3->set('selectedGender', $_POST['gender']);
        $this->_f3->set('phone',$_POST['phone']);
        $view = new Template();
        echo $view->render("views/personal.html");
    }

    /**
     * this is for profile Infromation route
     */
    public function profileInfo()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!$this->_validate->validEmail($_POST['email'])){
                $this->_f3->set("errors['email']","Please provide valid email.");
            }
            else{
                if(isset($_SESSION['premiumMember'])){
                    $_SESSION['premiumMember']->setEmail($_POST['email']);
                    $_SESSION['premiumMember']->setState($_POST['state']);
                    $_SESSION['premiumMember']->setSeeking($_POST['seeking']);
                    $_SESSION['premiumMember']->setBio($_POST['bio']);

                    $this->_f3->reroute('interests');
                }

                if(isset($_SESSION['member'])){
                    $_SESSION['member']->setEmail($_POST['email']);
                    $_SESSION['member']->setState($_POST['state']);
                    $_SESSION['member']->setSeeking($_POST['seeking']);
                    $_SESSION['member']->setBio($_POST['bio']);

                    $this->_f3->reroute('profileSummary');
                }


            }

        }



        $this->_f3->set('email', $_POST['email']);
        $this->_f3->set('state', $_POST['state']);
        $this->_f3->set('bio', $_POST['bio']);
        $this->_f3->set('seeking',array("male","female"));
        $this->_f3->set('selectedSeeking', $_POST['seeking']);
        $this->_f3->set('states',array("Please Select", "Washington","Oregon","Arizona"));
        $this->_f3->set("selectedState",$_POST['state']);
        $view = new Template();
        echo $view->render("views/profile.html");
    }

    /**
     * this is for interests form route
     */
    public function interests()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if(!$this->_validate->validIndoor($_POST['optionsIn'])){
                $this->_f3->set("errors['indoor']","Please provide valid indoor activities.");
            }
            if(!$this->_validate->validOutdoor($_POST['optionsOut'])){
                $this->_f3->set("errors['outdoor']","Please provide valid outdoor activities.");
            }

            if (empty($this->_f3->get('errors'))) {

                $_SESSION['premiumMember']->setInDoorInterests($_POST['optionsIn']);
                $_SESSION['premiumMember']->setOutDoorInterests($_POST['optionsOut']);

                $this->_f3->reroute("profileSummary");

            }


        }

        $this->_f3->set('outdoor', array(array("hiking","walking"), array("biking", "climbing"),array("swimming"), array("collecting")));
        $this->_f3->set('indoor',array(array("tv","puzzles"),array("movies","reading"), array("cooking", "playing cards"),array("board games", "video games")));

        if(isset($_POST['optionsIn'])) {
            $this->_f3->set('selectedIn', $_POST['optionsIn']);
        }
        else{
            $this->_f3->set('selectedIn', array("empty"));
        }

        if(isset($_POST['optionsOut'])) {
            $this->_f3->set('selectedOut', $_POST['optionsOut']);
        }
        else{
            $this->_f3->set('selectedOut', array("empty"));
        }
        $view = new Template();
        echo $view->render("views/interests.html");
    }

    /**
     * this is for profile summary route
     */
    public function profileSummary()
    {
        $view = new Template();
        echo $view->render("views/profileSummary.html");
    }


}