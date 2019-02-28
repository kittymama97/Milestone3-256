<?php
// Emily Quevedo
// CST 256
// February 3, 2019
// This is my own work
/* Handles user business logic and connections to database */
namespace App\Services\Business;

use PDO;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use App\Services\Data\UserDataService;

class UserBusinessService
{

    public function createUser(UserModel $user)
    {
        Log::info("Entering UserBusinessService.createUser()");

        // best practice: externalize your app configuration
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        // best practice: do not create database connections in a dao
        // create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // create a security service dao with this connection and try to find the password in user
        $service = new UserDataService($conn);
        $flag = $service->createUser($user);

        // return the finder results
        Log::info("Exit UserBusinessService.createUser() with " . $flag);
        return $flag;
    }

    public function updateUser(UserModel $userModel)
    {
        Log::info("Entering UserBusinessService.updateUser()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // best practice: do not create database connections in a dao
        // create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find users
        $service = new UserDataService($conn);
        // calls the findAllUsers command
        $flag = $service->updateUser($userModel);
        // return the finder results
        return $flag;
        Log::info("Exit UserBusinessService.displayUsers() with " . $flag);
    }

    public function displayUsers()
    {
        Log::info("Entering UserBusinessService.displayUsers()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // best practice: do not create database connections in a dao
        // create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find users
        $service = new UserDataService($conn);
        // calls the findAllUsers command
        $flag = $service->findAllUsers();
        // return the finder results
        return $flag;
        Log::info("Exit UserBusinessService.displayUsers() with " . $flag);
    }
}