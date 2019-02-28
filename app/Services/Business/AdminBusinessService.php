<?php
// Emily Quevedo
// CST 256
// February 3, 2019
// This is my own work
/* Handles user business logic and connections to database */
namespace App\Services\Business;

use App\Services\Data\UserDataService;
use Illuminate\Support\Facades\Log;
use PDO;
use App\Services\Data\AdminDataService;

class AdminBusinessService
{

    public function deleteUser($id)
    {
        Log::info("Entering UserBusinessService.deleteUser()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new AdminDataService($conn);
        $flag = $service->deleteUser($id);
        // return the finder results
        Log::info("Exit SecurityService.deleteUser() with " . $flag);
        return $flag;
    }

    public function suspendUser($id)
    {
        Log::info("Entering UserBusinessService.suspendUser()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and suspend user
        $service = new AdminDataService($conn);
        $flag = $service->suspendUser($id);
        // return the finder results
        Log::info("Exit SecurityService.suspendUser() with " . $flag);
        return $flag;
    }

    public function unsuspendUser($id)
    {
        Log::info("Entering UserBusinessService.unsuspendUser()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and unsuspend user
        $service = new AdminDataService($conn);
        $flag = $service->unsuspendUser($id);
        // return the finder results
        Log::info("Exit SecurityService.unsuspendUser() with " . $flag);
        return $flag;
    }
}