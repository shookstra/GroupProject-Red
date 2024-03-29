<?php

class tutor
{
    private $tutorID;
    private $lName;
    private $fName;
    private $email;
    private $phone;
    private $city;
    private $active;

    function __construct($tutorID, $lName, $fName, $email, $phone, $city, $active)
    {
        $this->tutorID = $tutorID;
        $this->lName = $lName;
        $this->fName = $fName;
        $this->email = $email;
        $this->phone = $phone;
        $this->city = $city;
        $this->active = $active;
    }

    function getTutorID()
    {
        return $this->tutorID;
    }

    function getLName()
    {
        return $this->lName;
    }

    function getFName()
    {
        return $this->fName;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function getCity()
    {
        return $this->city;
    }
    
    function getActive()
    {
        return $this->active;
    }

    function setTutorID($tutorID)
    {
        $this->tutorID = $tutorID;
    }

    function setLName($lName)
    {
        $this->lName = $lName;
    }

    function setFName($fName)
    {
        $this->fName = $fName;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function setCity($city)
    {
        $this->city = $city;
    }
    
    function setActive($active)
    {
        $this->active = $active;
    }
}
