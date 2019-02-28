<?php
// Milestone 1
// Login Module
// Emily Quevedo
// February 6, 2019
// This is my own work
/* Admin controller handles user admin methods */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Services\Business\UserBusinessService;
use App\Services\Data\UserDataService;
use App\Models\JobModel;
use App\Services\Business\JobBusinessService;
use App\Services\Data\JobDataService;

class AdminController extends Controller
{

    public function showCreatePostForm()
    {
        return view('createJobPost');
    }

    public function showUsers()
    {
        try {
            // call user business service
            $service = new UserBusinessService();
            $users = $service->displayUsers();
            // render a response view
            if ($users) {
                return view('displayUsers')->with($users);
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    public function deleteUser()
    {
        try {
            // GET method for user id
            $id = $_GET['USER_ID'];
            // call user business service
            $service = new UserBusinessService();
            $delete = $service->deleteUser($id);
            // render a success or fail view
            if ($delete) {
                return view('deleteUserSuccess');
            } else {
                return view('deleteUserFail');
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    public function suspendUser()
    {
        try {
            // GET method for user id
            $id = $_GET['ID'];
            // call user business service
            $service = new UserBusinessService();
            $suspend = $service->suspendUser($id);
            // renders a success or fail view
            if ($suspend) {
                return view('suspendUserSuccess');
            } else {
                return view('suspendUserFail');
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    public function unsuspendUser()
    {
        try {
            // GET method for user id
            $id = $_GET['ID'];
            // calls user business service
            $service = new UserBusinessService();
            $unsuspend = $service->unsuspendUser($id);
            // renders a success or fail view
            if ($unsuspend) {
                return view('unsuspendUserSuccess');
            } else {
                return view('unsuspendUserFail');
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    public function createJobPost(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $company_name = $request->input('company_name');
            $company_city = $request->input('company_city');
            $company_state = $request->input('company_state');
            $company_zip = $request->input('company_zip');
            $job_title = $request->input('job_title');
            $job_description = $request->input('job_description');
            $date_posted = $request->input('date_posted');
            // assigns the data from the variables to one array named $data
            $data = [
                'company_name' => $company_name,
                'company_city' => $company_city,
                'company_state' => $company_state,
                'company_zip' => $company_zip,
                'job_title' => $job_title,
                'job_description' => $job_description,
                'date_posted' => $date_posted
            ];
            // 2. create object model
            // save posted form data in user object model
            $jobs = new JobModel(0, $company_name, $company_city, $company_state, $company_zip, $job_title, $job_description, $date_posted);
            // 3. execute business service
            // call security business service
            $service = new JobBusinessService();
            $status = $service->createJobPost($jobs);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $jobs
                ];
                return view('createJobPostSuccess')->with($data);
            } else {
                return view('createJobPostFail');
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    public function updateJobPost(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $company_name = $request->input('company_name');
            $company_city = $request->input('company_city');
            $company_state = $request->input('company_state');
            $company_zip = $request->input('company_zip');
            $job_title = $request->input('job_title');
            $job_description = $request->input('job_description');
            $date_posted = $request->input('date_posted');
            // assigns the data from the variables to one array named $data
            $data = [
                'company_name' => $company_name,
                'company_city' => $company_city,
                'company_state' => $company_state,
                'company_zip' => $company_zip,
                'job_title' => $job_title,
                'job_description' => $job_description,
                'date_posted' => $date_posted
            ];
            // 2. create object model
            // save posted form data in user object model
            $jobs = new JobModel(- 1, $company_name, $company_city, $company_state, $company_zip, $job_title, $job_description, $date_posted);
            // 3. execute business service
            // call security business service
            $service = new JobBusinessService();
            $status = $service->updateJobPost($jobs);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $jobs
                ];
                return view('updateJobPostSuccess')->with($data);
            } else {
                return view('updateJobPostFail');
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    public function deleteJobPost()
    {
        try {
            // GET method for user id
            $id = $_GET['JOB_ID'];
            // call user business service
            $service = new JobDataService($id);
            $delete = $service->deleteJobPost($id);
            // render a success or fail view
            if ($delete) {
                return view('deleteJobPostSuccess');
            } else {
                return view('deleteJobPostFail');
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }

    public function showAllJobPosts()
    {
        try {
            // call user business service
            $service = new JobBusinessService();
            $jobs = $service->showJobPosts();
            // render a response view
            if ($jobs) {
                return view('displayJobPostsAdmin')->with($jobs);
            }
        } catch (Exception $e) {
            // best practice: call all exceptions, log the exception, and display a common error page (or use a global exception handler)
            // log exception and display exception view
            Log::error("Exception: ", array(
                "message" => $e->getMessage()
            ));
            $data = [
                'errorMsg' => $e->getMessage()
            ];
            return view('exception')->with($data);
        }
    }
}