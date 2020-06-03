<?php

/**
 * Class Validate
 * this class is for data validation
 */
class Validate
{
    /**
     * will check if name is valid
     * @param $name
     * @return bool
     */
    function validName($name)
    {
        return ctype_alpha($name);
    }

    /**
     * will check if age is valid
     * @param $age
     * @return bool
     */
    function validAge($age)
    {
        return ($age >= 18 && $age <= 118) && is_numeric($age);
    }

    /**
     * will check if phone is valid
     * @param $phone
     * @return bool
     */
    function validPhone($phone)
    {
        return is_numeric($phone) && strlen($phone) >= 10;
    }

    /**
     * will check if email has correct format
     * @param $email
     * @return mixed
     */
    function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * will check if email has correct format
     * @param $selected
     * @return bool
     */
    function validOutdoor($selected)
    {
        $outdoor = array("hiking", "walking", "biking", "climbing", "swimming", "collecting");
        if (is_array($selected) || is_object($selected)) {
            foreach ($selected as $item) {
                if (!in_array($item, $outdoor)) {
                    return false;
                }
            }

        }

        return true;
    }


    /**
     * will check if passed item is array and then checks if it is correct item
     * @param $selected
     * @return bool
     */
    function validIndoor($selected)
    {

        $indoor = array("tv", "puzzles", "movies", "reading", "cooking", "playing cards", "board games", "video games");
        if (is_array($selected) || is_object($selected)) {
            foreach ($selected as $item) {
                if (!in_array($item, $indoor)) {
                    return false;
                }
            }

        }
        return true;
    }
}