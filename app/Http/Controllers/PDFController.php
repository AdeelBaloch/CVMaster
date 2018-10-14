<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use PDF;
use Dompdf\Dompdf;

class PDFController extends Controller
{
	private $ObjCV;
	private $ObjLog;
	
	public function __construct()
  	{
  		$this->ObjCV = new CvController();
  		$this->ObjLog = new SystemLogController();
  	}	

    public function  GaneratePDF($InfoId)
    {

		    $FileName = $this->ObjCV->GetBasicInfo($InfoId)->FirstName." ".$this->ObjCV->GetBasicInfo($InfoId)->LastName.".PDF";

        $pdf =  PDF::loadHTML($this->ObjCV->ViewCV($InfoId))->setPaper('A4', 'legal')->setWarnings(false)->save($FileName);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->download($FileName);

        $this->ObjLog->AddLog("Ganerated a New CV In PDF File");
    }
}
