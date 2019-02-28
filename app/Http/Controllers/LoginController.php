<?php
// Milestone 3
// Login Module
// Emily Quevedo and Andy Condrut
// January 20, 2019
// This is our own work
/* Login module processes the authentication of user credentials */
namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class LoginController extends Controller
{

    // authenticates user credentials
    public function login(Request $request)
    {
        try {
            // 1. process form data
            // get posted form data
            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            $active = $request->input('active');

            // 2. create object model
            // save posted form data in user object model
            $user = new UserModel(- 1, $firstname, $lastname, $email, $username, $password, 0, $active);

            // 3. execute business service
            // call security business service
            $service = new SecurityService();
            $status = $service->login($user);

            // 4. process results from business service (navigation)
            // render a failed or success response view and pass the user model to it

            if ($status) {
                $_SESSION['principle'] = true;
                $_SESSION['USERNAME'] = $username;
                $data = [
                    'model' => $user
                ];
                return view('displayJobs')->with($data);
            } else if ($active == 1) {
                return view('suspendUser');
            } else {
                return view('loginFail');
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