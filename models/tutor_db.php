<?php

require_once 'database.php';

class tutor_db
{

    //gets all the tutors
    public static function select_all_Tutors()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM tutor where active = true';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutors = [];

        foreach ($rows as $value) {
            $tutors[$value['tutorID']] = new tutor($value['tutorID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['city'], $value['active']);
        }
        $statement->closeCursor();

        return $tutors;
    }
    
    public static function select_all()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT tutorID FROM tutor';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutors = [];

        foreach ($rows as $value) {
            array_push($tutors, $value['tutorID']);
            
        }
        $statement->closeCursor();

        return $tutors;
    }
    
    public static function select_distinct_subject_days()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT distinct(day) FROM tutor_availability ';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        //$results = $statement->fetchAll();
        
//        $statement->closeCursor();
//        return $results;
        
        $rows = $statement->fetchAll();
        $days_for_sub = [];

        foreach ($rows as $value) {
            array_push($days_for_sub, $value['day']);
        }
        $statement->closeCursor();

        return $days_for_sub;
    }

    //this selects all tutors and groups them by city ascending
    public static function select_all_GroupByCity()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM tutors Group by city ORDER BY city ASC';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutors = [];

        foreach ($rows as $value) {
            $tutors[$value['tutorID']] = new tutor($value['tutorID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['city'], $value['active']);
        }
        $statement->closeCursor();

        return $tutors;
    }

    //this will return tutor and subjects. this still need work and needs to be tested
    public static function getSubjects($tutorID)
    {
        $db = Database::getDB();

        $query = 'SELECT subjects.subName from subjects
                JOIN tutorsubject on subjects.subID = tutorsubject.subID
                JOIN tutor on tutorsubject.tutorID = tutor.tutorID
                WHERE tutorsubject.tutorID = :tutorID';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();

        return $results;
    }

    //add a tutor
    public static function add_Tutor($tutorID, $firstName, $lastName, $email, $phone, $city, $active)
    {
        $db = Database::getDB();

        $query = 'INSERT into tutor (tutorID, fName, lName, email, phone, city, active)
         VALUES
         (:tutorID, :fName, :lName, :email, :phone, :city, :active)';


        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':tutorID', $tutorID);
        $statement->bindValue(':fName', $firstName);
        $statement->bindValue(':lName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':active', $active);


        $statement->execute();
        $statement->closeCursor();
    }

    public static function get_tutor_by_availability($day)
    {
        $db = Database::getDB();
        $query = 'select tutor.tutorID, tutor.fName, tutor.lName, subject.subject, tutor_availabilty.start, tutor_availabilty.end, tutor_availabilty.day
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availabilty on tutor.tutorID = tutor_availabilty.tutorID
                  where tutor_availabilty.day = :day AND tutor.active = 1';

        $statement = $db->prepare($query);
        $statement->bindValue(':day', $day);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutor_available = [];

        foreach ($rows as $value) {
            $tutor_available[$value['tutorID']] = new tutor_availability($value['tutorID'], $value['fName'], $value['lName'], $value['subject'], $value['start'], $value['end'], $value['day']);
        }

        $statement->closeCursor();
        return $tutor_available;
    }

    public static function get_tutor_by_id($tutorID)
    {
        $db = Database::getDB();

        $query = 'SELECT * FROM tutor WHERE tutorID = :tutorID';
        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $rows = $statement->fetchAll();

        foreach ($rows as $value) {
            $tutor = new tutor($value['tutorID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['city'], $value['active']);
        }

        return $tutor;
    }

    public static function get_tutor_lastname_by_id($tutorID)
    {
        $db = Database::getDB();

        $query = 'SELECT lName FROM tutor WHERE tutorID = :tutorID';
        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $row = $statement->fetch();

        return $row;
    }

    public static function get_tutor_availablity()
    {
        $db = Database::getDB();
        $query = 'select tutor.tutorID, tutor.fName, tutor.lName, tutor_availability.start, tutor_availability.end, tutor_availability.day
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availability on tutor.tutorID = tutor_availability.tutorID
                          where tutor.active = 1';

        $statement = $db->prepare($query);

        $statement->execute();
        $rows = $statement->fetchAll();
        $tutor_available = [];

        foreach ($rows as $value) {
            $tutor_available[$value['tutorID']] = new tutor_availability($value['tutorID'], $value['fName'], $value['lName'], $value['start'], $value['end'], $value['day']);
        }

        $statement->closeCursor();
        return $tutor_available;
    }

    public static function get_tutor_availablity_by_ID($tutorID)
    {
        $db = Database::getDB();
        $query = 'SELECT tutor.tutorID, tutor.fName, tutor.lName, 
                  tutor_availability.start, tutor_availability.end, 
                  tutor_availability.day 
                  FROM tutor JOIN tutor_availability 
                  on tutor.tutorID = tutor_availability.tutorID 
                  WHERE tutor_availability.tutorID = :tutorID';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutor_available = [];

        foreach ($rows as $value) {
            $tutor = new tutor_availability($value['tutorID'], $value['fName'], $value['lName'], $value['start'], $value['end'], $value['day']);
            array_push($tutor_available, $tutor);
        }

        $statement->closeCursor();
        return $tutor_available;
    }

    //Used to pull tutors and their availability for the calendar. DO NOT DELETE
    public static function get_tutors_by_availability()
    {
        $db = Database::getDB();
        $query = 'select tutor.tutorID, tutor.fName, tutor.lName, tutor_availability.start, tutor_availability.end, tutor_availability.day
                  from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
			  join tutor on tutorsubject.tutorID = tutor.tutorID
			  join tutor_availability on tutor.tutorID = tutor_availability.tutorID
                          WHERE tutor.active = 1';
        $statement = $db->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll();
        $tutor_available = [];
        foreach ($rows as $value) {
            $tutor_available[$value['tutorID']] = new tutor_availability($value['tutorID'], $value['fName'], $value['lName'], $value['start'], $value['end'], $value['day']);
        }
        $statement->closeCursor();
        return $tutor_available;
    }

    // delete tutor from tutor table
    public static function deleteTutor($tutorID)
    {
        $db = Database::getDB();

        $query = ' DELETE from tutor where tutorID = :tutorID';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $statement->closeCursor();
    }

    // delete tutor from tutor_availability table
    public static function deleteTutor_Availability($tutorID)
    {
        $db = Database::getDB();

        $query = ' DELETE from tutor_availability where tutorID = :tutorID';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    // delete tutor from tutor_availability table
    public static function deleteTutor_Availability_with_day($tutorID, $day)
    {
        $db = Database::getDB();

        $query = ' DELETE from tutor_availability where tutorID = :tutorID && day = :day';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->bindValue(':day', $day);
        $statement->execute();
        $statement->closeCursor();
    }

    // delete tutor from tutorsubject table
    public static function delete_Tutor_Subject($tutorID)
    {
        $db = Database::getDB();

        $query = ' DELETE from tutorsubject where tutorID = :tutorID';

        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function add_tutor_availability($tutorID, $day, $start, $end, $hours)
    {
        $db = Database::getDB();

        $query = 'INSERT into tutor_availability (tutorID, day, start, end, hours)
         VALUES
         (:tutorID, :day, :start, :end, :hours)';


        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':tutorID', $tutorID);
        $statement->bindValue(':day', $day);
        $statement->bindValue(':start', $start);
        $statement->bindValue(':end', $end);
        $statement->bindValue(':hours', $hours);


        $statement->execute();
        $statement->closeCursor();
    }
    
       public static function update_Tutor($firstName, $lastName, $phone, $tutorID) {
        $db = Database::getDB();

        $query = 'UPDATE tutor 
                    Set fName = :firstName, lName = :lastName, phone = :phone
                    where tutorID = :userID';

        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':userID', $tutorID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function set_Tutor_activity($tutorID, $active) {
        $db = Database::getDB();

        $query = 'UPDATE tutor 
                    Set active = :active
                    where tutorID = :userID';

        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':active', $active);
        $statement->bindValue(':userID', $tutorID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function getSubjects_on_days()
    {
        $db = Database::getDB();

        $query = 'select subjects.subName, tutor_availability.day 
                    from subjects join tutorsubject on subjects.subID = tutorsubject.subID 
                                  join tutor on tutorsubject.tutorID = tutor.tutorID
                                  join tutor_availability on tutor_availability.tutorID = tutor.tutorID';

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();
        
        $statement->closeCursor();
        return $results;
    }
}
