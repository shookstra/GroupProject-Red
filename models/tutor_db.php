<?php

require_once 'database.php';

class tutor_db {

    //gets all the tutors
    public static function select_all_Tutors() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM tutors ';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutors = [];

        foreach ($rows as $value) {
            $tutors[$value['tutorID']] = new tutor($value['tutorID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['city']);
        }
        $statement->closeCursor();

        return $tutors;
    }

    //this selects all tutors and groups them by city ascending
    public static function select_all_GroupByCity() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM tutors Group by city ORDER BY city ASC';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutors = [];

        foreach ($rows as $value) {
            $tutors[$value['tutorID']] = new tutor($value['tutorID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['city']);
        }
        $statement->closeCursor();

        return $tutors;
    }

//this will return tutor and subjects. this still need work and needs to be tested
   public static function getSubjects($tutorID) {
          $db = Database::getDB();

        $query = 'SELECT tutor.fName, turor.lName, subject.Name, tutor.city'
                . 'FROM tutor JOIN tutorsubject ON tutor.tutorID = tutorsubject.tutorID'
                . ' join  subjects on subjects.subID = tutorsubject.subID';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $results = $statement->fetch();
        // $subjectName = $results['firstName'] . ' ' . $results['lastName'];
        $statement->closeCursor();

        return $results;
    }

    //add a tutor
    public static function add_Tutor($firstName, $lastName,$email,  $phone, $city) {
        $db = Database::getDB();

        $query = 'INSERT into tutor (fName, lName,email, pjone, city)
         VALUES
         (:fName, :lName, :email, :phone :city)';


        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':fName', $firstName);
        $statement->bindValue(':lName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':city', $city);


        $statement->execute();
        $statement->closeCursor();
    }

}
