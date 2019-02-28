<?php
namespace App\Services\Business;

use Illuminate\Support\Facades\Log;
use PDO;
use App\Models\SkillsModel;
use App\Services\Data\ProfileDataService;
use App\Models\EducationModel;
use App\Models\JobHistoryModel;
use App\Models\ContactModel;

class ProfileBusinessService
{

    public function createSkills(SkillsModel $skillsModel)
    {
        Log::info("Entering ProfileBusinessService.createSkills()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->createSkills($skillsModel, $conn);
        // return the finder results
        Log::info("Exit ProfileBusinessService.createSkills() with " . $flag);
        return $flag;
    }

    public function updateSkills(SkillsModel $skillsModel, $id)
    {
        Log::info("Entering ProfileBusinessService.updateSkills()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->updateSkills($skillsModel, $id);
        // return the finder results
        Log::info("Exit ProfileBusinessService.updateSkills() with " . $flag);
        return $flag;
    }

    public function deleteSkills($id)
    {
        Log::info("Entering ProfileBusinessService.deleteSkills()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->deleteSkills($id);
        // return the finder results
        Log::info("Exit ProfileBusinessService.deleteSkills() with " . $flag);
        return $flag;
    }

    public function showSkills($user_user_id)
    {
        Log::info("Entering ProfileBusinessService.showSkills()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->findAllSkills($user_user_id);
        // return the finder results
        Log::info("Exit ProfileBusinessService.showSkills() with " . $flag);
        return $flag;
    }

    public function createEducation(EducationModel $educationModel)
    {
        Log::info("Entering ProfileBusinessService.createEducation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->createEducation($educationModel, $conn);
        // return the finder results
        Log::info("Exit ProfileBusinessService.createEducation() with " . $flag);
        return $flag;
    }

    public function updateEducation(EducationModel $educationModel)
    {
        Log::info("Entering ProfileBusinessService.updateEducation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->updateEducation($educationModel, $conn);
        // return the finder results
        Log::info("Exit ProfileBusinessService.updateEducation() with " . $flag);
        return $flag;
    }

    public function deleteEducation($id)
    {
        Log::info("Entering ProfileBusinessService.deleteEducation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->deleteEducation($id);
        // return the finder results
        Log::info("Exit ProfileBusinessService.deleteEducation() with " . $flag);
        return $flag;
    }

    public function showEducation()
    {
        Log::info("Entering ProfileBusinessService.showEducation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->findAllEducation();
        // return the finder results
        Log::info("Exit ProfileBusinessService.showEducation() with " . $flag);
        return $flag;
    }

    public function createJobHistory(JobHistoryModel $jobHistory)
    {
        Log::info("Entering ProfileBusinessService.createJobHistory()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->createJobHistory($jobHistory, $conn);
        // return the finder results
        Log::info("Exit ProfileBusinessService.createJobHistory() with " . $flag);
        return $flag;
    }

    public function updateJobHistory(JobHistoryModel $jobHistory)
    {
        Log::info("Entering ProfileBusinessService.updateJobHistory()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->updateJobHistory($jobHistory, $conn);
        // return the finder results
        Log::info("Exit ProfileBusinessService.updateJobHistory() with " . $flag);
        return $flag;
    }

    public function deleteJobHistory($id)
    {
        Log::info("Entering ProfileBusinessService.deleteJobHistory()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->deleteJobHistory($id);
        // return the finder results
        Log::info("Exit ProfileBusinessService.deleteJobHistory() with " . $flag);
        return $flag;
    }

    public function showJobHistory()
    {
        Log::info("Entering ProfileBusinessService.showJobHistory()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->findAllJobHistory();
        // return the finder results
        Log::info("Exit ProfileBusinessService.showJobHistory() with " . $flag);
        return $flag;
    }

    public function createContactInformation(ContactModel $contactModel)
    {
        Log::info("Entering ProfileBusinessService.createContactInformation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->createContactInformation($contactModel, $conn);
        // return the finder results
        Log::info("Exit ProfileBusinessService.createContactInformation() with " . $flag);
        return $flag;
    }

    public function updateContactInformation(ContactModel $contactModel)
    {
        Log::info("Entering ProfileBusinessService.updateContactInformation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->updateContactInformation($contactModel, $conn);
        // return the finder results
        Log::info("Exit ProfileBusinessService.updateContactInformation() with " . $flag);
        return $flag;
    }

    public function deleteContactInformation($id)
    {
        Log::info("Entering ProfileBusinessService.deleteContactInformation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->deleteContactInformation($id);
        // return the finder results
        Log::info("Exit ProfileBusinessService.deleteContactInformation() with " . $flag);
        return $flag;
    }

    public function showContactInformation($id)
    {
        Log::info("Entering ProfileBusinessService.showContactInformation()");
        // get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        // create connection to database
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // create a security service dao with this connection and try to find and delete user
        $service = new ProfileDataService($conn);
        $flag = $service->findContactByID($id);
        // return the finder results
        Log::info("Exit ProfileBusinessService.showContactInformations() with " . $flag);
        return $flag;
    }
}