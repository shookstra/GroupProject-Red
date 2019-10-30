<?php

require_once 'database.php';

class user_db
{

    //gets all the users
    public static function select_all()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM users ';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $users[$value['userID']] = new user($value['userID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['role'], $value['password']);
        }
        $statement->closeCursor();

        return $users;
    }

    // allows the user to login
    public static function login($email, $password)
    {
        $db = Database::getDB();

        $query = 'SELECT * FROM users WHERE email= :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        if ($statement->rowCount() === 1) {
            $row = $statement->fetch();
            $id = $row['userID'];
            $firstName = $row['fName'];
            $lastName = $row['lName'];
            $email = $row['email'];
            $phone = $row['phone'];
            $role = $row['role'];
            $hashed_pw = $row['password'];
            if (password_verify($password, $hashed_pw)) {
                return $email;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    //this gets only the tutors from the database
    public static function select_Tutors()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM users WHERE role = tutor';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $users[$value['userID']] = new user($value['userID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['role'], $value['password']);
        }
        $statement->closeCursor();

        return $users;
    }

    //this gets only the students accounts 
    public static function select_Students()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM users WHERE role = student';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $users[$value['userID']] = new user($value['userID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['role'], $value['password']);
        }
        $statement->closeCursor();

        return $users;
    }

    //this gets only the admin accounts
    public static function select_Admins()
    {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM users WHERE role = admin';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $users = [];

        foreach ($rows as $value) {
            $users[$value['userID']] = new user($value['userID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['role'], $value['password']);
        }
        $statement->closeCursor();

        return $users;
    }

    //this returns a specific user detail based on email
    public static function get_specificUser($email)
    {
        $db = Database::getDB();

        $query = 'SELECT * from USERS where email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetchAll();

        foreach ($row as $value) {
            $user = new user($value['userID'], $value['lName'], $value['fName'], $value['email'], $value['phone'], $value['role'], $value['password']);
        }

        $statement->closeCursor();
        return $user;
    }

    //this gets the users role type which determines the experience of the website
    public static function get_roleType($email)
    {
        $db = Database::getDB();

        $query = 'SELECT role FROM Users WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $roleType = $statement->fetch();
        $statement->closeCursor();

        return $roleType['role'];
    }
    //gets user email
    public static function get_email($email)
    {
        $db = Database::getDB();

        $query = 'SELECT email FROM users where email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $valid = true;
        if (strtolower($row['email']) === strtolower($email)) {
            $valid = false;
        }

        $statement->closeCursor();
        return $valid;
    }

    //This is to add a new user
    public static function add_user($firstName, $lastName, $email, $phone, $role, $password)
    {
        $db = Database::getDB();

        $query = 'INSERT into users (fName, lName, email, phone, role,  password)
         VALUES
         (:fName, :lName, :email, :phone, :role, :password,)';


        $statement = $db->prepare($query);
        //bind the values
        $statement->bindValue(':fName', $firstName);
        $statement->bindValue(':lName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':role', $role);
        $statement->bindValue(':password', $password);

        $statement->execute();
        $statement->closeCursor();
    }

    //delete user from database
    public static function deleteUser($email)
    {
        $db = Database::getDB();

        $query = ' DELETE from users where email = :email';

        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
    }
}
