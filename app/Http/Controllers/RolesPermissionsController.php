<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
class RolesPermissionsController extends Controller
{
    /* Arrays
       0 = View
       1 = Add
       2 = Edit
       3 = Delete

       Values = 0 or 1
       0 = Don't Allow
       1 = Allow

       */

    public $Modules;
    public $ObjUser;

    function __construct()
    {
        $this->Modules = json_decode(DB::table("packages")->where('PackageId',1)->first()->PackageModuleItems);
        $this->ObjUser = new UserController();

    }

    public function UserRoles($iUserId)
    {
        $iUserId = str_replace('/CVMaster','',base64_decode($iUserId));
        $aUserRoles='';
        $sUserRoles = $this->ObjUser->UserInformation($iUserId)->UserRoles;

        if($sUserRoles =='' || $sUserRoles == null)
            $sUserRoles='';
        else
            $aUserRoles = unserialize($sUserRoles);

        return $this->UserPermissions($iUserId,$aUserRoles);
    
    }
    
    public function UserPermissions($iUserId='',$aUserRoles='')
    {

        $sReturn='';
        $aUserRolesPermissions=array();
    
        foreach($this->Modules as $ObjModule)
        {

              $sReturn .= '<tr style="background:khaki;"><th colspan="5"><span>'. $ObjModule->ModuleName .'</span></th></tr>';

              
             

            if(count($ObjModule->SubMenues) > 0){
                $sRolesKey =  "aUserRoles_CVMaster_".$ObjModule->Module;

                if(!empty($aUserRoles) AND isset($aUserRoles->$sRolesKey))
                        $aUserRolesPermissions = $aUserRoles->$sRolesKey;
                else 
                    $aUserRolesPermissions =[0,0,0,0];
                // $sReturn .= '<tr style="background:khaki;"><th colspan="5"><span>'. $ObjModule->ModuleName .'</span></th></tr>';
                   
                $sReturn .= '<tr bgcolor="#edeff1"><td>'. $ObjModule->ModuleName .' Module</td>' . $this->GetUserRolesOption($ObjModule->Module,$aUserRolesPermissions) . '</tr>';

                 
                  foreach($ObjModule->SubMenues as $ObjSubMenu) :
                     $sRolesKey =  "aUserRoles_CVMaster_".$ObjModule->Module."_".$ObjSubMenu->Module;

                      if(!empty($aUserRoles) AND isset($aUserRoles->$sRolesKey))
                          $aUserRolesPermissions = $aUserRoles->$sRolesKey;
                      else 
                          $aUserRolesPermissions =[0,0,0,0];

                      $sReturn .= '<tr bgcolor="#edeff1"><td>'. $ObjSubMenu->ModuleName .':</td>' . $this->GetUserRolesOption($ObjSubMenu->Module,$aUserRolesPermissions) . '</tr>';

                  endforeach;
                
            


             }
            else{
                    // $sReturn .= '<tr style="background:khaki;"><th colspan="5"><span>'. $ObjModule->ModuleName .'</span></th></tr>';

                    $sRolesKey =  "aUserRoles_CVMaster_".$ObjModule->Module;

                      if(!empty($aUserRoles))
                          $aUserRolesPermissions = $aUserRoles->$sRolesKey;
                      else 
                          $aUserRolesPermissions =[0,0,0,0];

                      $sReturn .= '<tr bgcolor="#edeff1"><td>'. $ObjModule->ModuleName .':</td>' . $this->GetUserRolesOption($ObjModule->Module,$aUserRolesPermissions) . '</tr>';

            }
      }
       
        return view('UserViews/UserRoles',["sRolesData" => $sReturn,"iUserId" =>$iUserId]);
    }

