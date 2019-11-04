<?php


class tutor_availablity {
    
    private $tutorID, $fName, $lName, $subject, $start, $end, $day;
    function __construct($tutorID, $fName, $lName, $subject, $start, $end, $day) {
        
        $this->tutorID= $tutorID;
        $this->fName = $storeIDNum;
        $this->lName = $invoiceDate;
        $this->subject = $invoiceTotal;
        $this->start = $userName;
	$this->end = $invoiceTotal;
        $this->day = $userName;
        
        
        
    }
    function getTutorID() {
        return $this->tutorID;
    }

    function getFName() {
        return $this->fName;
    }

    function getLName() {
        return $this->lName;
    }

    function getSubject() {
        return $this->subject;
    }

    function getStart() {
        return $this->start;
    }
	
    function getEnd() {
        return $this->end;
    }

    function getDay() {
        return $this->day;
    }

    function setTutorID($tutorID) {
        $this->tutorID = $tutorID;
    }

    function setFName($fName) {
        $this->fName = $fName;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }

    function setSubject($subject) {
        $this->subject = $subject;
    }

    function setStart($start) {
        $this->start = $start;
    }
	
    function setEnd($end) {
        $this->end = $end;
    }

    function setDay($day) {
        $this->day = $day;
    }
}
