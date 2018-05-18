<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
 <style type="text/css">
     th{text-align:left;}
     td{border-top: none;}
 </style>
     <link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/bootstrap.min.css') }}" />
    <style type="text/css">
    @media print
    {
    body * { visibility: hidden; }
    .div2 * { visibility: visible; }
    .div2 { position: absolute; top: 40px; left: 30px; }
    }
    </style>
</head>
<body>
    <a href="{{ route('GaneratePdf').'/'.$Candidate->InfoId }}" id="DownloadPdfId" class="btn btn-default pull-right">Download Pdf File</a>
<button id="PrintReportId" onclick="window.print();" class="btn btn-default pull-right">Ganerate Print File</button>
<br><br><br><br><br><br>


    <table cellspacing="10" cellpadding="10" width="100%" align="center" class="table" id="CVTable">
        
            <tr style="text-align: center;">
                <td colspan="2" style="border-bottom: 2px solid;border-top: none;">
                    <h1 style="margin-bottom: -20px;">{{ $Candidate->Name }}</h1><br>
                <p><span><b>Address </b>{{ $Candidate->HomeAddress }} • {{ $Candidate->DistrictName }} • {{ $Candidate->province }}</span><br>
                    <span><b>CELL</b> {{ $Candidate->Mobile }}  <b>• E-MAIL </b> {{ $Candidate->EmailAddress }}  </span></p>
                </td>
            </tr>

            <tr>
                <td valign="top" style=" border-right: 1px solid;"><h4 style="text-align: right;">OBJECTIVE</h4></td>
                <td>
                    <p style="text-align: justify;  width: 100%">To work in dynamic environment where innovation & growth are encouraged and my professional skills & abilities can be efficiently applied and groomed</p>
                </td>
            </tr>

             @if(count($Qualification) > 0 )
                    <tr>
                        <td valign="top" style="border-right: 1px solid;"><h4 style="text-align: right;">QUALIFICATIONS</h4></td>
                        <td>
                           <table class="table">
                                @foreach($Qualification as $ObjQualification)
                                    <tr>
                                        <td style="border-top: none;">
                                            <p><b>{{ $ObjQualification->Degree.' - '.$ObjQualification->Year }}</b><br>
                                            {{ $ObjQualification->Institute }} <br><b>{{ $ObjQualification->Grade }}</b></p></td>
                                    </tr>
                                @endforeach()
                            </table>
                        </td>
                    </tr>
             @endif


             @if(count($Skills) > 0 )
                    <tr>
                        <td valign="top" style="border-right: 1px solid;"><h4 style="text-align: right;">SKILLS</h4></td>
                        <td>
                            <table class="table" style="width: 50%;">
                                @foreach($Skills as $ObjSkill)
                                    <tr style="height: 20px;"><td style="border-top: none;"><p><b>{{ $ObjSkill->Skill_Name }}</b><br>{{ $ObjSkill->Level }}</p></td></tr>
                                @endforeach()
                            </table>
                        </td>
                    </tr>
             @endif


      `        @if(count($WorkExperince) > 0 )
                        <tr>
                            <td valign="top" style=" border-right: 1px solid;"><h4 style="text-align: right;">WORK EXPERINCE</h4></td>
                            <td> 
                               <table class="table">
                                    @foreach($WorkExperince as $ObjExperince)
                                        <tr>
                                            <td style="border-top: none; width: 250px;">
                                                <p><b>{{ $ObjExperince->JobTitle }}</b><br>
                                                {{ $ObjExperince->Organization }}</p></td>
                                            <td style="border-top: none;"><b>From :</b>{{ $ObjExperince->StartDate }}<br><b>End</b> {{ $ObjExperince->EndDate }}</td>
                                        </tr>
                                    @endforeach()
                                </table>
                            </td>
                        </tr>
              @endif

             <tr>
                    <td valign="top" style=" border-right: 1px solid;"><h4 style="text-align: right;">PERSONAL INFO</h4></td>
                     <td>
                          <table style="width: 50%;" class="table">
                            <tr>
                                <th style="width: 250px;border-top: none;">Father's Name</th>
                                <td style="text-align: :webkit-left;border-top: none;">{{ $Candidate->FatherName }}</td>
                            </tr>
                            <tr>
                                <th style="width: 250px;border-top: none;">Date of Birth</th>
                                <td style="text-align: :webkit-left;border-top: none;">{{ $Candidate->DOB }}</td>
                            </tr>
                            <tr>
                                <th style="width: 250px;border-top: none;border-top: none;">CNIC No.</th>
                                <td style="text-align: :webkit-left;border-top: none;">{{ $Candidate->CNIC }}</td>
                            </tr>
                            <tr>
                                <th style=" width: 250px;border-top: none;">Domicile</th>
                                <td style="text-align: :webkit-left;border-top: none;">{{ $Candidate->Domicile }}</td>
                            </tr>
                            <tr>
                                <th style="width: 250px;border-top: none;">Marital Status</th>
                                <td style="text-align: :webkit-left;border-top: none;">{{ $Candidate->MaritalStatus }}</td>
                            </tr>
                        </table>  
                    </td>
             </tr>
      
             <!-- <tr><td colspan="2"><hr></td></tr> -->
      
              @if(count($Languages) > 0 )
                    <tr>
                        <td style=" border-right: 1px solid;"><h4 style="text-align: right;">LANGUAGES</h4></td>
                        <td>
                            <table class="table" style="width:50%;">
                                @foreach($Languages AS $ObjLanguage)
                                    <tr>
                                        <th colspan="2" style="border-top: none;"> {{ $ObjLanguage->Language }}</th>
                                    </tr>
                                    <tr>
                                        <td style="border-top: none;width: 250px;">Speaking</td>
                                        <td style="border-top: none; text-align: :webkit-left;">{{ $ObjLanguage->SpeakingLavel }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: none;">Writing</td>
                                        <td style="border-top: none; text-align: :webkit-left;">{{ $ObjLanguage->WritingLevel }}</td>
                                    </tr>
                                    <tr>
                                        <td style="border-top: none;">Reading</td>
                                        <td style="border-top: none; text-align: :webkit-left;">{{ $ObjLanguage->ReadingLevel }}</td>
                                    </tr>
                                    <tr><td colspan="2" style="border-top: none;"></td></tr>
                                @endforeach()
                            </table>
                        </td>
                    </tr>
              @endif

              @if(count($Referencers) > 0 )
                    <tr>
                        <td valign="top" style=" border-right: 1px solid;"><h4 style="text-align: right;">REFERENCES</h4></td>
                        <td>
                            <table class="table" style="width: 50%;">
                                @foreach($Referencers AS $ObjReferencer)
                                    <tr>
                                        <td style="border-top: none;">
                                            <p><b>{{ $ObjReferencer->Name }}</b><br>
                                            {{ $ObjReferencer->Contact }} <br>{{ $ObjReferencer->Email }}</p></td>
                                    </tr>
                                @endforeach()
                            </table>
                        </td>
                    </tr>
              @endif

    </table>
    <footer>
        <table class="table text-center">
            <tfoot>
                    <tr><td class="text-left">Copyright © 2018 Designer.baloch2015@gmail.com All Rights Reserved</td>
                    <td  class="text-right"><p>Developed By - <a href="https://www.facebook.com/Iam.AdeelAhmedBaloch" target="_blank">Adeel Ahmed</a></p></td></tr>
            </tfoot>
        </table>
    </footer>


  <script src="{{ asset('public/js/jquery-3.3.1.js') }}"></script>

<script> 
    $("#PrintReportId").on("click",function(){
        onclick="window.print();" 
        window.print();
    });
</script>

</body>
</html>