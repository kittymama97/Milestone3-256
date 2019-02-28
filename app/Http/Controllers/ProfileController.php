<?php
// Milestone 1
// Login Module
// Emily Quevedo
// January 20, 2019
// This is my own work
/* Profile controller processes the submitted data for user profile */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\SkillsModel;
use App\Services\Business\ProfileBusinessService;
use App\Models\EducationModel;
use App\Models\JobHistoryModel;
use App\Models\ContactModel;
use App\Models\UserModel;
use App\Services\Business\UserBusinessService;

class ProfileController extends Controller
{

    public function createSkills(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $skills = $request->input('user_skills');
            $user_user_id = $request->input('user_user_id');
            // assigns the data from the variables to one array named $data
            $data = [
                'user_skills' => $skills,
                'user_user_id' => $user_user_id
            ];
            // 2. create object model
            // save posted form data in user object model
            $userSkills = new SkillsModel(0, $skills, $user_user_id);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->createSkills($userSkills);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $userSkills
                ];
                return view('createSkillsSuccess')->with($data);
            } else {
                return view('createSkillsFail');
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

    public function updateSkills(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $skills_id = $request->input('skills_id');
            $skills = $request->input('user_skills');
            // assigns the data from the variables to one array named $data
            $data = [
                'skills_id' => $skills_id,
                'user_skills' => $skills
            ];
            // 2. create object model
            // save posted form data in user object model
            $userSkillsUpdate = new SkillsModel(0, $skills);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->updateSkills($userSkillsUpdate);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $userSkillsUpdate
                ];
                return view('updateSkillsSuccess')->with($data);
            } else {
                return view('updateSkillsFail');
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

    public function deleteSkills()
    {
        try {
            // GET method for user id
            $id = $_GET['SKILLS_ID'];
            // call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteSkills($id);
            // render a success or fail view
            if ($delete) {
                return view('deleteSkillsSuccess');
            } else {
                return view('deleteSkillsFail');
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

    public function showSkills()
    {
        try {
            $user_user_id = $_GET['USER_USER_ID'];
            // call profile business service
            $service = new ProfileBusinessService();
            $skills = $service->showSkills($user_user_id);
            // render a response view
            if ($skills) {
                return view('displaySkills')->with($skills);
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

    public function createEducation(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $degree = $request->input('degree');
            $school_name = $request->input('school_name');
            $school_city = $request->input('school_city');
            $school_state = $request->input('school_state');
            $school_zip_code = $request->input('school_zip_code');
            $graduation_year = $request->input('graduation_year');
            // assigns the data from the variables to one array named $data

            $data = [
                'degree' => $degree,
                'school_name' => $school_name,
                'school_city' => $school_city,
                'school_state' => $school_state,
                'school_zip_code' => $school_zip_code,
                'graduation_year' => $graduation_year
            ];
            // 2. create object model
            // save posted form data in user object model
            $education = new EducationModel(0, $degree, $school_name, $school_city, $school_state, $school_zip_code, $graduation_year);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->createEducation($education);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $education
                ];
                return view('createEducationSuccess')->with($data);
            } else {
                return view('createEducationFail');
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

    public function updateEducation(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $degree = $request->input('degree');
            $school_name = $request->input('school_name');
            $school_city = $request->input('school_city');
            $school_state = $request->input('school_state');
            $school_zip_code = $request->input('school_zip_code');
            $graduation_year = $request->input('graduation_year');
            // assigns the data from the variables to one array named $data
            $data = [
                'degree' => $degree,
                'school_name' => $school_name,
                'school_city' => $school_city,
                'school_state' => $school_state,
                'school_zip_code' => $school_zip_code,
                'graduation_year' => $graduation_year
            ];
            // 2. create object model
            // save posted form data in user object model
            $educationUpdate = new EducationModel(0, $degree, $school_name, $school_state, $school_city, $school_zip_code, $graduation_year);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->updateEducation($educationUpdate);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $educationUpdate
                ];
                return view('updateEducationSuccess')->with($data);
            } else {
                return view('updateEducationFail');
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

    public function deleteEducation()
    {
        try {
            // GET method for user id
            $id = $_GET['EDUCATION_ID'];
            // call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteEducation($id);
            // render a success or fail view
            if ($delete) {
                return view('deleteEducationSuccess');
            } else {
                return view('deleteEducationFail');
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

    public function showEducation()
    {
        try {
            // call profile business service
            $service = new ProfileBusinessService();
            $profile = $service->showEducation();
            // render a response view
            if ($profile) {
                return view('displayProfile')->with($profile);
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

    public function createJobHistory(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $current_job = $request->input('current_job');
            $previous_job = $request->input('previous_job');
            $current_employment_date = $request->input('current_employment_date');
            $previous_employment_date = $request->input('previous_employment_date');
            $current_employment_location = $request->input('current_employment_location');
            // // assigns the data from the variables to one array named $data
            $data = [
                'current_job' => $current_job,
                'previous_job' => $previous_job,
                'current_employment_date' => $current_employment_date,
                'previous_employment_date' => $previous_employment_date,
                'current_employment_location' => $previous_job
            ];
            // 2. create object model
            // save posted form data in user object model
            $jobHistory = new JobHistoryModel(0, $current_job, $previous_job, $current_employment_date, $previous_employment_date, $current_employment_location);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->createJobHistory($jobHistory);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $jobHistory
                ];
                return view('createJobHistorySuccess')->with($data);
            } else {
                return view('createJobHistoryFail');
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

    public function updateJobHistory(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $current_job = $request->input('current_job');
            $previous_job = $request->input('previous_job');
            $current_employment_date = $request->input('current_employment_date');
            $previous_employment_date = $request->input('previous_employment_date');
            $current_employment_location = $request->input('current_employment_location');
            // assigns the data from the variables to one array named $data
            $data = [
                'current_job' => $current_job,
                'previous_job' => $previous_job,
                'current_employment_date' => $current_employment_date,
                'previous_employment_date' => $previous_employment_date,
                'current_employment_location' => $current_employment_location
            ];
            // 2. create object model
            // save posted form data in user object model
            $jobHistoryUpdate = new EducationModel(0, $current_job, $previous_job, $current_employment_date, $previous_employment_date, $current_employment_location);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->updateJobHistory($jobHistoryUpdate);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $jobHistoryUpdate
                ];
                return view('updateJobHistorySucess')->with($data);
            } else {
                return view('updateJobHistoryFail');
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

    public function deleteJobHistory()
    {
        try {
            // GET method for user id
            $id = $_GET['JOB_HISTORY_ID'];
            // call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteJobHistory($id);
            // render a success or fail view
            if ($delete) {
                return view('deleteJobHistorySuccess');
            } else {
                return view('deleteJobHistoryFail');
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

    public function showJobHistory()
    {
        try {
            // call profile business service
            $service = new ProfileBusinessService();
            $profile = $service->showJobHistory();
            // render a response view
            if ($profile) {
                return view('displayProfile')->with($profile);
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

    public function createContactInformation(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $business_email = $request->input('business_email');
            $phone_number = $request->input('phone_number');
            $street_address = $request->input('street_address');
            $city = $request->input('city');
            $state = $request->input('state');
            $zip_code = $request->input('zip_code');
            $about_me = $request->input('about_me');

            // assigns the data from the variables to one array named $data
            $data = [
                'business_email' => $business_email,
                'phone_number' => $phone_number,
                'street_address' => $street_address,
                'city' => $city,
                'state' => $state,
                'zip_code' => $zip_code,
                'about_me' => $about_me
            ];
            // 2. create object model
            // save posted form data in user object model
            $contact = new ContactModel(0, $business_email, $phone_number, $street_address, $state, $city, $zip_code, $about_me);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->createContactInfo($contact);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $contact
                ];
                return view('createContactInformationSuccess')->with($data);
            } else {
                return view('createContactInformationFail');
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

    public function updateContactInformation(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $business_email = $request->input('business_email');
            $phone_number = $request->input('phone_number');
            $street_address = $request->input('street_address');
            $city = $request->input('city');
            $state = $request->input('state');
            $zip_code = $request->input('zip_code');
            $about_me = $request->input('about_me');

            $data = [
                'business_email' => $business_email,
                'phone_number' => $phone_number,
                'street_address' => $street_address,
                'city' => $city,
                'state' => $state,
                'zip_code' => $zip_code,
                'about_me' => $about_me
            ];
            // 2. create object model
            // save posted form data in user object model
            $contact = new ContactModel(0, $business_email, $phone_number, $street_address, $city, $state, $zip_code, $about_me);
            // 3. execute business service
            // call security business service
            $service = new ProfileBusinessService();
            $status = $service->updateContactInfo($contact);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $contact
                ];
                return view('updateContactInformationSuccess')->with($data);
            } else {
                return view('updateContactInformationFail');
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

    public function deleteContactInformation()
    {
        try {
            // GET method for user id
            $id = $_GET['CONTACT_ID'];
            // call user business service
            $service = new ProfileBusinessService();
            $delete = $service->deleteSkills($id);
            // render a success or fail view
            if ($delete) {
                return view('deleteContactInformationSuccess');
            } else {
                return view('deleteContactInformationFail');
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

    public function showContactInformation()
    {
        try {
            // call profile business service
            $service = new ProfileBusinessService();
            $profile = $service->showContactInfo();
            // render a response view
            if ($profile) {
                return view('displayProfile')->with($profile);
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

    public function updateUser(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            // 2. create object model
            // save posted form data in user object model
            $user = new UserModel(0, $firstname, $lastname, $email, $username, $password);
            // 3. execute business service
            // call security business service
            $service = new UserBusinessService();
            $status = $service->updateUser($user);
            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it
            if ($status) {
                $data = [
                    'model' => $user
                ];
                return view('updateRegistrationSuccess')->with($data);
            } else {
                return view('updateRegistrationFail');
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