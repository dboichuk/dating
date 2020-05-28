<?php

function validName($name){
    return ctype_alpha($name);
}
function validAge($age){
    return ($age>=18 && $age<=118) && is_numeric($age);
}
function validPhone($phone){
    return is_numeric($phone) && strlen($phone)>=10;
}
function validEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function validOutdoor($selected){
    $outdoor=array("hiking","walking", "biking", "climbing","swimming", "collecting");
    if (is_array($selected) || is_object($selected)) {
        foreach ($selected as $item) {
            if (!in_array($item, $outdoor)) {
                return false;
            }
        }

    }
    return true;
}
function validIndoor($selected){

    $indoor=array("tv","puzzles","movies","reading", "cooking", "playing cards","board games", "video games");
    if (is_array($selected) || is_object($selected)) {
        foreach ($selected as $item) {
            if (!in_array($item, $indoor)) {
                return false;
            }
        }

    }
    return true;
}