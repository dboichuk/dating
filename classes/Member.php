<?php
class Member{

    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    /**
     * Member constructor.
     * @param $fname string
     * @param $lname string
     * @param $age string
     * @param $gender string
     * @param $phone string
     */
    public function __construct($fname,$lname,$age,$gender,$phone)
    {
        $this->_fname=$fname;
        $this->_lname=$lname;
        $this->_age=$age;
        $this->_gender=$gender;
        $this->_phone=$phone;
    }

    /** returns first name
     * @return string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /** sets first name
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /** returns last name
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /** sets last name
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /** returns age
     * @return mixed
     */
    public function getAge()
    {
        return $this->_age;
    }

    /** sets age
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /** get gender
     * @return string
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /** set gender
     * @param string
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /** get phone number
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /** set phone number
     * @param string
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /** get email
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**set email
     * @param string
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**get state
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /** set state
     * @param string
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /** get seeking
     * @return string
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /** set seeking
     * @param string
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /** get bio
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /** set bio
     * @param string
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }



}