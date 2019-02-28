<?php
namespace App\Services\Data;

use App\Models\JobModel;
use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;
use App\Services\Utility\DatabaseException;

class JobDataService
{

    private $conn = null;

    // best practice: do not create a database connections in a dao
    // so you can support atomic database transactions
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createJobPost(JobModel $jobModel, $conn)
    {
        Log::info("Entering ProfileDataService.createJobPost()");
        try {
            // select variables and see if the row exists
            $company_name = $jobModel->getCompany_name();
            $company_city = $jobModel->getCompany_city();
            $company_state = $jobModel->getCompany_state();
            $company_zip = $jobModel->getCompany_zip_code();
            $job_title = $jobModel->getJob_title();
            $job_description = $jobModel->getJob_desciption();
            $date_posted = $jobModel->getDate_posted();
            // prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO `JOB` (`JOB_ID`, `COMPANY_NAME`, `COMPANY_CITY`, `COMPANY_STATE`, `COMPANY_ZIP_CODE`, `JOB_TITLE`, `JOB_DESCRIPTION`, `DATE_POSTED`) VALUES (NULL, :company_name, :company_city, :company_state, :company_zip_code, :job_title, :job_description, :date_posted);");
            // binds parameters
            $stmt->bindParam(':company_name', $company_name);
            $stmt->bindParam(':company_city', $company_city);
            $stmt->bindParam(':company_state', $company_state);
            $stmt->bindParam(':company_zip_code', $company_zip);
            $stmt->bindParam(':job_title', $job_title);
            $stmt->bindParam(':job_description', $job_description);
            $stmt->bindParam(':date_posted', $date_posted);
            /*
             * see if skills existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit JobDataService.createJobPost() with true");
                return true;
            } else {
                Log::info("Exit JobDataService.createJobPost() with false");
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

    public function updateJobPost(JobModel $jobModel, $conn)
    {
        Log::info("Entering ProfileDataService.updateJobPost()");
        try {
            // select variables and see if the row exists
            $job_id = $jobModel->getJob_id();
            $company_name = $jobModel->getCompany_name();
            $company_city = $jobModel->getCompany_city();
            $company_state = $jobModel->getCompany_state();
            $company_zip = $jobModel->getCompany_zip_code();
            $job_title = $jobModel->getJob_title();
            $job_description = $jobModel->getJob_desciption();
            $date_posted = $jobModel->getDate_posted();
            // prepared statements is created
            $stmt = $this->conn->prepare("UPDATE `JOB` SET `COMPANY_NAME` = :company_name, `COMPANY_CITY` = :company_city, `COMPANY_STATE` = :company_state, `COMPANY_ZIP_CODE` = :company_zip_code, `JOB_TITLE` = :job_title, `JOB_DESCRIPTION` = :job_description, `DATE_POSTED` = :date_posted WHERE `JOB_ID` = :job_id");
            // binds parameters
            $stmt->bindParam(':job_id', $job_id);
            $stmt->bindParam(':company_name', $company_name);
            $stmt->bindParam(':company_city', $company_city);
            $stmt->bindParam(':company_state', $company_state);
            $stmt->bindParam(':company_zip_code', $company_zip);
            $stmt->bindParam(':job_title', $job_title);
            $stmt->bindParam(':job_desciption', $job_description);
            $stmt->bindParam(':date_posted', $date_posted);
            /*
             * see if jobs existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit JobDataService.updateJobPost() with true");
                return true;
            } else {
                Log::info("Exit JobDataService.updateJobPost() with false");
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

    public function deleteJobPost($id)
    {
        Log::info("Entering UserDataService.deleteUser()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare('DELETE FROM JOB WHERE JOB_ID = :id');
            // bind parameter
            $stmt->bindParam(':id', $id);
            // executes statement
            $delete = $stmt->execute();
            // returns true or false if skill has been deleted from database
            if ($delete) {
                Log::info("Exiting JobDataService.deleteJobPost() with returning true");
                return true;
            } else {
                Log::info("Exiting JobDataService.deleteJobPost() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function showAllJobPosts()
    {
        Log::info("Entering JobDataService.showAllJobPosts()");
        try {
            // select contact and see if the row exists
            $stmt = $this->conn->prepare('SELECT * FROM JOB');
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // contact array is created
                $jobArray = array();
                // fetches result from prepared statement and returns as an array
                while ($job = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // inserts variables into end of array
                    array_push($jobArray, $job);
                }
                Log::info("Exit JobDataService.showAllJobPosts() with true");
                // return contact array
                return $jobArray;
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
