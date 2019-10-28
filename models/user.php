<?php

class user {

    private $userID;
    private $lName;
    private $fName;
    private $email;
    private $phone;
    private $role;
    private $password;

    function __construct($userID, $lName, $fName, $email, $phone, $role, $password) {
        $this->userID = $userID;
        $this->lName = $lName;
        $this->fName = $fName;
        $this->email = $email;
        $this->phone = $phone;
        $this->role = $role;
        $this->password = $password;
    }
    function getUserID() {
        return $this->userID;
    }

    function getLName() {
        return $this->lName;
    }

    function getFName() {
        return $this->fName;
    }

    function getEmail() {
        return $this->email;
    }

    function getPhone() {
        return $this->phone;
    }

    function getRole() {
        return $this->role;
    }

    function getPassword() {
        return $this->password;
    }
    function setUserID($userID) {
        $this->userID = $userID;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function setPassword($password) {
        $this->password = $password;
    }
}
?>