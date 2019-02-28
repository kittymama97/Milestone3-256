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
use App\Models\JobModel;
use App\Services\Data\JobDataService;

class JobBusinessService
{

    public function createJobPost(JobModel $jobModel)
    {
        Log::info("Entering JobBusinessService.createJobPost()");
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
        $service = new JobDataService($conn);
        // calls the createJobPost command
        $flag = $service->createJobPost($jobModel, $conn);
        // return the finder results
        return $flag;
        Log::info("Exit JobBusinessService.createJobPost() with " . $flag);
    }

    public function updateJobPost(JobModel $jobModel)
    {
        Log::info("Entering JobBusinessService.updateJobPost()");
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
        $service = new JobDataService($conn);
        // calls the updateJobPosting command
        $flag = $service->updateJobPost($jobModel, $conn);
        // return the finder results
        return $flag;
        Log::info("Exit JobBusinessService.createJobPost() with " . $flag);
    }

    public function deleteJobPost($id)
    {
        Log::info("Entering JobBusinessService.deleteJobPost()");
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
        $service = new JobDataService($conn);
        // calls the deleteJobPost command
        $flag = $service->deleteJobPost($id);
        // return the finder results
        return $flag;
        Log::info("Exit JobBusinessService.deleteJobPost() with " . $flag);
    }

    public function showJobPosts()
    {
        Log::info("Entering JobBusinessService.showJobPosts()");
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
        $service = new JobDataService($conn);
        // calls the findAllUsers command
        $flag = $service->showAllJobPosts();
        // return the finder results
        return $flag;
        Log::info("Exit JobBusinessService.showJobPosts() with " . $flag);
    }
}