    function GetUserRolesOption($sOptionName, $aOptionValue, $bView = true, $bAdd = true, $bUpdate = true, $bDelete = true)
    {
        $sReturn = '';
       
        if ($bView) $sReturn .= '<td align="center"><input ' . (($aOptionValue[0] == 1) ? 'checked="true"' : '') . ' type="checkbox" name="' . $sOptionName . '_View" id="' . $sOptionName . '_View" value="on" /></td>';
        else $sReturn .= '<td></td>';

        if ($bAdd) $sReturn .= '<td align="center"><input ' . (($aOptionValue[1] == 1) ? 'checked="true"' : '') . ' type="checkbox" name="' . $sOptionName . '_Add" id="' . $sOptionName . '_Add" value="on" /></td>';
        else $sReturn .= '<td></td>';

        if ($bUpdate) $sReturn .= '<td align="center"><input ' . (($aOptionValue[2] == 1) ? 'checked="true"' : '') . ' type="checkbox" name="' . $sOptionName . '_Update" id="' . $sOptionName . '_Update" value="on" /></td>';
        else $sReturn .= '<td></td>';

        if ($bDelete) $sReturn .= '<td align="center"><input ' . (($aOptionValue[3] == 1) ? 'checked="true"' : '') . ' type="checkbox" name="' . $sOptionName . '_Delete" id="' . $sOptionName . '_Delete" value="on" /></td>';
        else $sReturn .= '<td></td>';

        return($sReturn);
    }

    public function SaveRoles()
    {

        $iUserId = Input::get('UserId');
        $aUserRoles='';
        $aUserRoles = (object) $aUserRoles;
        foreach($this->Modules as $ObjModule)
        {
            $sRole1 =  "aUserRoles_CVMaster_".$ObjModule->Module;

            if(count($ObjModule->SubMenues) > 0){


                    $aRoles1 = array();
                    $aRoles1[0] = (Input::get("". $ObjModule->Module ."_View") == "on") ? 1 : 0; // View
                    $aRoles1[1] = (Input::get("". $ObjModule->Module ."_Add") == "on") ? 1 : 0; // Add
                    $aRoles1[2] = (Input::get("". $ObjModule->Module ."_Update") == "on") ? 1 : 0; // Update
                    $aRoles1[3] = (Input::get("". $ObjModule->Module ."_Delete") == "on") ? 1 : 0; // Delete
                    $aUserRoles->$sRole1 = $aRoles1;

              foreach($ObjModule->SubMenues as $ObjSubMenu) :
                    $sRole2 =  "aUserRoles_CVMaster_".$ObjModule->Module."_".$ObjSubMenu->Module;
                    $aRoles2 = array();

                    $aRoles2[0] = (Input::get("". $ObjSubMenu->Module ."_View") == "on") ? 1 : 0; // View
                    $aRoles2[1] = (Input::get("". $ObjSubMenu->Module ."_Add") == "on") ? 1 : 0; // Add
                    $aRoles2[2] = (Input::get("". $ObjSubMenu->Module ."_Update") == "on") ? 1 : 0; // Update
                    $aRoles2[3] = (Input::get("". $ObjSubMenu->Module ."_Delete") == "on") ? 1 : 0; // Delete
                    $aUserRoles->$sRole2 = $aRoles2;
              endforeach;
            }else{
               
                $aRoles1 = array();
                $aRoles1[0] = (Input::get("". $ObjModule->Module ."_View") == "on") ? 1 : 0; // View
                $aRoles1[1] = (Input::get("". $ObjModule->Module ."_Add") == "on") ? 1 : 0; // Add
                $aRoles1[2] = (Input::get("". $ObjModule->Module ."_Update") == "on") ? 1 : 0; // Update
                $aRoles1[3] = (Input::get("". $ObjModule->Module ."_Delete") == "on") ? 1 : 0; // Delete
                $aUserRoles->$sRole1 = $aRoles1;
            }
        }

        if(DB::table('users')->where("UserId",$iUserId)->update(["UserRoles" => serialize($aUserRoles)]))
            return "Success";
        else
            return "faild";
        
    }


    public function GetUserRoles($iUserId)
    {
       $sUserRoles =  DB::table("users AS U")->first()->UserRoles;
       return unserialize($sUserRoles);
    }

}
