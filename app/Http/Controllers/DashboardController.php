<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   
   private $ObjCV;
   public function __construct()
   {
   		$this->ObjCV =new CvController();
   }
   public function index()
   {
   		$aData['TotalCv'] = $this->ObjCV->TotalCV();
   		$aData['TotalSavedCv'] = $this->ObjCV->TotalSavedCV();
   		$aData['TotalDeletedCv'] = $this->ObjCV->TotalDeletedCV();
   		return view("DashboardViews/DashboardGraphs",$aData);
   }
}
