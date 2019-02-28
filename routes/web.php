<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('start', function () {
    return view('displayJobs');
});

/*
 * LOGIN
 */
// returns a login form
Route::get('/login', function () {
    return view('login');
});

// links the login form to the login function
Route::post('doLogin', 'LoginController@login');

/*
 * REGISTRATION
 */
// returns a registration form
Route::get('/registration', function () {
    return view('registration');
});
// links the registration form to the registration function
Route::post('doRegistration', 'RegistrationController@register');

/*
 * PROFILE
 */
// returns the profile view
Route::get('/profile', function () {
    return view('profile');
});

/*
 * SKILLS
 */

Route::get('/createSkills', function () {
    return view('createSkills');
});

Route::post('createSkills', 'ProfileController@createSkills');

Route::get('/updateSkills', function () {
    return view('updateSkills');
});

Route::post('/updateSkills', 'ProfileController@updateSkills');
Route::get('/displaySkills', function () {
    return view('displaySkills');
});

/*
 * CONTACT INFORMATION
 */

Route::get('/createContactInformation', function () {
    return view('createContactInformation');
});

Route::post('createContactInformation', 'ProfileController@createContactInformation');

Route::get('/updateContactInformation', function () {
    return view('updateContactInformation');
});

Route::post('/updateContactInformation', 'ProfileController@updateContactInformation');

/*
 * EDUCATION
 */
Route::get('/createEducation', function () {
    return view('createEducation');
});

Route::post('createEducation', 'ProfileController@createEducation');

Route::get('/updateEducation', function () {
    return view('updateEducation');
});

Route::post('updateEducation', 'ProfileController@updateEducation');

/*
 * JOB HISTORY
 */
Route::get('/createJobHistory', function () {
    return view('createJobHistory');
});

Route::post('createJobHistory', 'ProfileController@createJobHistory');

Route::post('updateJobHistory', 'ProfileController@updateJobHistory');

Route::get('/updateJobHistory', function () {
    return view('updateJobHistory');
});

/*
 * REGISTRATION EDIT
 */
Route::get('/updateRegistration', function () {
    return view('updateRegistration');
});

Route::post('updateRegistration', 'ProfileController@updateUser');

/*
 * JOB ADMINISTRATION
 */
Route::get('jobPost', function () {
    return view('createJobPost');
});

Route::get('/usersAdmin', 'AdminController@showUsers');
Route::get('/userDelete', 'AdminController@deleteUser');
Route::get('/userSuspend', 'AdminController@suspendUser');
Route::get('/userUnsuspend', 'AdminController@unsuspendUser');

route::get('/createJobPost', 'AdminController@showCreatePostForm');
Route::get('/jobsAdmin', 'AdminController@showAllJobPosts');
Route::get('/jobEdit', 'AdminController@updateJobPost');
Route::get('/jobDelete', 'AdminController@deleteJobPost');
