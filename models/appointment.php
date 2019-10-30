<?php

class appointment {
    
    private $appID;
    private $subID;
    private $userID;
    private $tutorID;
    private $appDate;
    private $appTime;
    private $details;
    private $meetType;
    
    function __construct($appID, $subID, $userID, $tutorID, $appDate, $appTime, $details, $meetType) {
        $this->appID = $appID;
        $this->subID = $subID;
        $this->userID = $userID;
        $this->tutorID = $tutorID;
        $this->appDate = $appDate;
        $this->appTime = $appTime;
        $this->details = $details;
        $this->meetType = $meetType;
    }
    function getAppID() {
        return $this->appID;
    }

    function getSubID() {
        return $this->subID;
    }

    function getUserID() {
        return $this->userID;
    }

    function getTutorID() {
        return $this->tutorID;
    }

    function getAppDate() {
        return $this->appDate;
    }

    function getAppTime() {
        return $this->appTime;
    }

    function getDetails() {
        return $this->details;
    }

    function getMeetType() {
        return $this->meetType;
    }

    function setAppID($appID) {
        $this->appID = $appID;
    }

    function setSubID($subID) {
        $this->subID = $subID;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }

    function setTutorID($tutorID) {
        $this->tutorID = $tutorID;
    }

    function setAppDate($appDate) {
        $this->appDate = $appDate;
    }

    function setAppTime($appTime) {
        $this->appTime = $appTime;
    }

    function setDetails($details) {
        $this->details = $details;
    }

    function setMeetType($meetType) {
        $this->meetType = $meetType;
    }
}
?>