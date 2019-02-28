<?php
// Andreea Condrut
// CST 256
// Mark Reha
// This is my own work
// Milestone 1
// 1/20/2019
// the page that handles the process to
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use App\Services\Business\UserBusinessService;

class RegistrationController extends Controller
{

    public function register(Request $request)
    {
        // capture form data
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $username = $request->input('username');
        $password = $request->input('password');
        // assigns the data from the variables to one array named $data
        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'username' => $username,
            'password' => $password
        ];
        // 2. create object model
        // save posted form data in user object model
        $user = new UserModel(- 1, $firstname, $lastname, $email, $username, $password, 0, 0);
        // 3. execute business service
        // call security business service
        $service = new UserBusinessService();
        $status = $service->createUser($user);
        // 4. process results from business service (navigation)
        // render a failed or success response view and pass the user model to it
        if ($status) {
            $data = [
                'model' => $user
            ];
            return view('registrationSuccess')->with($data);
        } else {
            return view('registrationFail');
        }
    }
}