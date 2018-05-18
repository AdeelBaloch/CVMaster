<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use PDF;
use Dompdf\Dompdf;
use Session;

class CvController extends Controller
{
      private $ObjLog;
      private $ObjUser;

      public function __construct()
      {
        
        $this->ObjLog = new SystemLogController();
        $this->ObjUser = new UserController();

      }
    	public function ViewCV($InfoId)
    	{
    		      $aData["Candidate"] = DB::table("basic_information AS B")
                       ->join('countries AS C', 'C.country_id', '=', 'B.NationalityId')
                       ->join('province AS P', 'P.ProvinceId', '=', 'B.ProvinceId')
                       ->join('districts AS D', 'D.DistrictId', '=', 'B.DistrictId')
                       ->join('taluka AS T', 'T.TownId', '=', 'B.TownId')
                       ->join('uc AS U', 'U.UcId', '=', 'B.UcId')
                       ->join('domicile AS DOM', 'DOM.DomicileId', '=', 'B.DomicileId')
                       ->select(DB::raw("B.InfoId,concat(B.FirstName,' ',B.LastName) AS 'Name',
                            B.Surname,B.FatherName,B.CNIC,B.Mobile,B.EmailAddress,B.HomeAddress,
                                  C.country_name AS 'country',P.province_name AS 'province',
                                  D.DistrictName,T.TownName,U.UcName,DOM.Domicile,DATE_FORMAT(B.DOB,'%M - %d - %Y') AS DOB
                                  ,B.MaritalStatus"))
                        ->where("B.InfoId",$InfoId)->first();

             $aData["Qualification"] = DB::table("qualification AS Q")
         			->join('degrees AS D', 'D.DegreeId', '=', 'Q.DegreeId')
                    ->where("Q.InfoId",$InfoId)->get();    
                    
             $aData["WorkExperince"] = DB::table("work_experiences AS W")
                     ->select(DB::raw("W.Wid,W.Organization,W.JobTitle,W.Designation,
                         DATE_FORMAT(W.StartDate, '%M - %d - %Y') AS 'StartDate',
                         DATE_FORMAT(W.EndDate,'%M - %d - %Y') AS 'EndDate'"))
                      ->where("W.InfoId",$InfoId)->get();  

              $aData["Languages"] = DB::table("candidate_languages AS CL")
                       ->join('languages AS L', 'L.LanguageId', '=','CL.LanguageId')
                       ->join('levels AS SL', 'SL.LevelId', '=', 'CL.Speaking_levelId')
                       ->join('levels AS RL', 'RL.LevelId', '=', 'CL.Reading_levelId')
                       ->join('levels AS WL', 'WL.LevelId', '=', 'CL.Writing_levelId')
                       ->select("L.Language","SL.Level AS SpeakingLavel","RL.Level AS ReadingLevel",
                       		"WL.Level AS WritingLevel")
                        ->where("CL.InfoId",$InfoId)->get();     
                    
              $aData["Referencers"] = DB::table("referencers AS R")
                        ->where("R.InfoId",$InfoId)->get();  

              $aData["Skills"] = DB::table("candidate_skills AS CS")
              		   ->join('skills AS S', 'S.SkillId','=', 'CS.SkillId')
                       ->join('levels AS L', 'L.LevelId','=', 'CS.LevelId')
                        ->where("CS.InfoId",$InfoId)->get();               


              return view("CvViews.CVTemplate",$aData);
    	}
    

  	  public function AddCV()
      {
      	    
        		$aBasicInformation = [
        						    "FirstName" =>Input::get('FirstName'),
        						    "LastName" =>Input::get('LastName'),
        						    "FatherName" =>Input::get('FatherName'),
        						    "Surname" =>Input::get('Surname'),
        						    "CNIC" =>Input::get('CNIC'),
                          			"DOB"=>Input::get('DOB'),
        						    "Gander"=>Input::get('Gander'),
        						    "Mobile" =>Input::get('Mobile'),
        						    "EmailAddress" =>Input::get('EmailAddress'),
        						    "HomeAddress" =>Input::get('HomeAddress'),
        						    "NationalityId" =>Input::get('country_id'),
        						    "ProvinceId" =>Input::get('ProvenceId'),
        						    "DistrictId" =>Input::get('DistrictId'),
        						    "TownId" =>Input::get('TalukaId'),
        						    "UcId" =>Input::get('UcId'),
        						    "DomicileId" =>Input::get('DomicileId'),
                                    "MaritalStatus" => Input::get('MaritalStatus'),
        						    "AddedOn" => date("Y-m-d H:m:s a"),
        						    "AddedBy" => Session::get("UserId")
        							];


            	if ($iInfoId = DB::table('basic_information')->insertGetId($aBasicInformation))
            	{

                  $aSkills=array();
                  for ($i=0; $i <count(Input::get()) ; $i++) {
                      if(Input::get("SkillId_".$i) AND Input::get("skill_Level_".$i) ) :
                        
                          $aSkills[$i]=["SkillId" => Input::get("SkillId_".$i),
                              "LevelId" => Input::get("skill_Level_".$i),
                              'InfoId'=>$iInfoId,
                              "AddedOn" => date("Y-m-d H:m:s a")];
                     
                            endif;
                  }
                  
                  $aReferences=array();
                  for ($i=0; $i <count(Input::get()) ; $i++) {
                      if(Input::get("R_Name_".$i) AND Input::get("R_Organization_".$i)
                          AND Input::get("R_Mobile_".$i) AND Input::get("R_EmailAddress_".$i)) :

                          $aReferences[$i]=["Name" => Input::get("R_Name_".$i),
                              "Organization" => Input::get("R_Organization_".$i),
                              "Contact" => Input::get("R_Mobile_".$i),
                              "Email" => Input::get("R_EmailAddress_".$i),
                              'InfoId'=>$iInfoId,
                              "AddedOn" => date("Y-m-d H:m:s a")];
                      endif;
                  }

                  $aLanguages=array();
                  for ($i=0; $i <count(Input::get()) ; $i++) {
                      if(Input::get("LanguageId_".$i) AND Input::get("speaking_Level_".$i)
                          AND Input::get("reading_Level_".$i) AND Input::get("writing_Level_".$i)) :

                          $aLanguages[$i]=[ "LanguageId" => Input::get("LanguageId_".$i),
                              "Speaking_levelId" => Input::get("speaking_Level_".$i),
                              "Reading_levelId" => Input::get("reading_Level_".$i),
                              "Writing_levelId" => Input::get("writing_Level_".$i),
                              'InfoId'=>$iInfoId,
                              "AddedOn" => date("Y-m-d H:m:s a")];
                      endif;
                  }

                  $aWorkExperience=array();
                  for ($i=0; $i <count(Input::get()) ; $i++) {
                      if(Input::get("W_JobTitle_".$i) AND Input::get("W_Organization_".$i)
                          AND Input::get("W_Designation_".$i) AND Input::get("W_StartDate_".$i)
                          AND Input::get("W_EndDate_".$i)) :

                          $aWorkExperience[$i]=[ "JobTitle" => Input::get("W_JobTitle_".$i),
                                  "Organization" => Input::get("W_Organization_".$i),
                                  "Designation" => Input::get("W_Designation_".$i),
                                  "StartDate" => Input::get("W_StartDate_".$i),
                                  "EndDate" => Input::get("W_EndDate_".$i),
                                  'InfoId'=>$iInfoId,
                                  "AddedOn" => date("Y-m-d H:m:s a")];
                      endif;
                  }

                  $aQualification=array();
                  for ($i=0; $i <count(Input::get()) ; $i++) {
                      if(Input::get("Q_Degree_".$i) AND Input::get("Q_Institute_".$i)
                          AND Input::get("Q_Grade_".$i) AND Input::get("Q_Year_".$i)) :

                          $aQualification[$i]=[ "DegreeId" => Input::get("Q_DegreeId_".$i),
                              "Institute" => Input::get("Q_Institute_".$i),
                              "Grade" => Input::get("Q_Grade_".$i),
                              "Year" => Input::get("Q_Year_".$i),
                              'InfoId'=>$iInfoId,
                              "AddedOn" => date("Y-m-d H:m:s a")];

                      endif;
                  }

                  if(!$aQualification =='') :
         		         for ($i=0; $i <count($aQualification) ; $i++) 
                           DB::table('qualification')->insert($aQualification[$i]);

                  endif;
                  if(!$aWorkExperience =='') :
                       for ($i=0; $i <count($aWorkExperience) ; $i++)
                             DB::table('work_experiences')->insert($aWorkExperience[$i]);

                  endif;   

        			if(!$aLanguages =='') :
        			      for ($i=0; $i <count($aLanguages) ; $i++)
        					   DB::table('candidate_languages')->insert($aLanguages[$i]);

                  endif;     
                

                 if(!$aReferences =='') :   
        			      for ($i=0; $i < count($aReferences); $i++) 
                              DB::table('referencers')->insert($aReferences[$i]);

                  endif;  

                  if(!$aSkills =='') : 
        			      for ($i=0; $i <count($aSkills) ; $i++)
                             DB::table('candidate_skills')->insert($aSkills[$i]);

        		    endif;
                  $this->ObjLog->AddLog("New CV Added Successfuly");
                  return "CV Added Successfuly";
              }	
              $this->ObjLog->AddLog("New CV Added Faild");
              return "CV Faild To Add";
      } 

    	public function EditCV($InfoId)
    	{

    		     $aData["Countries"] = DB::table("countries")->get();
             $aData["aLevels"] = DB::table("levels")->get();
             $aData["Skills"] = DB::table("skills")->get();     
             $aData["Degrees"] = DB::table("degrees")->get();     
             $aData["Languages"] = DB::table("languages")->get(); 
        		 $aData["Candidate"] = DB::table("basic_information AS B")->where("B.InfoId",$InfoId)->first();
        		 $aData["Qualification"] = DB::table("qualification AS Q")->where("Q.InfoId",$InfoId)->get();    
             $aData["WorkExperince"] = DB::table("work_experiences AS W")->where("W.InfoId",$InfoId)->get();  
    		     $aData["candidate_skills"] = DB::table("candidate_skills AS CS")->where("CS.InfoId",$InfoId)->get();   
             $aData["candidate_languages"] = DB::table("candidate_languages")->where("InfoId",$InfoId)->get();     
        		 $aData["Referencers"] = DB::table("referencers AS R")->where("R.InfoId",$InfoId)->get();  
        		 return view("CvViews.UpdateCVForm",$aData);
    	}


    	public function UpdateCV(Request $request)
    	{

                    $aBasicInformation = [
                                            "FirstName" =>Input::get('FirstName'),
                                            "LastName" =>Input::get('LastName'),
                                            "FatherName" =>Input::get('FatherName'),
                                            "Surname" =>Input::get('Surname'),
                                            "CNIC" =>Input::get('CNIC'),
                                            "DOB"=>Input::get('DOB'),
                                            "Gander"=>Input::get('Gander'),
                                            "Mobile" =>Input::get('Mobile'),
                                            "EmailAddress" =>Input::get('EmailAddress'),
                                            "HomeAddress" =>Input::get('HomeAddress'),
                                            "NationalityId" =>Input::get('country_id'),
                                            "ProvinceId" =>Input::get('ProvenceId'),
                                            "DistrictId" =>Input::get('DistrictId'),
                                            "TownId" =>Input::get('TalukaId'),
                                            "UcId" =>Input::get('UcId'),
                                            "DomicileId" =>Input::get('DomicileId'),
                                            "MaritalStatus" => Input::get('MaritalStatus'),
                                            "UpdatedOn" => date("Y-m-d H:m:s a"),
                                            "UpdatedBy" => Session::get("UserId")
                                            
                                        ];

                    //------------Getting All New Record For Add for with new updates
                    // Getting New Qualifications In Array
                    $aQualificationNew='';
                    for ($i=0; $i <count(Input::get()) ; $i++) :
                        if(Input::get("Q_DegreeId_New_".$i) AND Input::get("Q_Institute_New_".$i)
                            AND Input::get("Q_Grade_New_".$i) AND Input::get("Q_Year_New_".$i)) :
                            $aQualificationNew[]=["DegreeId" => Input::get("Q_DegreeId_New_".$i),
                                "Institute" => Input::get("Q_Institute_New_".$i),
                                "Grade" => Input::get("Q_Grade_New_".$i),
                                "Year" => Input::get("Q_Year_New_".$i),
                                "InfoId" => $request->InfoId,
                                "UpdatedOn" =>date("Y-m-d H:m:s a"),
                                "AddedOn" =>date("Y-m-d H:m:s a")];
                        endif;
                    endfor;

                    // Getting New Work Experience In Array
                    $aWorkExperienceNew='';
                    for ($i=0; $i <count(Input::get()) ; $i++) :
                        if(Input::get("W_JobTitle_New_".$i) AND Input::get("W_Organization_New_".$i)
                            AND Input::get("W_Designation_New_".$i) AND Input::get("W_StartDate_New_".$i)
                            AND Input::get("W_EndDate_New_".$i)) :

                            $aWorkExperienceNew[]=[ "JobTitle" => Input::get("W_JobTitle_New_".$i),
                                "Organization" => Input::get("W_Organization_New_".$i),
                                "Designation" => Input::get("W_Designation_New_".$i),
                                "StartDate" => Input::get("W_StartDate_New_".$i),
                                "EndDate" => Input::get("W_EndDate_New_".$i),
                                "InfoId" => $request->InfoId,
                                "UpdatedOn" =>date("Y-m-d H:m:s a"),
                                "AddedOn" =>date("Y-m-d H:m:s a")];
                        endif;
                    endfor;

                    // Getting All Candidate Skills In Array
                    $aSkillsNew='';
                    for ($i=0; $i <count(Input::get()) ; $i++) :
                        if(Input::get("SkillId_New_".$i) AND Input::get("skill_Level_New_".$i)) :
                                $aSkillsNew[]=["SkillId" => Input::get("SkillId_New_".$i),
                                            "LevelId" => Input::get("skill_Level_New_".$i),
                                            "InfoId" => $request->InfoId,
                                            "UpdatedOn" =>date("Y-m-d H:m:s a"),
                                            "AddedOn" =>date("Y-m-d H:m:s a")];
                        endif;
                    endfor;

                    //  Getting All Candidate Languages In Array
                    $aLanguagesNew='';
                    for ($i=0; $i <count(Input::get()) ; $i++) :
                        if(Input::get("LanguageId_New_".$i) AND Input::get("speaking_Level_New_".$i)
                            AND Input::get("reading_Level_New_".$i) AND Input::get("writing_Level_New_".$i)) :

                            $aLanguagesNew[]=[ "LanguageId" => Input::get("LanguageId_New_".$i),
                                "Speaking_levelId" => Input::get("speaking_Level_New_".$i),
                                "Reading_levelId" => Input::get("reading_Level_New_".$i),
                                "Writing_levelId" => Input::get("writing_Level_New_".$i),
                                "InfoId" => $request->InfoId,
                                "UpdatedOn" =>date("Y-m-d H:m:s a"),
                                "AddedOn" =>date("Y-m-d H:m:s a")];
                        endif;
                    endfor;

                    // Getting All New Referencers Data In Array
                    $aReferencesNew='';
                    for ($i=0; $i <count(Input::get()) ; $i++) :
                        if(Input::get("R_Name_New_".$i) AND Input::get("R_Organization_New_".$i)
                            AND Input::get("R_Mobile_New_".$i) AND Input::get("R_EmailAddress_New_".$i)) :
                            $aReferencesNew[]=["Name" => Input::get("R_Name_New_".$i),
                                "Organization" => Input::get("R_Organization_New_".$i),
                                "Contact" => Input::get("R_Mobile_New_".$i),
                                "Email" => Input::get("R_EmailAddress_New_".$i),
                                "InfoId" => $request->InfoId,
                                "UpdatedOn" =>date("Y-m-d H:m:s a"),
                                "AddedOn" =>date("Y-m-d H:m:s a")];
                        endif;
                    endfor;

                    //-------------------------------------ends
                    //---------------Getting Record For Update--------
                    // Getting All Candidate Qualifications In Array
                    $aQualification='';
      	          	for ($i=0; $i <count(Input::get()) ; $i++) :
            				if(Input::get("Q_DegreeId_".$i) AND Input::get("Q_Institute_".$i) 
        							AND Input::get("Q_Grade_".$i) AND Input::get("Q_Year_".$i) AND Input::get("QId_".$i)) :

      	      		    		$aQualification[]=["DegreeId" => Input::get("Q_DegreeId_".$i),
      	      				    					 "Institute" => Input::get("Q_Institute_".$i),
      	      				    					 "Grade" => Input::get("Q_Grade_".$i),
      	      				    					 "Year" => Input::get("Q_Year_".$i),
      	      				    					 "QId" => Input::get("QId_".$i)
      	      		    						  ];
            	    		endif;
      	          	endfor;

      	          	// Getting All Candidate Work Experience In Array
      	          	$aWorkExperience='';
        	          	for ($i=0; $i <count(Input::get()) ; $i++) :
              				if(Input::get("W_JobTitle_".$i) AND Input::get("W_Organization_".$i) 
        						  AND Input::get("W_Designation_".$i) AND Input::get("W_StartDate_".$i)
      					    AND Input::get("W_EndDate_".$i) AND Input::get("Wid_".$i)) :

            		    			$aWorkExperience[]=[ "JobTitle" => Input::get("W_JobTitle_".$i),
      	      				    					 "Organization" => Input::get("W_Organization_".$i),
      	      				    					 "Designation" => Input::get("W_Designation_".$i),
      	      				    					 "StartDate" => Input::get("W_StartDate_".$i),
      	      				    				     "EndDate" => Input::get("W_EndDate_".$i),
      	                                     		 "Wid"=>Input::get("Wid_".$i)
      	      		    						    ];
            	    		endif;
      	          	endfor;

                      // Getting All Candidate Skills In Array
      	          	$aSkills='';
        	      		for ($i=0; $i <count(Input::get()) ; $i++) :
          				  	if(Input::get("SkillId_".$i) AND Input::get("skill_Level_".$i) AND Input::get("CSkillId_".$i)) :

        	      		    		$aSkills[]=["SkillId" => Input::get("SkillId_".$i),
        	      		    					"LavelId" => Input::get("skill_Level_".$i),
        	      		    					"CSkillId" => Input::get("CSkillId_".$i)];
          	    			endif;
        	          endfor;

                      //  Getting All Candidate Languages In Array
      	          	$aLanguages='';
      	          	for ($i=0; $i <count(Input::get()) ; $i++) :
              				if(Input::get("LanguageId_".$i) AND Input::get("speaking_Level_".$i) 
          							AND Input::get("reading_Level_".$i) AND Input::get("writing_Level_".$i) 
          							AND Input::get("CLanguageId_".$i)) :

        	      		    		$aLanguages[]=[ "LanguageId" => Input::get("LanguageId_".$i),
        	      			    					"Speaking_levelId" => Input::get("speaking_Level_".$i),
        	      			    					"Reading_levelId" => Input::get("reading_Level_".$i),
        	      			    					"Writing_levelId" => Input::get("writing_Level_".$i),
        	      			    					"CLanguageId" => Input::get("CLanguageId_".$i)
        	      		    					  ];
          	    			endif;
      	          	endfor;

      	          	// Getting Cadidate All Referencers Data In Array
                		$aReferences='';
      	          	for ($i=0; $i <count(Input::get()) ; $i++) :
                				if(Input::get("R_Name_".$i) AND Input::get("R_Organization_".$i) 
              						AND Input::get("R_Mobile_".$i) AND Input::get("R_EmailAddress_".$i)
              						AND Input::get("R_RId_".$i)) :

          	      		    		$aReferences[]=["Name" => Input::get("R_Name_".$i),
          	      			    					"Organization" => Input::get("R_Organization_".$i),
          	      			    					"Contact" => Input::get("R_Mobile_".$i),
          	      			    					"Email" => Input::get("R_EmailAddress_".$i),
          	      			    					"RId" => Input::get("R_RId_".$i)
          	      		    						];
                	    		endif;
      	          	endfor;

    	              if(DB::table("basic_information")->where("InfoId",$request->InfoId)->update($aBasicInformation)) :

                          if(!empty($aQualification)) :
                					    for ($i=0; $i <count($aQualification); $i++) :
          	      				    	DB::table('qualification')->where("Qid",$aQualification[$i]['QId'])
          							        		->update(['DegreeId'=>$aQualification[$i]['DegreeId'],
          	  										"Institute"=>$aQualification[$i]['Institute'],
          	  										"Grade"=>$aQualification[$i]['Grade'],
          	  										"Year"=>$aQualification[$i]['Year'],
          	  										"UpdatedOn"=>date("Y-m-d H:m:s a")]);
          	      			    	endfor;
                          endif;

                          if(!empty($aQualificationNew)) :
                                for ($i=0; $i <count($aQualificationNew); $i++)
                                    DB::table('qualification')->insert($aQualificationNew[$i]);
                          endif;

                          if(!empty($aWorkExperience)) :
                                for ($i=0; $i <count($aWorkExperience); $i++) :
                        						DB::table('work_experiences')->where("Wid",$aWorkExperience[$i]['Wid'])
                  								->update(['JobTitle'=>$aWorkExperience[$i]['JobTitle'],
                    										"Organization"=>$aWorkExperience[$i]['Organization'],
                    										"Designation"=>$aWorkExperience[$i]['Designation'],
                    										"StartDate"=>$aWorkExperience[$i]['StartDate'],
                    										"EndDate"=>$aWorkExperience[$i]['EndDate'],
                    										"UpdatedOn"=>date("Y-m-d H:m:s a")]);
          					             endfor;
                          endif;

                          if(!empty($aWorkExperienceNew)) :
                                for ($i=0; $i <count($aWorkExperienceNew); $i++)
                                    DB::table('work_experiences')->insert($aWorkExperienceNew[$i]);
                          endif;

                          if(!empty($aSkills)) :
              						    for ($i=0; $i <count($aSkills); $i++) :
                    						DB::table('candidate_skills')->where("CSkillId",$aSkills[$i]['CSkillId'])
              								->update(['SkillId'=>$aSkills[$i]['SkillId'],
                										"LevelId"=>$aSkills[$i]['LavelId'],
                										"UpdatedOn"=>date("Y-m-d H:m:s a")]);
          				          	endfor;
                          endif;

                          if(!empty($aSkillsNew)) :
                                for ($i=0; $i <count($aSkillsNew); $i++)
                                    DB::table('candidate_skills')->insert($aSkillsNew[$i]);
                          endif;

                          if(!empty($aLanguages)) :
        	          			    for ($i=0; $i <count($aLanguages); $i++) :
                      						DB::table('candidate_languages')->where("CLanguageId",$aLanguages[$i]['CLanguageId'])
                								->update(['LanguageId'=>$aLanguages[$i]['LanguageId'],
                  										"Speaking_levelId"=>$aLanguages[$i]['Speaking_levelId'],
                  										"Reading_levelId"=>$aLanguages[$i]['Reading_levelId'],
                  										"Writing_levelId"=>$aLanguages[$i]['Writing_levelId'],
                  										"UpdatedOn"=>date("Y-m-d H:m:s a")]);
              				      	endfor;
                          endif;

                          if(!empty($aLanguagesNew)) :
                                for ($i=0; $i <count($aLanguagesNew); $i++)
                                    DB::table('candidate_languages')->insert($aLanguagesNew[$i]);
                          endif;

                          if(!empty($aReferences)) :
        	          			    for ($i=0; $i <count($aReferences); $i++) :
                    						DB::table('referencers')->where("RId",$aReferences[$i]['RId'])
              								->update(['Name'=>$aReferences[$i]['Name'],
              	  									  "Organization"=>$aReferences[$i]['Organization'],
              	  									  "Email"=>$aReferences[$i]['Email'],
              	  									  "Contact"=>$aReferences[$i]['Contact'],
              	  									  "UpdatedOn"=>date("Y-m-d H:m:s a")]);
              				      	endfor;
                          endif;

                          if(!empty($aReferencesNew)) :
                                for ($i=0; $i <count($aReferencesNew); $i++)
                                    DB::table('referencers')->insert($aReferencesNew[$i]);
                          endif;
                           $this->ObjLog->AddLog("CV Updated Successfuly");
          					   return "Data Updated Successfuly";
      			     endif;			
    		           $this->ObjLog->AddLog("CV Updated Faild");
                       return "Data faild to Update";

    	}

    	public function DeleteCV($InfoId)
      {

            $aDeletedInfo=["CV_Title"=>$this->GetBasicInfo($InfoId)->FirstName.''.$this->GetBasicInfo($InfoId)->LastName,
                           "InfoId"=>$InfoId,
                            "DeletedOn"=>date("Y-m-d H:m:s: a"),
                            "DeletedBy" =>Session::get("UserId")]; 
          
            if(DB::table('basic_information')->where("InfoId",$InfoId)->delete()){
                DB::table('candidate_languages')->where("InfoId",$InfoId)->delete();
                    DB::table('candidate_skills')->where("InfoId",$InfoId)->delete();
                        DB::table('qualification')->where("InfoId",$InfoId)->delete();
                            DB::table('referencers')->where("InfoId",$InfoId)->delete();
                              DB::table('work_experiences')->where("InfoId",$InfoId)->delete();
                                  DB::table('deleted_cv')->insert($aDeletedInfo);
                                      $this->ObjLog->AddLog("CV Deleted Successfuly");
                                           return "CV Deleted Successfully";
            }
            else {
              $this->ObjLog->AddLog("CV Fail To Deleted");
              return "CV Faild to Delete ";
            }
      }


      public function DeleteRowItems($RowId,$Colmn,$TableName)
      {
            if(DB::table($TableName)->where($Colmn,$RowId)->delete())
              return "Success";
            else
             return "faild";
      }

      public function GetBasicInfo($InfoId)
      {
          $aBasicInformation = $aData["Candidate"] = DB::table("basic_information")->where("InfoId",$InfoId)->first();
          return $aBasicInformation;
      }


      public function TotalCV()
      {
          return $this->TotalSavedCV() + $this->TotalDeletedCV();
      }

      public function TotalSavedCV()
      {
          return DB::table('basic_information')->where("AddedBy",Session::get('UserId'))->count();
      }

      public function TotalDeletedCV()
      {
         return DB::table('deleted_cv')->where("DeletedBy",Session::get('UserId'))->count();
      }
}
