<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
use Session;
use Redirect;
use Crypt;

class AuthenticationController extends Controller
{
    private $ObjUser;
    private $ObjEmail;
    public function __construct()
    {
        $this->ObjUser = new SystemLogController();
        $this->ObjEmail = new EmailController();

    }
    public function index()
    {
        $aData = ["sDefaultPage"=>route('ShowLogin')];
        return  view("Authentication/MainPage", $aData);
    }
    
    public function Authentication()
    {
    	$UserName = Input::get('username');
    	$Password = Input::get('pass');
        
        $ObjAction = DB::table("users")->where(["UserName"=>$UserName,"Password"=>$Password]);

    	if($ObjAction->count()) :
            $iUserId = $ObjAction->first()->UserId;
            Session::put("UserId",$iUserId);
            DB::table('users')->where('UserId',$iUserId)->update(['LastLoggedInDateTime' => date("Y-m-d H:i:s")]);
            $this->ObjUser->AddLog("User LoggedIn Successfully");
          
            return ["URL"=>route("home")];
         else :
            return ["Message"=>"UserName Or Passowrd Invalid."];
    	endif;
    }

    public function Logout()
    {
	 	$TimeUpdated = DB::table("users")->where("UserId",Session::get('UserId'))->update(['LastLoggedOutDateTime'=> date("Y-m-d H:i:s")]);
        if($TimeUpdated) : 
            $this->ObjUser->AddLog("User Logout Successfully");
            Session::forget("UserId");
            Session::flash("msg",'Logged Out Success..!');
            Session::flash("msg_class",'alert alert-success alert-dismissable fade in');
          
            return Redirect('Authentication/Home');
        endif;
    }


    public function SignUp()
    {
        
        $sFirstName = Input::get('Fname');
        $sLastName = Input::get('Lname');
        $sEmailAddress = Input::get('EmailAddress');
        $sUserName = Input::get('UserName');
        $sPassword = Input::get('Password');
        
        
        if(DB::table('users')->orwhere(["UserName"=>$sUserName,"EmailAddress"=>$sEmailAddress])->count()){
            return ["Message"=>"User Account Already Exists."];
        }else{
            if( $iUserId = DB::table('users')->insertGetId(["EmailAddress"=>$sEmailAddress,"UserName"=>$sUserName,"Password"=>$sPassword,"FirstName"=>$sFirstName,"LastName"=>$sLastName,"IsNewUser"=>1])){
                Session::put("UserId",$iUserId);
                $this->ObjUser->AddLog("New Account has Been Created");
                $this->ObjEmail->SendEmail(["Name"=>$sFirstName.' '.$sLastName,"Message"=>"Your Demo Account has been created"],$sEmailAddress,"Account has been created");
                return ["URL"=>route("home")];
            }
        }
    }
    
    public function SendResetLink(){

      
        $sEmailAddress = Input::get('EmailAddress');
        $ObjQuery =  DB::table('users')->where('EmailAddress',$sEmailAddress);

        if($ObjQuery->count() > 0 ){
         $sName = $ObjQuery->first()->FirstName." ".$ObjQuery->first()->LastName;
         $iUserId = Crypt::encrypt($ObjQuery->first()->UserId);
         
         $sResetLink = route('CheckResetlinkValid',$iUserId);
         $sMessage = "Please click the flowing link to Reset your Password";   
         $bSent = $this->ObjEmail->SendEmailResetLink(["Name"=>$sName,"Message"=>$sMessage,'sLink'=>$sResetLink],$sEmailAddress,"Reset Password Link");
        
         if($bSent)
            return view('Authentication/SentResetLinkMsg');
         else 
             return 'Faild';
        }
        else
             return 'NotAvailable';
            
    } 

    public function CheckResetlinkValid($UserId)
    {
     
        $iUserId = Crypt::decrypt($UserId);
        $ObjQuery =  DB::table('users')->where('UserId',$iUserId);
          
        if($ObjQuery->count() > 0){
          
            $aData = ["sDefaultPage"=>route('ResetPassword',last(request()->segments()))];
            return  view("Authentication/MainPage",$aData);
        }
        else 
        return "<center><h2>404 Not Found</h2></center>";
    } 

    public function UpdateNewPassword()
    {
     
         $iUserId = Crypt::decrypt(Input::get('sUserId'));
         $sPassword = Crypt::encrypt(Input::get('Password'));

        if(DB::table('users')->where('UserId',$iUserId)->update(["Password"=>$sPassword,"UserUpdatedOn"=>date('Y-m-d H:m:s a'),'LastLoggedInDateTime' => date("Y-m-d H:i:s")]))
        {   
            Session::put("UserId",$iUserId);
            $this->ObjUser->AddLog("Password Recoverd Successuly");
            return ["URL"=>route("home")];
        }
        else 
          return ["Message"=>"There are some System problims Sorry.!"];
    }
     
}
