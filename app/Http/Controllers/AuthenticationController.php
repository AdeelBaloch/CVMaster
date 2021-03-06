<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
use Session;
use Redirect;
use Crypt;
use App\User;

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
        
        $ObjAction = User::where(["UserName"=>$UserName,"Password"=>$Password])->first();
        
        if($ObjAction->count()) :
                $ObjAction->LastLoggedInDateTime = date("Y-m-d H:i:s");
                $ObjAction->save();
                Session::put("UserId",$ObjAction->UserId);
        
                $this->ObjUser->AddLog("User LoggedIn Successfully");
                return ["URL"=>route("home")];
        else :
                return ["Message"=>"UserName Or Passowrd Invalid."];
	    endif;
    }

    public function Logout()
    {
        $ObjAction = User::find(Session::get('UserId'));
        $ObjAction->LastLoggedOutDateTime = date("Y-m-d H:i:s");
        if($ObjAction->save()) :
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

        $ObjAction = User::Orwhere(["UserName"=>$sUserName,"EmailAddress"=>$sEmailAddress]);
        if($ObjAction->count()){
            return ["Message"=>"User Account Already Exists."];
        }else
        {
            $ObjAction = new  User();
            $ObjAction->UserName = $sUserName;
            $ObjAction->Password = $sPassword;
            $ObjAction->FirstName = $sFirstName;
            $ObjAction->LastName = $sLastName;
            $ObjAction->EmailAddress = $sEmailAddress;
            $ObjAction->IsNewUser = 1;
            $ObjAction->save();
       
            if($ObjAction->UserId){
                Session::put("UserId",$ObjAction->UserId);
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
         $sUserToken = Crypt::encrypt($ObjQuery->first()->UserId."|".date("Y/m/d H:i:s", strtotime("+15 Minutes")));

         
         $sResetLink = route('CheckResetlinkValid',$sUserToken);
         
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

    public function CheckResetlinkValid($sUserToken)
    {
        $aUserToken = explode('|',Crypt::decrypt($sUserToken));
        $iUserId = $aUserToken[0];
        $dExpireTime = $aUserToken[1];
        
        if($dExpireTime > date("Y/m/d H:i:s", strtotime("now"))){
           
            $ObjQuery =  DB::table('users')->where('UserId',$iUserId);
          
            if($ObjQuery->count() > 0){
              
                $aData = ["sDefaultPage"=>route('ResetPassword',last(request()->segments()))];
                return  view("Authentication/MainPage",$aData);
            }
            else 
            return view('Errors/Errors',["Error"=>"AuthFaild"]);
        }
        else 
            return view('Errors/Errors',["Error"=>"AccessToken"]);
    } 

    public function UpdateNewPassword()
    {
        $aUserToken = explode('|',Crypt::decrypt(Input::get('sUserToken')));
        $sPassword = Crypt::encrypt(Input::get('Password'));

        $iUserId = $aUserToken[0];
        $dExpireTime = $aUserToken[1];
        
        if($dExpireTime > date("Y/m/d H:i:s", strtotime("now")))
        {
            if(DB::table('users')->where('UserId',$iUserId)->update(["Password"=>$sPassword,"UserUpdatedOn"=>date('Y-m-d H:m:s a'),'LastLoggedInDateTime' => date("Y-m-d H:i:s")]))
            {   
                Session::put("UserId",$iUserId);
                $this->ObjUser->AddLog("Password Recoverd Successuly");
                return ["URL"=>route("home")];
            }
            else 
              return ["Message"=>"There are some System problims Sorry.!"];
        }
        else 
             return view('Errors/Errors',["Error"=>"AccessToken"]);
        

       
    }
     
}
