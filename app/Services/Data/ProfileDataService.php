<?php
namespace App\Services\Data;

use PDO;
use PDOException;
use Illuminate\Support\Facades\Log;
use App\Models\ContactModel;
use App\Models\EducationModel;
use App\Models\JobHistoryModel;
use App\Models\SkillsModel;
use App\Services\Utility\DatabaseException;

class ProfileDataService
{

    private $conn = null;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createSkills(SkillsModel $skillsModel, $conn)
    {
        Log::info("Entering ProfileDataService.createSkills()");
        try {
            // select variables and see if the row exists
            $skills = $skillsModel->getUser_skills();
            $user_user_id = $skillsModel->getUser_user_id();
            // prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO SKILLS (SKILLS_ID, USER_SKILLS, USER_USER_ID) VALUES (NULL, :user_skills, :user_user_id)");
            // binds parameters
            $stmt->bindParam(':user_skills', $skills);
            $stmt->bindParam('user_user_id', $user_user_id);

            /*
             * see if skills existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.createSkills() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.createSKills() with false");
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

    public function updateSkills(SkillsModel $skillsModel, $id)
    {
        Log::info("Entering ProfileDataService.updateSkills()");
        try {
            // select variables and see if the row exists
            $skills_id = $skillsModel->getSkills_id();
            $skills = $skillsModel->getUser_skill();
            // prepared statements is created
            $stmt = $this->conn->prepare("UPDATE SKILLS SET USER_SKILLS = :user_skills WHERE SKILLS_ID = :skills_id;");
            // binds parameters
            $stmt->bindParam(':user_skills', $skills);
            $stmt->bindParam(':skills_id', $skills_id);
            /*
             * see if skills existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.updateSkills() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.updateSkills() with false");
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

    public function deleteSkills($id)
    {
        Log::info("Entering ProfileDataService.deleteSkills()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare('DELETE FROM SKILLS WHERE SKILLS_ID = :skills_id');
            // bind parameter
            $stmt->bindParam(':skills_id', $id);
            // executes statement
            $delete = $stmt->execute();
            // returns true or false if skill has been deleted from database
            if ($delete) {
                Log::info("Exiting ProfileDataService.deleteSkills() with returning true");
                return true;
            } else {
                Log::info("Exiting ProfileDataService.deleteSkills() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function findAllSkills($user_user_id)
    {
        Log::info("Entering ProfileDataService.findAllSkills()");
        try {
            // select skills and see if the row exists
            $stmt = $this->conn->prepare('SELECT * FROM SKILLS WHERE USER_USER_ID = :user_user_id');
            $stmt->bindParam(':user_user_id', $user_user_id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // skills array is created
                $skillsArray = array();
                // fetches result from prepared statement and returns as an array
                while ($skills = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // inserts variables into end of array
                    array_push($skillsArray, $skills);
                }
                Log::info("Exit ProfileDataService.findAllSkills() with true");
                // return skills array
                return $skillsArray;
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

    public function createEducation(EducationModel $educationModel, $conn)
    {
        Log::info("Entering ProfileDataService.createEducation()");
        try {
            // select variables and see if the row exists
            $degree = $educationModel->getDegree();
            $school_name = $educationModel->getSchool_name();
            $school_city = $educationModel->getSchool_city();
            $school_state = $educationModel->getSchool_state();
            $school_zip_code = $educationModel->getSchool_zip_code();
            $graduation_year = $educationModel->getGraduation_year();
            // prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO EDUCATION (DEGREE, SCHOOL_NAME, SCHOOL_CITY, SCHOOL_STATE, SCHOOL_ZIP_CODE, GRADUATION_YEAR) VALUES (:degree, :school_name, :school_city, :school_state, :school_zip_code, :graduation_year)");
            // binds parameters
            $stmt->bindParam(':degree', $degree);
            $stmt->bindParam(':school_name', $school_name);
            $stmt->bindParam(':school_city', $school_city);
            $stmt->bindParam(':school_state', $school_state);
            $stmt->bindParam(':school_zip_code', $school_zip_code);
            $stmt->bindParam(':graduation_year', $graduation_year);
            /*
             * see if education existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.createEducation() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.createEducation() with false");
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

    public function updateEducation(EducationModel $educationModel, $conn)
    {
        Log::info("Entering ProfileDataService.updateEducation()");
        try {
            // select variables and see if the row exists
            $degree = $educationModel->getDegree();
            $school_name = $educationModel->getSchool_name();
            $school_city = $educationModel->getSchool_city();
            $school_state = $educationModel->getSchool_state();
            $school_zip_code = $educationModel->getSchool_zip_code();
            $graduation_year = $educationModel->getGraduation_year();
            // prepared statements is created
            $stmt = $this->conn->prepare("UPDATE EDUCATION SET DEGREE = :degree, SCHOOL_NAME = :school_name, SCHOOL_CITY = :school_city, SCHOOL_STATE = :school_state, SCHOOL_ZIP_CODE = :school_zip_code, GRADUATION_YEAR = :graduation_year WHERE EDUCATION_ID = :education_id");
            // binds parameters
            $stmt->bindParam(':degree', $degree);
            $stmt->bindParam(':school_name', $school_name);
            $stmt->bindParam(':school_city', $school_city);
            $stmt->bindParam(':school_state', $school_state);
            $stmt->bindParam(':school_zip_code', $school_zip_code);
            $stmt->bindParam(':graduation_year', $graduation_year);
            /*
             * see if skills existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.updateEducation() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.updateEducation() with false");
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

    public function deleteEducation($id)
    {
        Log::info("Entering ProfileDataService.deleteEducation()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare("DELETE FROM EDUCATION WHERE EDUCATION_ID = :education_id");
            // bind parameter
            $stmt->bindParam(':education_id', $id);
            // executes statement
            $delete = $stmt->execute();
            // returns true or false if skill has been deleted from database
            if ($delete) {
                Log::info("Exiting ProfileDataService.deleteEducation() with returning true");
                return true;
            } else {
                Log::info("Exiting ProfileDataService.deleteEducation() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function findAllEducation()
    {
        Log::info("Entering ProfileDataServcce.findAllEducation()");
        try {
            // select skills and see if the row exists
            $stmt = $this->conn->prepare("SELECT * FROM EDUCATION");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // skills array is created
                $educationArray = array();
                // fetches result from prepared statement and returns as an array
                while ($education = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // inserts variables into end of array
                    array_push($educationArray, $education);
                }
                Log::info("Exit ProfileDataServcce.findAllEducation() with true");
                // return skills array
                return $educationArray;
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

    public function createJobHistory(JobHistoryModel $jobHistory, $conn)
    {
        Log::info("Entering ProfileDataService.createJobHistory()");
        try {
            // select variables and see if the row exists
            $current_job = $jobHistory->getCurrent_job();
            $previous_job = $jobHistory->getPrevious_job();
            $current_employment_date = $jobHistory->getCurrent_employment_date();
            $previous_employment_date = $jobHistory->getPrevious_employment_date();
            $current_employment_location = $jobHistory->getCurrent_employment_location();
            // prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO JOB_HISTORY (JOB_HISTORY_ID, CURRENT_JOB, PREVIOUS_JOB, CURRENT_EMPLOYMENT_DATE, PREVIOUS_EMPLOYMENT_DATE, CURRENT_EMPLOYMENT_LOCATION, USER_USER_ID) VALUES (NULL, :current_job, :previous_job, :current_employment_date, :previous_employment_date, :current_employment_location)");
            // binds parameters
            $stmt->bindParam(':current_job', $current_job);
            $stmt->bindParam(':previous_job', $previous_job);
            $stmt->bindParam(':current_employment_date', $current_employment_date);
            $stmt->bindParam(':previous_employment_date', $previous_employment_date);
            $stmt->bindParam(':current_employment_location', $current_employment_location);
            /*
             * see if skills existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.createJobHistory() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.createJobHistory() with false");
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

    public function updateJobHistory(JobHistoryModel $jobHistory, $conn)
    {
        Log::info("Entering ProfileDataService.createJobHistory()");
        try {
            // select variables and see if the row exists
            $current_job = $jobHistory->getCurrent_job();
            $previous_job = $jobHistory->getPrevious_job();
            $current_employment_date = $jobHistory->getCurrent_employment_date();
            $previous_employment_date = $jobHistory->getPrevious_employment_date();
            $current_employment_location = $jobHistory->getCurrent_employment_location();
            // prepared statements is created
            $stmt = $this->conn->prepare("UPDATE JOB_HISTORY SET CURRENT_JOB = :current_job, PREVIOUS_JOB = :previous_job, CURRENT_EMPLOYMENT_DATE = :current_employment_date, PREVIOUS_EMPLOYMENT_DATE = :previous_employment_date, CURRENT_EMPLOYMENT_LOCATION = :current_employment_location WHERE JOB_HISTORY_ID = :job_history_id;)");
            // binds parameters
            $stmt->bindParam(':current_job', $current_job);
            $stmt->bindParam(':previous_job', $previous_job);
            $stmt->bindParam(':current_employment_date', $current_employment_date);
            $stmt->bindParam(':previous_employment_date', $previous_employment_date);
            $stmt->bindParam(':current_employment_location', $current_employment_location);
            /*
             * see if job history existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.createJobHistory() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.createJobHistory() with false");
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

    public function deleteJobHistory($id)
    {
        Log::info("Entering ProfileDataService.deleteJobHistory()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare("DELETE FROM JOB_HISTORY WHERE JOB_HISTORY_ID = :job_history_id");
            // bind parameter
            $stmt->bindParam(':job_history_id', $id);
            // executes statement
            $delete = $stmt->execute();
            // returns true or false if skill has been deleted from database
            if ($delete) {
                Log::info("Exiting ProfileDataService.deleteJobHistory() with returning true");
                return true;
            } else {
                Log::info("Exiting ProfileDataService.deleteJobHistory() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function findAllJobHistory()
    {
        Log::info("Entering ProfileDataService.findAllJobHistory()");
        try {
            // select skills and see if the row exists
            $stmt = $this->conn->prepare("SELECT * FROM JOB_HISTORY WHERE USER_USER_ID = user_user_id");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // skills array is created
                $jobhistoryArray = array();
                // fetches result from prepared statement and returns as an array
                while ($jobhistory = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // inserts variables into end of array
                    array_push($jobhistoryArray, $jobhistory);
                }
                Log::info("Exit ProfileDataService.findAllJobHistory() with true");
                // return skills array
                return $jobhistoryArray;
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

    public function createContactInformation(ContactModel $contactModel, $conn)
    {
        Log::info("Entering ProfileDataService.createContactInfo()");
        try {
            // select variables and see if the row exists
            $business_email = $contactModel->getBusiness_email();
            $phone_number = $contactModel->getPhone_number();
            $street_address = $contactModel->getStreet_address();
            $state = $contactModel->getState();
            $city = $contactModel->getCity();
            $zip_code = $contactModel->getZip_code();
            $about_me = $contactModel->getAbout_me();
            // prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO CONTACT (CONTACT_ID, BUSINESS_EMAIL, PHONE_NUMBER, STREET_ADDRESS, STATE, CITY, ZIP_CODE, ABOUT_ME) VALUES (NULL, :business_email, :phone_number, :street_address, :state, :city, :zip_code, :about_me)");
            // binds parameters
            $stmt->bindParam(':business_email', $business_email);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':street_address', $street_address);
            $stmt->bindParam(':$state', $state);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':zip_code', $zip_code);
            $stmt->bindParam(':about_me', $about_me);
            /*
             * see if skills existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.createContactInfo() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.createContactInfo() with false");
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

    public function updateContactInformation(ContactModel $contactModel, $conn)
    {
        Log::info("Entering ProfileDataService.updateContactInfo()");
        try {
            // select variables and see if the row exists
            $business_email = $contactModel->getBusiness_email();
            $phone_number = $contactModel->getPhone_number();
            $street_address = $contactModel->getStreet_address();
            $state = $contactModel->getState();
            $city = $contactModel->getCity();
            $zip_code = $contactModel->getZip_code();
            $about_me = $contactModel->getAbout_me();
            // prepared statements is created
            $stmt = $this->conn->prepare("UPDATE CONTACT SET BUSINESS_EMAIL = :business_email, PHONE_NUMBER = :phone_number, STREET_ADDRESS = :street_address, STATE = :state, CITY = :city, ZIP_CODE = :zip_code, ABOUT_ME = :about_me WHERE CONTACT_ID = :contact_id");
            // binds parameters
            $stmt->bindParam(':business_email', $business_email);
            $stmt->bindParam(':phone_number', $phone_number);
            $stmt->bindParam(':street_address', $street_address);
            $stmt->bindParam(':$state', $state);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':zip_code', $zip_code);
            $stmt->bindParam(':about_me', $about_me);
            /*
             * see if job history existed and return true if found
             * else return false if not found
             */
            if ($stmt->execute()) {
                Log::info("Exit ProfileDataService.updateContactInfo() with true");
                return true;
            } else {
                Log::info("Exit ProfileDataService.updateContactInfo() with false");
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

    public function deleteContactInformation($id)
    {
        Log::info("Entering ProfileDataService.deleteContactInfo()");
        try {
            // prepared statement is created
            $stmt = $this->conn->prepare("DELETE FROM CONTACT WHERE CONTACT_ID = :contact_id");
            // bind parameter
            $stmt->bindParam(':contact_id', $id);
            // executes statement
            $delete = $stmt->execute();
            // returns true or false if skill has been deleted from database
            if ($delete) {
                Log::info("Exiting ProfileDataService.deleteContactInfo() with returning true");
                return true;
            } else {
                Log::info("Exiting ProfileDataService.deleteContactInfo() with returning false");
                return false;
            }
        } catch (\PDOException $e) {
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    public function findContactByID($id)
    {
        Log::info("Entering ProfileDataService.findAllContacts()");
        try {
            // select contact and see if the row exists
            $stmt = $this->conn->prepare("SELECT * FROM CONTACT WHERE CONTACT_ID = :contact_id");
            $stmt->bindParam('contact_id', $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                // contact array is created
                $contactArray = array();
                // fetches result from prepared statement and returns as an array
                while ($contact = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // inserts variables into end of array
                    array_push($contactArray, $contact);
                }
                Log::info("Exit ProfileDataService.findAllContacts() with true");
                // return contact array
                return $contactArray;
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