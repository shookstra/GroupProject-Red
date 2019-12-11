<?php

require_once 'database.php';

class subject_db {

    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM subjects';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $subjects = [];

        foreach ($rows as $value) {
            $subjects[$value['subID']] = new subject($value['subID'], $value['subName']);
        }
        $statement->closeCursor();

        return $subjects;
    }

    public static function select_subject_by_ID($subjectID) {
        $db = Database::getDB();

        $querySubjects = 'SELECT * FROM subjects WHERE subID = :subjectID';
        $statement = $db->prepare($querySubjects);
        $statement->bindValue(':subjectID', $subjectID);
        $statement->execute();
        $rows = $statement->fetchAll();

        foreach ($rows as $value) {
            $subject = new subject($value['subID'], $value['subName']);
        }
        $statement->closeCursor();

        return $subject;
    }

    //this will return tutor and subjects. this still need work and needs to be tested
    public static function get_tutor_Subjects($tutorID) {
        $db = Database::getDB();

        $query = 'SELECT tutor.tutorID, tutor.fName, tutor.lName, subjects.subName, tutor.city
                FROM tutor JOIN tutorsubject ON tutor.tutorID = tutorsubject.tutorID
                join  subjects on subjects.subID = tutorsubject.subID
                where tutorsubject.tutorID = :tutorID';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $rows = $statement->fetch();
        $tutors = [];

        foreach ($rows as $value) {
            $tutors[$value['tutorID']] = new tutor($value['tutorID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['city']);
        }
        $statement->closeCursor();

        return $tutors;
    }

    // add an subject to the database
    public static function add_Subject($subName) {
        $db = Database::getDB();

        $query = 'INSERT into subjects (subName)
         VALUES
         (:subName)';


        $statement = $db->prepare($query);
        //bind the values
        
        $statement->bindValue(':subName', $subName);


        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function add_tutor_Subject($subID, $tutorID) {
        $db = Database::getDB();

        $query = 'INSERT into tutorsubject (subID, tutorID)
         VALUES
         (:subID, :tutorID)';


        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':subID', $subID);
        $statement->bindValue(':tutorID', $tutorID);
        

        $statement->execute();
        $statement->closeCursor();
    }

    //delete subject from database
    public static function deleteSubject($subID) {
        $db = Database::getDB();

        $query = ' DELETE from subjects where subID = :subID';

        $statement = $db->prepare($query);
        $statement->bindValue(':subID', $subID);
        $statement->execute();
        $statement->closeCursor();
    }

}
