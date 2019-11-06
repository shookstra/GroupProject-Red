<?php


class tutor_availability {
    
    private $tutorID, $fName, $lName, $start, $end, $day;
    function __construct($tutorID, $fName, $lName, $start, $end, $day) {
        
        $this->tutorID= $tutorID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->start = $start;
	$this->end = $end;
        $this->day = $day;
        
        
        
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
