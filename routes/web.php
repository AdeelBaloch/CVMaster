<?php

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



// Route::get('',"PublicController@index")->name("home");
Route::get("",["uses"=>"PublicController@index","middleware"=>"IsNotLoggedIn"])->name("home");
Route::get('Ajax/ViewNewForm',"PublicController@ViewNewForm")->name("AddNewCV");
Route::post('CV/AddCV',"PublicController@AddCV")->name("AddCV");

// ajax requests
Route::get('Ajax/GetProvince',"AjaxController@GetProvince")->name("GetProvince");
Route::get('Ajax/GetDistrict',"AjaxController@GetDistrict")->name("GetDistrict");
Route::get('Ajax/GetTaluka',"AjaxController@GetTaluka")->name("GetTaluka");
Route::get('Ajax/GetUC',"AjaxController@GetUC")->name("GetUC");
Route::get('Ajax/GetDomicile',"AjaxController@GetDomicile")->name("GetDomicile");

// CV Managment Requests 
Route::get('Ajax/CV/View/{Id?}',"CvController@ViewCV")->name("ViewCV");
Route::get('Ajax/Ganerate/Pdf/{InfoId?}',"PDFController@GaneratePDF")->name("GaneratePdf");
Route::post('Ajax/CV/Add',"CvController@AddCV")->name("AddCV");
Route::get('Ajax/CV/edit/{Id?}',"CvController@EditCV")->name("EditCV");
Route::post('Ajax/CV/UpdateCV',"CvController@UpdateCV")->name("UpdateCV");
Route::get('Ajax/DeleteCV/{Id?}',"CvController@DeleteCV")->name("DeleteCV");
Route::get('Ajax/datagrid',"PublicController@showDataGrid")->name("CVShowGrid");
Route::get('Ajax/getdata',"PublicController@getdata")->name("getdata");
Route::get('Ajax/DeleteCV/{Id?}/{Colmn?}/{TableName?}',"CvController@DeleteRowItems")->name("DeleteRowItems");
Route::get('CV/total/cv',"CvController@TotalCV")->name('TotalCV');
Route::get('CV/total/cv/saved',"CvController@TotalSavedCV")->name('TotalSavedCV');
Route::get('CV/total/cv/deleted',"CvController@TotalDeletedCV")->name('TotalDeletedCV');

// Authentication requests
Route::get("Authentication/Home",function(){ return  view("Authentication/MainPage"); })->name("AuthenticationMain");
Route::any("Authentication/LogIn","AuthenticationController@Authentication")->name("Authentication");
Route::get("Authentication/LogOut","AuthenticationController@Logout")->name("Logout");
Route::get("Authentication/User/login",function(){ return  view("Authentication/Login"); })->middleware('IsLoggedIn')->name("ShowLogin");
Route::get("Authentication/User/SignUp",function(){ return  view("Authentication/SignUpForm"); })->name("SignUpForm");
Route::POST("Authentication/User/SignUp","AuthenticationController@SignUp")->name('SignUp');
Route::any("Authentication/Account/User/ForgetPassword",function(){ return view("Authentication/ForgetPassword"); })->name('ForgetPassword');
Route::POST("Authentication/Account/User/SendResetPasswordLink","AuthenticationController@SendResetLink")->name('SendResetLink');
Route::get("Authentication/Account/User/ResetPasswordForm/{sUserToken?}",function($sUserToken){ 
    
    return view("Authentication/ResetPassword",["sUserToken"=>$sUserToken]); 

})->name('ResetPassword');
Route::get("Authentication/Account/User/CheckResetlinkValid/{UserId}","AuthenticationController@CheckResetlinkValid")->name('CheckResetlinkValid');
Route::POST("Authentication/Account/User/UpdatePassword","AuthenticationController@UpdateNewPassword")->name('UpdateNewPassword');


// Dashboard Requests
Route::any("Dashboard/","DashboardController@index")->name("Dashboard");
Route::get("Dashboard/User","UserController@GlobalUser")->name("users");



// User Managment Requests
Route::get("User/Profile/{UserId?}","UserController@ViewProfile")->name("ViewProfile");
Route::get("User/Profile/Edit/{UserId?}","UserController@EditProfile")->name("EditProfile");
Route::post("User/Profile/Update","UserController@UpdateProfile")->name("UpdateProfile");
Route::POST("User/IsNewUser","UserController@IsNewUser")->name('IsNewUser');

Route::get("User/UsersDataGrid","UserController@UsersDataGrid")->name('UsersDataGrid');
Route::get("User/Delete","UserController@DeleteUser")->name("DeleteUser");


// User Log Managment Requests
Route::GET("System/Log/Add","SystemLogController@AddLog")->name("AddLog");
Route::POST("System/Log/Delete/LogLine","SystemLogController@DeleteLog")->name("DeleteLog");
Route::get("System/Log/Grid",function(){ return view('SystemLogs/LogsGrid'); })->name("LogsGrid");
Route::GET("System/Log/LogFiles","SystemLogController@LogFiles")->name("LogFiles");
Route::GET("System/Log/ViewLogs/","SystemLogController@ViewLogs")->name("ViewLogs");
Route::POST("System/Log/Delete/LogFile","SystemLogController@DeleteLogFile")->name("DeleteLogFile");
// Route::get("System/Log/Logs",function(){ return view('SystemLogs/ViewLogs'); })->name("Logs");




// PHP artisan command using URl
Route::get('/clear-cache', function() { $exitCode = Artisan::call('cache:clear'); });

// User Roles And Permission Managment Requests
Route::get("User/Roles/{UserId?}","RolesPermissionsController@UserRoles")->name("UserRoles");
Route::POST("User/Roles/SaveRoles","RolesPermissionsController@SaveRoles")->name("SaveRoles");

Route::get('System/Error/AccessDenied',function(){ return view("Errors/Permission"); })->name('PermissionError');


// Email Routes
Route::get('Email/Send/TestMail',"EmailController@SendTestEmail")->name('SendTestEmail');


// Errors Managment
Route::get("Error/{sError?}",function($sError){
    
    return view('Errors/Errors',["Error"=>$sError]);
})->name('ShowError');   

// for testing
Route::get("CVTemplates/",function(){
    return view('CVViews/CVTemplates/template1');
})->name('CVtemplate');   

Route::get("Charts/",function(){
    return view('ChartsViews/Barchart');
});   


Route::get("User/url/test/","UserController@test")->name("test");