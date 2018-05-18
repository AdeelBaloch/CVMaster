<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Input;

class SystemLogController extends Controller
{
    public function AddLog($sUserAction="")
    {
        $sUserAction ="Asdasdasd";
        
    	$ObjUser = new UserController();
    	$ObjUser = $ObjUser->UserInformation(Session::get('UserId'));
    	$sIPAddress = $_SERVER['REMOTE_ADDR'];
        $sUserFullName = $ObjUser->FirstName.''.$ObjUser->LastName;
        $iUserId = Session::get('UserId');

            
        $sUserAction = str_replace(",", " ", $sUserAction);
        $sLogContents =date("F j Y, g:i:s a") . ',' .
                $iUserId . ',' .
                $sUserFullName . ',' .
                $sIPAddress . ',' .
                $sUserAction."\n";
       
        $sFilePath = 'storage/SystemsLogs/' . date("F Y") . '.log';   
        $fHandle = fopen($sFilePath, 'a');  
            $sContents = file_get_contents($sFilePath);
            if($sContents !='' || !empty($sContents))
                    $sLogContents = "|".$sLogContents;
        
       
        file_put_contents($sFilePath, $sLogContents, FILE_APPEND);
        fclose($fHandle);
        
        return 1;
        
    }

    public function ViewLogs()
    {
        $sFilePath = Input::get('FileName');
        $sHTML='';
        $sHTML.='<thead> 
                <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>UserId</th>
                        <th>User Name</th>
                        <th>IP Address </th>
                        <th>User Log</th>
                        <th>Action</th>
                </tr>
                </thead>
                <tbody>';
            
                    
                    
                    $sLogContents = ltrim(file_get_contents($sFilePath),"|");
                    
                    $aLogContents = explode("|",$sLogContents);
                    for ($i=0; $i < count($aLogContents) ; $i++)
                    { 
                        $aLog = explode(',',$aLogContents[$i]);
                        
                        $sHTML .= '<tr>'; 
                            
                        for ($a=0; $a < count($aLog); $a++)
                            $sHTML .= '<td>' . $aLog[$a] .'</td>';
                            
                            $sLog=  trim(preg_replace('/\s\s+/', ' ', "|".$aLogContents[$i]));
                            $sHTML .= '<td><a href="#" onclick="DeleteLogLine(\''.$sLog.'\',\''.$sFilePath.'\');" ><i class="fa fa-trash" style="font-size: 16px;color: red;"></i></a></td></tr>'; 
                    }
           
         $sHTML .= '</tbody>';
         return $sHTML;
         
    }

    public function LogFiles()
    {
        $aLogFiles = glob('storage/SystemsLogs/'.'*.log');
        $a=1;  
        $sHTML ='';   
        $sHTML.='
        <thead>
        <tr>
        <th> #No.</th>
        <th> File Name</th>
        <th> Date modified</th>
        <th> Oprations</th>
        </tr>
        </thead>
        <tbody>
        </tbody>';
        foreach($aLogFiles  as  $sFile){
                $sFileName = str_replace('.log','',str_replace('storage/SystemsLogs/','',$sFile));
            $sHTML .= '
                <tr>
                    <td>'.$a++.'</td>
                    <td>'.($sFileName).'</td>
                    <td>'.(date('m-d-Y H:s:m a',filemtime ($sFile))).'</td>
                    <td><a href="#" onclick="DeleteLogFile(\''.$sFile.'\');" ><i class="fa fa-trash" style="font-size: 16px;color: red;"></i></a>
                    <a href="#" onclick="AjaxRequest(\'#LogsGrid\', \''.route('ViewLogs').'\',\''.$sFile.'\')" ><i class="fa fa-eye" style="font-size: 18px;color: green;"></i></a></td>
                </tr>';
        }
                               
        $sHTML .= '</tbody>';
         return $sHTML;
    }


    function DeleteLog(){
   
        $sLog = Input::get('sLog');
        $sFilePath =  Input::get('FilePath');
    
        if( strpos(file_get_contents($sFilePath),$sLog) !== false) 
            $sLog = $sLog;
        else
             $sLog = str_replace('|','',$sLog);

          $sLogContents = file_get_contents($sFilePath);
          $contents = str_replace($sLog, '', $sLogContents);

          if(file_put_contents($sFilePath, preg_replace('~[\r\n]+~', "\r\n",trim($contents)))){
              return 200;
          }else{
              return 404;
          }   
    }

    function DeleteLogFile()
    {
        if(file_exists(Input::get('sFileName'))){
            if(unlink(Input::get('sFileName')))
                return 200;
        }
        return 404;
    }
}
