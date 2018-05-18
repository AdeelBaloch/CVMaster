<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Mail;

class EmailController extends Controller
{
    public function SendTestEmail()
    {

        $data = ['Name'=>"CV Master User","Message"=>"Testing Message From CV Master",'sLink'=>"asdsa"];
    	$email = "abaloach@vergesystems.com";
    	$subject ="Accounnt has Been Created"; 
  
    
		Mail::send('EmailsView.ResetLink', $data, function($message) use($email,$subject){
            $message->to($email)->subject($subject);
        });
        // return view(EmailsView.Email,$data);
        // return view('EmailsView.ResetLink',$data);
    }

    public function SendEmailResetLink($aData=array('Name'=>"No Name","Message"=>"No Message"),$sEmail,$sSubject)
    {
        Mail::send('EmailsView.ResetLink', $aData, function($message) use($sEmail,$sSubject){
            $message->to($sEmail)->subject($sSubject);
        });

        if (Mail::failures()) {
            return false;
        }
        else
            return true;
    }

    public function SendEmail($aData=array('Name'=>"No Name","Message"=>"No Message"),$sEmail,$sSubject)
    {
        Mail::send('EmailsView.ResetLink', $aData, function($message) use($sEmail,$sSubject){
            $message->to($sEmail)->subject($sSubject);
        });

        if (Mail::failures()) {
            return false;
        }
        else
            return true;
    }


}
