<?php
// Emily Quevedo
// CST 256
// February 4, 2019
// This is my own work
// Database interacts with the data from the User class
namespace App\Services\Data;

use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;
use App\Services\Utility\DatabaseException;

class UserDataService
{

    private $conn = null;

    // best practice: do not create a database connections in a dao
    // so you can support atomic database transactions
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // method to find all users in the database
    public function findAllUsers()
    {
        Log::info("Entering UserDataService.findAllUsers()");
        try {
            // prepared statement is created to
            $stmt = $this->conn->prepare('SELECT * FROM USER');
            // executes prepared query
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // user array is created
                $userArray = array();
                // fetches result from prepared statement and returns as an array
                while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // inserts variables into end of array
                    array_push($userArray, $user);
                }
                Log::info("Exit UserDataService.findAllUsers() with true");
                // return user array
                return $userArray;
            }
        } catch (PDOException $e) {
            // best practice: catch all exceptions (do not swallow exceptions),
            // log the exception, do not throw technology specific exceptions,
            // and throw a custom exception
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // method to find user
    public function findByUser(UserModel $user)
    {
        Log::info("Entering UserDataService.findByUser()");
        try {
            // select username and password and see if the row exists
            $username = $user->getUsername();
            $password = $user->getPassword();
            $stmt = $this->conn->prepare('SELECT USER_ID, USERNAME, PASSWORD, ROLE, ACTIVE FROM USER WHERE USERNAME = :username AND PASSWORD = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            /*
             * see if user existed and return true if found
             * else return false if not found
             */
            if ($stmt->rowCount() == 1) {
                // temporary session variables set for user login and navbar
                $row = $stmt->fetch();
                $_SESSION['USER_ID'] = $row['USER_ID'];
                $_SESSION['ROLE'] = $row['ROLE'];
                $_SESSION['ACTIVE'] = $row['ACTIVE'];
                Log::info("Exit UserDataService.findByUser() with true");
                return true;
            } else {
                Log::info("Exit UserDataService.findByUser() with false");
                return false;
            }
        } catch (PDOException $e) {
            // best practice: catch all exceptions (do not swallow exceptions),
            // log the exception, do not throw technology specific exceptions,
            // and throw a custom exception
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function findByUserID(UserModel $user, $id)
    {
        Log::info("Entering UserDataService.findByUserID()");
        try {
            // select username and password and see if the row exists
            $id = $user->getId();
            $stmt = $this->conn->prepare("SELECT USER_ID FROM USER WHERE USER_ID = :user_id");
            $stmt->bindParam(':user_id', $id);
            $stmt->execute();
            /*
             * see if user existed and return true if found
             * else return false if not found
             */
            if ($stmt->rowCount() == 1) {
                // temporary session variables set for user login and navbar
                $row = $stmt->fetch();
                $_SESSION['USER_ID'] = $row['USER_ID'];
                $_SESSION['ROLE'] = $row['ROLE'];
                $_SESSION['ACTIVE'] = $row['ACTIVE'];
                Log::info("Exit UserDataService.findByUser() with true");
                return true;
            } else {
                Log::info("Exit UserDataService.findByUser() with false");
                return false;
            }
        } catch (PDOException $e) {
            // best practice: catch all exceptions (do not swallow exceptions),
            // log the exception, do not throw technology specific exceptions,
            // and throw a custom exception
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // method to create new user
    public function createUser(UserModel $user)
    {
        Log::info("Entering UserDataService.createNewUser()");
        try {
            // select variables and see if the row exists
            $firstname = $user->getFirstname();
            $lastname = $user->getLastname();
            $email = $user->getEmail();
            $username = $user->getUsername();
            $password = $user->getPassword();
            $role = $user->getRole();
            $active = $user->getActive();
            // prepared statement is created
            $stmt = $this->conn->prepare("INSERT INTO `USER` (`FIRSTNAME`, `LASTNAME`, `EMAIL`, `USERNAME`, `PASSWORD`, `ROLE`, `ACTIVE`) VALUES (:firstname, :lastname, :email, :username, :password, :role, :active)");
            // binds parameters
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':active', $active);
            /*
             * see if user existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit UserDataService.createNewUser() with true");
                return true;
            } else {
                Log::info("Exit UserDataService.createNewUser() with false");
                return false;
            }
        } catch (PDOException $e) {
            // best practice: catch all exceptions (do not swallow exceptions),
            // log the exception, do not throw technology specific exceptions,
            // and throw a custom exception
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function updateUser(UserModel $userModel)
    {
        Log::info("Entering UserDataService.createNewUser()");
        try {
            // select variables and see if the row exists
            $firstname = $userModel->getFirstname();
            $lastname = $userModel->getLastname();
            $email = $userModel->getEmail();
            $username = $userModel->getUsername();
            $password = $userModel->getPassword();
            // prepared statement is created
            $stmt = $this->conn->prepare("UPDATE `USER` SET `FIRSTNAME`= :firstname, `LASTNAME` = :lastname, `EMAIL` = :email, `USERNAME` = :username, `PASSWORD` = :password) VALUES (:firstname, :lastname, :email, :username, :password)");
            // binds parameters
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            /*
             * see if user existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit UserDataService.createNewUser() with true");
                return true;
            } else {
                Log::info("Exit UserDataService.createNewUser() with false");
                return false;
            }
        } catch (PDOException $e) {
            // best practice: catch all exceptions (do not swallow exceptions),
            // log the exception, do not throw technology specific exceptions,
            // and throw a custom exception
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
    