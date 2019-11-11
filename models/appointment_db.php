<?php

require_once 'database.php';

class appointment_db {

//gets all appointments and oderers it my most recent date and earliest time ot latest time. 
    public static function select_all_appointments() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM appointment ORDER BY appDate DESC, appTime ASC  ';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $appointment = [];

        foreach ($rows as $value) {
            $appointment[$value['appID']] = new appointment($value['appID'], $value['subID'], $value['userID'], $value['tutorID'], $value['appDate'], $value['appTime'], $value['details'], $value['meetType']);
        }
        $statement->closeCursor();

        return $appointment;
    }

//get appointment for specific student
    public static function get_student_Appointments($userID) {
        $db = Database::getDB();

        $query = 'SELECT appointment.appDate, appointment.appTime, subjects.subName, user.fName, user.lName, tutor.fNAme, tutor.lName, appointment.details, appointment.meetType
              from appointment
                JOIN users on appointment.userID = users.userID
                JOIN tutor ON tutor.tutorID = appointment.tutorID
                JOIN subjects ON subjects.subID = appointment.subID
                where userID = :userID
                ORDER BY appDate DESC, appTime ASC';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $row = $statement->fetchAll();

        foreach ($row as $value) {
            $appointment[$value['appID']] = new appointment($value['appID'], $value['subID'], $value['userID'], $value['tutorID'], $value['appDate'], $value['appTime'], $value['details'], $value['meetType']);
        }

        $statement->closeCursor();
        return $appointment;
    }

//get appointment for specific tutor
    public static function get_tutor_Appointments($tutorID) {
        $db = Database::getDB();

       $query = 'SELECT appointment.appDate, appointment.appTime, subjects.subName, user.fName, user.lName, tutor.fNAme, tutor.lName, appointment.details, appointment.meetType'
                . 'from appointment'
                . 'JOIN users on appointment.userID = users.userID'
                . 'JOIN tutor ON tutor.tutorID = appointment.tutorID'
                . 'JOIN subjects ON subjects.subID = appointment.subID'
                . 'where tutorID = :tutorID'
                . 'ORDER BY appDate DESC, appTime ASC';
       
        $statement = $db->prepare($query);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->execute();
        $row = $statement->fetchAll();

        foreach ($row as $value) {
            $appointment[$value['appID']] = new appointment($value['appID'], $value['subID'], $value['userID'], $value['tutorID'], $value['appDate'], $value['appTime'], $value['details'], $value['meetType']);
        }

        $statement->closeCursor();
        return $appointment;
    }

    public static function get_Appointment_Detail($appID) {
        $db = Database::getDB();

        $query = 'SELECT appointment.appDate, appointment.appTime, subjects.subName, user.fName, user.lName, tutor.fNAme, tutor.lName, appointment.details, appointment.meetType'
                . 'from appointment'
                . 'JOIN users ON appointment.userID = users.userID'
                . 'JOIN tutor ON tutor.tutorID = appointment.tutorID'
                . 'JOIN subjects ON subjects.subID = appointment.subID'
                . 'where appID = :appID'
                . 'ORDER BY appDate DESC, appTime ASC';;
        $statement = $db->prepare($query);
        $statement->bindValue(':appID', $appID);
        $statement->execute();
        $row = $statement->fetchAll();

        foreach ($row as $value) {
            $appointment[$value['appID']] = new appointment($value['appID'], $value['subID'], $value['userID'], $value['tutorID'], $value['appDate'], $value['appTime'], $value['details'], $value['meetType']);
        }

        $statement->closeCursor();
        return $appointment;
    }

// add an appointment to the database
    public static function add_Appointment($subID, $userID, $tutorID, $appDate, $appTime, $details, $meetType) {
        $db = Database::getDB();

        $query = 'INSERT into appointment (subID, userID, tutorID, appDate, appTime, details, $meetType)
         VALUES
         (:subID, :userID, :tutorID, :appDate, :appTime, :details, :meetType)';


        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':subID', $subID);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':tutorID', $tutorID);
        $statement->bindValue(':appDate', $appDate);
        $statement->bindValue(':appTime', $appTime);
        $statement->bindValue(':details', $details);
        $statement->bindValue(':meetType', $meetType);

        $statement->execute();
        $statement->closeCursor();
    }

//delete appointment
    public static function deleteAppointment($appID) {
        $db = Database::getDB();

        $query = ' DELETE from appointment where appID = :appID';

        $statement = $db->prepare($query);
        $statement->bindValue(':appID', $appID);
        $statement->execute();
        $statement->closeCursor();
    }

}
