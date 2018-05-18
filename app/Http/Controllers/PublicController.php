<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use Session;
class PublicController extends Controller
{
    private $ObjUser;
    private $ObjPackages;
    private $ObjRoles;
    public function __construct()
    {
        $this->ObjUser = new  UserController();
        $this->ObjRoles = new RolesPermissionsController();

        $this->ObjPackages = DB::table("packages")->where('PackageId',1)->first();
    
    }     
    public function index()
    {
        $aData['UserInfo'] = $this->ObjUser->UserInformation(Session::get('UserId'));
        $aData['jModulesJson'] = json_decode($this->ObjPackages->PackageModuleItems);
        $aData['aUserRoles'] = $this->ObjRoles->GetUserRoles(Session::get('UserId'));
        return view("MainPage",$aData);
        
    }

    public function ViewNewForm()
    {
         $aData["Countries"] = DB::table("countries")->get();
         $aData["aLevels"] = DB::table("levels")->get();
         $aData["Skills"] = DB::table("skills")->get();
         $aData["Degrees"] = DB::table("degrees")->get();     
         $aData["Languages"] = DB::table("languages")->get(); 
         return view("CvViews/NewCVForm",$aData);
    }  
    public function showDataGrid()
    {
         $aData["Candidates"] = DB::table("basic_information")->where("AddedBy",Session::get('UserId'))->get();
         return view("CvViews/CVDataGrid",$aData);
    }
}
