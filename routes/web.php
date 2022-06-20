<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
});
Route::get('/getroutes', function() {
    $routeCollection = Route::getRoutes();
    echo "<table style='width:100%;border:2px;'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>";
        foreach ($value->methods as $method) {
            echo " " . $method . ",";
        }
        echo "</td>";
        echo "<td>" . $value->uri . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

// Admin Dashboard Login Routes
        Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


 Route::middleware('admin')->group(function(){

// Admin Dashboard Route

Route::get('dashboard','DashboardControllerController@index')->name('dashboard');
// Admin Dashboard Route End

// Admin Customer Route *********************************


// Admin General Setting Route *************************************

// Create Role Show Form Route
Route::get('create/role', 'GeneralSettingController@RoleCreate')->name('role.create');
// Create Role Route
Route::post('create/role', 'GeneralSettingController@AssignPermissionToRole')->name('role.create');
// All Roles List Route
Route::get('role/list', 'GeneralSettingController@RoleList')->name('list.role');
// Role Delete Route
Route::get('role/delete/{id}', 'GeneralSettingController@RoleDelete')->name('delete.delete');
// Role Edit Show Form Route
Route::get('role/edit/{role}', 'GeneralSettingController@RoleEdit')->name('edit.role');
// Role Edit Route
Route::post('update/role/{role}', 'GeneralSettingController@UpdateRole')->name('role.update');
// Admin Create Show Form Route
Route::get('create/admin', 'GeneralSettingController@AdminCreateForm')->name('admin.create');
// Admin Create Route
Route::post('create/admin', 'GeneralSettingController@AdminCreate')->name('admin.create');


// Admin General Setting Route End *************************************

});
});

Route::namespace('Front')->prefix('/')->name('front.')->group(function(){

    // Admin Dashboard Login Routes
 Route::namespace('Auth')->group(function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'RegisterController@register')->name('register');

    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/code-verify', 'ForgotPasswordController@codeVerify')->name('password.code_verify');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
// Social Login Routes For Google ***************************
    Route::get('login/google/callback/{data}', 'LoginController@handleGoogleCallback');

// Social Login Routes For Facebook ***************************
    Route::get('login/facebook/callback/{data}', 'LoginController@handleFacebookCallback');
// Account Activate Login Routes For user ***************************
Route::get('activate/account/user/{id}', 'LoginController@AccountActivated')->name('activate.login');
    });

   // Front Home Route
Route::get('/', 'HomeController@index')->name('home');
});

Route::namespace('Dashboard')->prefix('dashboard')->name('dashboard.')->group(function(){
    Route::middleware('auth')->group(function(){
      Route::get('/', 'DashboardController@index')->name('page');
      Route::get('/campaign', 'CampaignController@index')->name('campaign');
      Route::get('/campaign/{id}', 'CampaignController@viewCampaign')->name('campaign.view');
      Route::post('/campaign', 'CampaignController@create')->name('campaign');
      Route::get('/campaign/check/adspot/{country}/{state}/{government}', 'CampaignController@CheckAdSpot')->name('check/campaign');
      Route::get('/campaign/number/check/adspot/{value}/{colunm}', 'CampaignController@CheckAdSpotNumber')->name('check/number/campaign');
      Route::post('/compain/extend', 'CampaignController@ExtendCompaign')->name('extend/campaign');
      Route::get('/compain/selected/adspot/{value}', 'CampaignController@SelectedAdSpotData')->name('adspot/selected/campaign');
      Route::get('/billing', 'BillingController@index')->name('billing');
      Route::get('/adspace', 'AdSpaceController@index')->name('adspace');
      Route::get('adspace/delete/{id}', 'AdSpaceController@deleteAdSpace')->name('adspace.delete');
      Route::post('/adspace', 'AdSpaceController@create')->name('adspace');
      Route::get('/adspace/state/{country}', 'AdSpaceController@NewState')->name('adspace.state');
      Route::get('/adspace/government/{state}', 'AdSpaceController@NewGovernment')->name('adspace.government');
      Route::get('/media', 'MediaController@index')->name('media');
      Route::get('/setting', 'SettingController@index')->name('setting');
      Route::post('/setting', 'SettingController@create')->name('setting');


    });
});
