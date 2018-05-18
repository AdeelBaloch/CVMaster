<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use PDF;
use Dompdf\Dompdf;

class AjaxController extends Controller
{


     	public function GetProvince(Request $request)
       	{
       		$HTML ='<option value="">Select Province</option>';
       		$aProvince = DB::table("province")->where("country_id",$request->Id)->get();
       		if($aProvince->count() > 0) :
    				foreach ($aProvince as $ObjProvince) :
    	   				if($ObjProvince->ProvinceId == $request->ProvinceId )
       					$HTML.='<option Selected value='.$ObjProvince->ProvinceId.'>'.$ObjProvince->province_name.'</option>';
    	   				else
       					$HTML.='<option value='.$ObjProvince->ProvinceId.'>'.$ObjProvince->province_name.'</option>';
    	   			endforeach;
    	   	else :
    	   		 $HTML.='<option value="">No Record Found</option>';
    	   	endif;
       		
       		return $HTML;
    	}

    	public function GetDistrict(Request $request)
     	{
       		$HTML ='<option value="">Select District</option>';
       		$aDistricts = DB::table("districts")->where("ProvinceId",$request->Id)->get();
       		if($aDistricts->count() > 0) :
    				foreach ($aDistricts as $ObjDistrict) :

    					if($ObjDistrict->DistrictId == $request->DistrictId )
    	   			 	$HTML.='<option selected value='.$ObjDistrict->DistrictId.'>'.$ObjDistrict->DistrictName.'</option>';
    	   			 	else
    	   			 	$HTML.='<option value='.$ObjDistrict->DistrictId.'>'.$ObjDistrict->DistrictName.'</option>';	
    	   			endforeach;
    	   	else :
    	   		 $HTML.='<option value="">No Record Found</option>';
    	   	endif;
       		
       		return $HTML;
    	}

  	   public function GetTaluka(Request $request)
     	{
       		$HTML ='<option value="">Select Taluka</option>';
       		$aTaluka = DB::table("taluka")->where("DistrictId",$request->Id)->get();
       		if($aTaluka->count() > 0) :
    				foreach ($aTaluka as $ObjTaluka) :

    					if($ObjTaluka->TownId == $request->TownId )
    	   			 	$HTML.='<option selected value='.$ObjTaluka->TownId.'>'.$ObjTaluka->TownName.'</option>';
    	   			 	else
    	   			 	$HTML.='<option value='.$ObjTaluka->TownId.'>'.$ObjTaluka->TownName.'</option>';

    	   			endforeach;
    	   	else :
    	   		 $HTML.='<option value="">No Record Found</option>';
    	   	endif;
       		
       		return $HTML;
    	}

    	public function GetUC(Request $request)
     	{
       		
       		$HTML ='<option value="">Select UC</option>';
       		$aUC = DB::table("uc")->where("TownId",$request->Id)->get();
       		if($aUC->count() > 0) :
    				foreach ($aUC as $ObjUc) :
    					if($ObjUc->UcId == $request->UcId )
    	   			 	$HTML.='<option selected value='.$ObjUc->UcId.'>'.$ObjUc->UcName.'</option>';
    	   			 	else
    	   			 	$HTML.='<option value='.$ObjUc->UcId.'>'.$ObjUc->UcName.'</option>';

    	   			endforeach;
    	   	else :
    	   		 $HTML.='<option value="">No Record Found</option>';
    	   	endif;
       		
       		return $HTML;
    	}

    	public function GetDomicile(Request $request)
     	{
       		$HTML ='<option value="">Select Domicile</option>';
       		$aDomicile = DB::table("domicile")->get();
       		if($aDomicile->count() > 0) :
    				foreach ($aDomicile as $ObjDomicile) :
    				
    					if($ObjDomicile->DomicileId == $request->DomicileId)
    	   			 	$HTML.='<option selected value='.$ObjDomicile->DomicileId.'>'.$ObjDomicile->Domicile.'</option>';
    	   			 	else
    	   			 	$HTML.='<option value='.$ObjDomicile->DomicileId.'>'.$ObjDomicile->Domicile.'</option>';
    	   			
    	   			endforeach;
    	   	else :
    	   		 $HTML.='<option value="">No Record Found</option>';
    	   	endif;
       		
       		return $HTML;
    	}


}	
