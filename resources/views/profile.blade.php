<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<style>
    <?php include(public_path().'/css/bootstrap.css');?>
</style>
<style  media="all">
          th{text-align:left;}

          </style>
           <link rel="stylesheet"  media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <a href="{{ route('GaneratePdf').'/'.$Candidate->InfoId }}" id="DownloadPdfId" class="btn btn-default pull-right">Download Pdf File</a>
        <button id="PrintReportId" class="btn btn-default pull-right">Ganerate Print File</button>
             <br><br><br>
          <div class="container-fluid">
               

                <div class="container" id="CVView" style="border: 1px solid;">
                    <br><br><br>
                    <div class="row"  style="text-align: -webkit-center;">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                          <h1 style="margin-bottom: -20px;">{{ $Candidate->Name }}</h1><br>
                          <p><span><b>Address </b>{{ $Candidate->HomeAddress }} • {{ $Candidate->DistrictName }} • {{ $Candidate->province }}</span><br>
                          <span><b>CELL</b> {{ $Candidate->Mobile }}  <b>• E-MAIL </b> {{ $Candidate->EmailAddress }}  </span></p>
                        </div>
                   
                    </div>

                    <hr>
                    <div class="row"  style="text-align: -webkit-right;height: 72px;">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"  style="text-align: -webkit-left;">
                          <h4 style="margin-bottom: -20px;">OBJECTIVE</h4><br>
                          
                        </div>
                        <div class="col-sm-8" style="text-align:-webkit-right;width:125%;margin-top:-30px;">
                           <table class="table" style="width: 80%; border-top: none;">
                                <tr>
                                  <td style="border-top: none;"><p style="text-align: justify;  width: 66%">To work in dynamic environment where innovation & growth are encouraged and my 
                                                  professional skills & abilities can be efficiently applied and groomed</p></td>
                                </tr>
                             </table>
                            
                        </div>
                    </div>
                    
                    @if(count($Qualification) > 0 )  
                      <hr>
                      <div class="row">
                          <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"  style="text-align: -webkit-left;">
                            <h4 style="margin-bottom: -20px;">QUALIFICATIONS</h4><br>
                          </div>
                          <div class="col-sm-8" style="text-align:-webkit-right;width:125%;margin-top:-30px;">
                            <table class="table" style="width: 80%;">
                                @foreach($Qualification as $ObjQualification)
                                  <tr>
                                    <td style="border-top: none;"><b>{{ $ObjQualification->Degree.' - '.$ObjQualification->Year }}</b><br>
                                        <p>{{ $ObjQualification->Institute }} <br><b>{{ $ObjQualification->Grade }}</b></p></td>
                                  </tr>
                               @endforeach()   
                             </table>
                          </div>
                      </div>
                    @endif

                    @if(count($Skills) > 0 )
                      <hr>
                      <div class="row"  style="text-align: -webkit-right;">
                          <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"  style="text-align: -webkit-left;">
                            <h4 style="margin-bottom: -20px;">SKILLS</h4><br>
                            
                          </div>
                          <div class="col-sm-8" style="text-align:-webkit-right;width:125%;margin-top:-30px;">
                                <table class="table" style="width: 80%;">
                                    @foreach($Skills as $ObjSkill)
                                       <tr><td style="border-top: none;"><b>{{ $ObjSkill->Skill_Name }}</b><br> <p>{{ $ObjSkill->Level }}</p></td></td></tr>
                                    @endforeach()
                              </table>
                          </div>
                      </div>
                    @endif

                    @if(count($WorkExperince) > 0 )
                      <hr>
                      <div class="row" style="text-align: -webkit-right;">
                          <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"  style="text-align: -webkit-left;">
                            <h4 style="margin-bottom: -20px;">WORK EXPERINCE</h4><br>
                          </div>
                         <div class="col-sm-8" style="text-align:-webkit-right;width:125%;margin-top:-30px;">
                               <table class="table" style="width: 80%;">
                                 @foreach($WorkExperince as $ObjExperince)
                                    <tr>
                                    <td style="border-top: none;"><b>{{ $ObjExperince->JobTitle }}</b><br>
                                        <p>{{ $ObjExperince->Organization }}</p></td>
                                      <td style="border-top: none;">{{ $ObjExperince->StartDate }} To {{ $ObjExperince->EndDate }}</td>
                                  </tr>
                                 @endforeach()
                               </table>
                          </div>
                      </div>
                    @endif  

                    @if(count($Candidate) > 0 )
                      <hr>
                      <div class="row" style="text-align: -webkit-right;">
                          <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"  style="text-align: -webkit-left;">
                            <h4 style="margin-bottom: -20px;">PERSONAL INFO</h4><br>
                            
                          </div>
                          <div class="col-sm-8" style="text-align:-webkit-right;width:125%;margin-top:-30px;">
                               <table class="table" style="width: 80%;">
                                  <tr>
                                    <th style="border-top: none;">Father's Name</th>
                                    <td style="border-top: none; text-align: :webkit-left;">{{ $Candidate->FatherName }}</td>
                                  </tr>
                                   <tr>
                                    <th style="border-top: none;">Date of Birth</th>
                                    <td style="border-top: none; text-align: :webkit-left;">{{ $Candidate->DOB }}</td>
                                  </tr>
                                   <tr>
                                    <th style="border-top: none;">CNIC No.</th>
                                    <td style="border-top: none; text-align: :webkit-left;">{{ $Candidate->CNIC }}</td>
                                  </tr>
                                   <tr>
                                    <th style="border-top: none;">Domicile</th>
                                    <td style="border-top: none; text-align: :webkit-left;">{{ $Candidate->Domicile }}</td>
                                  </tr>
                                   <tr>
                                    <th style="border-top: none;">Marital Status</th>
                                    <td style="border-top: none; text-align: :webkit-left;">{{ $Candidate->MaritalStatus }}</td>
                                  </tr>
                               </table>
                          </div>
                      </div>
                    @endif

                    @if(count($Languages) > 0 )
                     <hr>
                      <div class="row" style="text-align: -webkit-right;">
                       <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"  style="text-align: -webkit-left;">
                          <h4 style="margin-bottom: -20px;">LANGUAGES</h4><br>
                          
                        </div>
                        <div class="col-sm-8" style="text-align:-webkit-right;width:125%;margin-top:-30px;">
                             <table class="" style="width: 80%;">
                              @foreach($Languages AS $ObjLanguage)
                                <tr><td colspan="2" style="border-top: none;"><b>{{ $ObjLanguage->Language }}</b></td></tr>
                                <tr><td style="border-top: none;">Speaking</td><td style="border-top: none; text-align: :webkit-left;">{{ $ObjLanguage->SpeakingLavel }}</td></tr>
                                <tr><td style="border-top: none;">Writing</td><td style="border-top: none; text-align: :webkit-left;">{{ $ObjLanguage->WritingLevel }}</td></tr>
                                <tr><td style="border-top: none;">Reading</td><td style="border-top: none; text-align: :webkit-left;">{{ $ObjLanguage->ReadingLevel }}</td></tr>
                                <tr><td colspan="2" style="border-top: none;"></td></tr>
                                <tr><td colspan="2" style="border-top: none;"><br></td></tr>
                              @endforeach()
                             </table>
                        </div>
                      </div>
                    @endif
                 

                    @if(count($Referencers) > 0 )
                     <hr>
                     <div class="row" style="text-align: -webkit-right;">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4"  style="text-align: -webkit-left;">
                          <h4 style="margin-bottom: -20px;">REFERENCES</h4><br>
                          
                        </div>
                        <div class="col-sm-8" style="text-align:-webkit-right;width:125%;margin-top:-30px;">
                             <table class="table" style="width: 80%;">
                              @foreach($Referencers AS $ObjReferencer)
                                <tr>
                                    <td style="border-top: none;"><b>{{ $ObjReferencer->Name }}</b><br>
                                        <p>{{ $ObjReferencer->Contact }} <br>{{ $ObjReferencer->Email }}</p></td>
                                </tr>
                              @endforeach()
                             </table>
                        </div>
                        </div>
                    @endif
            
               </div>
          </div>

           <script> $("#PrintReportId").on("click",function(){  
          
          window.print(); 
         }); </script>