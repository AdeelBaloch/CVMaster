<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Location;
use GeoIP;
use Input;
use Storage;
use UploadedFile;
use log;
	
class UserController extends Controller
{

    
    public function UsersDataGrid(){

        $aData['Users'] = DB::table('users')->get();
        return view('UserViews/UsersDataGrid',$aData);
    }
    public function UserInformation($iUserId='')
	{	
        $aUserData = DB::table("users AS U")
			->leftjoin('countries AS C', 'C.country_id', '=', 'U.CountryId')
			->leftjoin('province AS P', 'P.ProvinceId', '=', 'U.ProvinceId')
			->leftjoin('districts AS D', 'D.DistrictId', '=', 'U.DistrictId')
			->select("U.*","C.country_name","P.province_name","D.DistrictName")
			->where("UserId",$iUserId)->first();
		return $aUserData;
	}

    public function ViewProfile($iUserId='')
    {
        if($iUserId !='')
            $iUserId = $iUserId;
        else
            $iUserId = Session::get('UserId');    

            
    	$aData['UserInfo'] = $this->UserInformation($iUserId);
        return view("UserViews/ViewProfile",$aData);
    }

    public function EditProfile($iUserId='')
    {
        $objRolesPermissions = new RolesPermissionsController();
        
        if($iUserId !='')
            $iUserId = $iUserId;
        else
            $iUserId = Session::get('UserId'); 
            
    	$aData["Countries"] = DB::table("countries")->get();
    	$aData['UserInfo'] = $this->UserInformation($iUserId);
    	$aData['CurrentUserInfo'] = $this->UserInformation(Session::get('UserId'));
    	return view("UserViews/EditProfile",$aData);
    }

    public function UpdateProfile(Request $request)
    {

       
         $iUserId = Input::get('UserId');
        //  $aPermissions = Input::get('Permissions');
         $aUserData = Input::get();
         unset($aUserData['EmailAddress'],$aUserData['UserName'],$aUserData['ActiveUserId'],$aUserData['UserId'],$aUserData['_token']);
         $Objlog = new SystemLogController(); 
        
         if($request->hasfile("UserImage")) :
	     	$aUserData["UserImage"] = str_replace("public/","",$request->file('UserImage')->store("public/files/UserFiles"));
            $Objlog->AddLog("Changed Profile Picture");
         endif;  
    
         if(DB::table('users')->where("UserId",$iUserId)->update($aUserData)) 
    	     $Objlog->AddLog("User Profile Updated Success");
         else 
    	 	$Objlog->AddLog("User Profile Update Faild");
         
         return "success";


         
    }

    public function IsNewUser()
    {
        $iUserId = Session::get('UserId');
        if(DB::table('users')->where(['UserId'=>$iUserId,"IsNewUser"=>1])->count()){
            if(DB::table('users')->where("UserId",$iUserId)->update(['IsNewUser'=>0]))
                return "success";
            
        }
    }

    public function UserTypes()
    {
        return  DB::table('User_types')->where('status',1)->get();
    }

    public function DeleteUser()
    {
        return  "Work In Progress";
    }

    // public function UserRoles($iUserId)
    // {
    //     echo "<pre>";
    //     print_r($this->UserInformation($iUserId));
    //     // $sUserRoles = $this->UserInformation($iUserId)->UserRoles;
    //     // return unserialize($sUserRoles);
    // }
}
