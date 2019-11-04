<?php

class subject {

    private $subID;
    private $subName;
    
    function __construct($subID, $subName) {
        $this->subID = $subID;
        $this->subName = $subName;
    }
    function getSubID() {
        return $this->subID;
    }

    function getSubName() {
        return $this->subName;
    }

    function setSubID($subID) {
        $this->subID = $subID;
    }

    function setSubName($subName) {
        $this->subName = $subName;
    }


}