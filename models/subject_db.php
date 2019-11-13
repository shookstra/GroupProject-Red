<?php

require_once 'database.php';

class subject_db
{

    public static function select_all()
    {
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

    public static function select_subject_by_ID($subjectID)
    {
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

    // add an subject to the database
    public static function add_Subject($subID, $subName)
    {
        $db = Database::getDB();

        $query = 'INSERT into subjects (subID, subName)
         VALUES
         (:subID, :subName)';


        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':subID', $subID);
        $statement->bindValue(':subName', $subName);


        $statement->execute();
        $statement->closeCursor();
    }
    //delete subject from database
    public static function deleteSubject($subID)
    {
        $db = Database::getDB();

        $query = ' DELETE from subjects where subID = :subID';

        $statement = $db->prepare($query);
        $statement->bindValue(':subID', $subID);
        $statement->execute();
        $statement->closeCursor();
    }
}
