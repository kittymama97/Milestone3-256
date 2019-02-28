<?php
namespace App\Services\Data;

use Illuminate\Support\Facades\Log;
use App\Services\Utility\DatabaseException;

class AdminDataService
{

    private $conn = null;

    // best practice: do not create a database connections in a dao
    // so you can support atomic database transactions
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
 
    // method to delete user
    public function deleteUser($id)
    {
        Log::info("Entering UserDataService.deleteUser()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare('DELETE FROM USER WHERE `USER_ID` = :id');
            // bind parameter
            $stmt->bindParam(':id', $id);
            // executes statement
            $delete = $stmt->execute();
            // returns true or false if user has been deleted from database
            if ($delete) {
                Log::info("Exiting UserDataService.deleteUser() with returning true");
                return true;
            } else {
                Log::info("Exiting UserDataService.deleteUser() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // method to suspend user
    public function suspendUser($id)
    {
        Log::info("Entering UserDataService.suspendUser()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare("UPDATE USER SET `ACTIVE` = '1' WHERE `USER_ID` = :id");
            // bind parameter
            $stmt->bindParam(':id', $id);
            // executes statement
            $suspend = $stmt->execute();
            // returns true or false if user active row has been set to 1
            if ($suspend) {
                Log::info("Exiting UserDataService.suspendUser() with returning true");
                return true;
            } else {
                Log::info("Exiting UserDataService.suspendUser() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // method to unsuspend user account
    public function unsuspendUser($id)
    {
        Log::info("Entering UserDataService.unsuspendUser()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare("UPDATE USER SET `ACTIVE` = '0' WHERE `USER_ID` = :id");
            // bind parameter
            $stmt->bindParam(':id', $id);
            // executes statement
            $suspend = $stmt->execute();
            // returns true or false if user active row has been set to 0
            if ($suspend) {
                Log::info("Exiting UserDataService.unsuspendUser() with returning true");
                return true;
            } else {
                Log::info("Exiting UserDataService.unsuspendUser() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
