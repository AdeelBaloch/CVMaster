        <!-- <div class="container"> -->
              
              <div class="panel panel-default">
                <div class="panel-body">
                  <form action="" method="POST" id="CVForm">
                   {!! csrf_field() !!}
                      <!-- basit information -->
                            <fieldset style="padding: 10px;">
                                  <legend>Personal Informaion</legend>
                                      <table class="CustomTable" align="center">
                                            <tr>
                                              <td>FirstName</td><td><input type="text" required placeholder="First Name" name="FirstName" id="FirstName"  class="CustomFieldCss" value="{{ $Candidate->FirstName }}"></td>
                                              <td>LastName</td><td><input type="text" required placeholder="Last Name" name="LastName" id="LastName"  class="CustomFieldCss"  value="{{ $Candidate->LastName }}"></td>
                                            </tr>
                                            <tr>
                                              <td>Father's Name</td><td><input type="text"  required placeholder="Father's Name" name="FatherName" id="FatherName" class="CustomFieldCss" value="{{ $Candidate->FatherName }}"></td>
                                              <td>Surname</td><td><input type="text" required placeholder="Surname" name="Surname" id="Surname" class="CustomFieldCss" value="{{ $Candidate->Surname }}"></td>
                                             </tr>
                                            <tr>
                                              <td>CNIC</td><td><input type="text" required placeholder="CNIC Number" name="CNIC" id="CNIC"  class=" CustomFieldCss"  value="{{ $Candidate->CNIC }}"></td>
                                            
                                              <td>Date Of Birth</td><td><input type="date" required placeholder="Date Of Birth" name="DOB" id="DOB" class="CustomFieldCss" value="2018-02-22"></td>
                                             
                                            </tr>
                                            <tr>
                                               <td>Mobile Number</td><td><input type="number" required placeholder="Mobile Number" name="Mobile" id="Mobile" class="CustomFieldCss" value="{{ $Candidate->Mobile }}"></td>
                                              <td>Email Address</td><td><input type="email" required placeholder="Email Address" name="EmailAddress" id="EmailAddress"  class="CustomFieldCss" value="{{ $Candidate->EmailAddress }}"></td>
                                              
                                            </tr>
                                           <tr>
                                            <td>Home Address</td><td><input type="text" required placeholder="Home Address" name="HomeAddress" id="HomeAddress" class="CustomFieldCss" value="{{ $Candidate->HomeAddress }}"></td>
                                              <td>Nationality </td><td><select name="country_id" required id="country_id" class=" CustomFieldCss">
                                                  <option value="">Select Country</option>
                                                  @foreach ($Countries as $Countrie)
                                                    @if($Countrie->country_id === $Candidate->NationalityId)
                                                      <option selected value="{{ $Countrie->country_id }}">{{ $Countrie->country_name }}</option>
                                                    @else 
                                                      <option value="{{ $Countrie->country_id }}">{{ $Countrie->country_name }}</option>
                                                    @endif
                                                    
                                                  @endforeach</select></td>
                                              
                                           </tr>
                                            <tr>
                                              <td>Provience</td><td><select name="ProvenceId"  id="ProvenceId" required class=" CustomFieldCss"><option value="">Select Provence</option></select></td>
                                               <td>District</td><td><select name="DistrictId" id="DistrictId" required class=" CustomFieldCss"> <option value="">Select District</option></select></td>
                                              
                                            </tr>
                                            <tr>
                                               <td>Taluka </td><td><select name="TalukaId" id="TalukaId" required class=" CustomFieldCss"><option value="">Select Taluka</option></select></td>
                                               <td>UC </td><td><select name="UcId" id="UcId" class=" required CustomFieldCss"><option value="">Select UC</option></select></td>
                                               
                                            <tr>
                                              <td>Domicile </td><td><select name="DomicileId" id="DomicileId" required class=" CustomFieldCss"><option>Select Domicile</option></select></td>
                                               <td>Marital Status</td><td> <input type="radio" name="MaritalStatus"  <?=(($Candidate->MaritalStatus =="Single")? "Checked" : "");?> value="Single">Single <input type="radio" name="MaritalStatus" value="Married" <?=(($Candidate->MaritalStatus =="Married")? "Checked" : "");?> >Married</td>
                                              
                                            </tr>
                                            <tr>
                                               <td>Gander</td><td><input type="radio" name="Gander" <?=(($Candidate->Gander =="Male")? "Checked" : "");?> value="Male">Male <input type="radio"  name="Gander" <?=(($Candidate->Gander =="Female")? "Checked" : "");?> value="Female">Female </td>
                                               <td></td>
                                                 <input type="hidden" name="InfoId" value="{{ $Candidate->InfoId }}">
                                            </tr>

                                      </table>
                            </fieldset>

                      <!-- Qualification Information -->
                            <fieldset style="padding: 10px;">
                              <legend>Qualification</legend>
                                 <table class="CustomTable" align="center" id="QualificationTable">

                                          <?php $b=0; ?>
                                          @foreach($Qualification as $ObjQ)
                                              <tr>
                                                  <td><select name="Q_DegreeId_0" id="Q_DegreeId_0" class="CustomFieldCss">
                                                      <option value="">Select Degree</option>
                                                        @foreach($Degrees as $ObjDegree)
                                                           @if($ObjDegree->DegreeId == $ObjQ->DegreeId) 
                                                            <option selected value="{{ $ObjDegree->DegreeId }}">{{ $ObjDegree->Degree }}</option>
                                                           @else
                                                            <option value="{{ $ObjDegree->DegreeId }}">{{ $ObjDegree->Degree }}</option>
                                                           @endif
                                                        @endforeach
                                                    </select></td>
                                                  <td><input type="text" value="{{ $ObjQ->Institute }}" placeholder="Institute" name="Q_Institute_{{ $b}}" id="Q_Institute_{{ $b }}"  class="CustomFieldCss"></td>
                                                  <td><input type="text" value="{{ $ObjQ->Grade }}" placeholder="Grade / GPA " name="Q_Grade_{{ $b }}" id="Q_Grade_{{ $b }}"  class="CustomFieldCss"></td>
                                                  <td>
                                                    <select name="Q_Year_{{$b}}" class="CustomFieldCss">
                                                      <option value="">Select Year</option>
                                                        @for($a=2000;$a<=2020;$a++)
                                                            @if($a == $ObjQ->Year)
                                                            <option selected value="{{$a}}">{{$a}}</option>
                                                            @else
                                                            <option value="{{$a}}">{{$a}}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                  </td>
                                                
                                                <td><a href="javascript:void(0);" class="pull-right" onclick="DeleteRowItems('{{ $ObjQ->Qid }}','Qid','qualification')"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                              </tr>
                                               <input type="hidden" name="QId_{{$b}}" value="{{ $ObjQ->Qid }}">
                                             <?php $b++; ?>

                                          @endforeach  

                                  </table>
                                    <a href="javascript:void(0);" class="pull-right" onclick="AddQualificationRow()"><span class="fa fa-plus"></span></a>
                             </fieldset>
                      
                      <!-- Work Experience Information -->
                        <fieldset style="padding: 10px;">
                              <legend>Work Experience</legend>
                                 <table class="CustomTable" align="center" id="WorkExperienceTable">
                                         <?php $b=0; ?>
                                          @foreach($WorkExperince as $ObjExperince)
                                            <tr>
                                                <td><input type="text" value="{{ $ObjExperince->JobTitle }}" placeholder="Job Title" name="W_JobTitle_{{$b}}" id="W_JobTitle_{{$b}}"  class="CustomFieldCss"></td>
                                                <td><input type="text" value="{{ $ObjExperince->Organization }}" placeholder="Organization" name="W_Organization_{{$b}}" id="W_Organization_{{$b}}"  class="CustomFieldCss"></td>
                                                <td><input type="text" value="{{ $ObjExperince->Designation }}" placeholder="Designation" name="W_Designation_{{$b}}" id="W_Designation_{{$b}}"  class="CustomFieldCss"></td>
                                                <td><input type="date" value="{{ $ObjExperince->StartDate }}" name="W_StartDate_{{$b}}" id="W_StartDate_{{$b}}"  class="CustomFieldCss"></td>
                                                <td>To</td>
                                                <td><input type="date" value="{{ $ObjExperince->EndDate }}"  name="W_EndDate_{{$b}}" id="W_EndDate_{{$b}}"  class="CustomFieldCss"></td>
                                                <td><a href="javascript:void(0);" class="pull-right" onclick="DeleteRowItems('{{ $ObjExperince->Wid }}','Wid','work_experiences')"><i class="fa fa-times" aria-hidden="true"></i></a></td> 
                                            </tr>
                                              <input type="hidden" name="Wid_{{$b}}" value="{{ $ObjExperince->Wid }}">
                                             <?php $b++; ?>
                                         @endforeach  
                                  </table> 
                                  <a href="javascript:void(0);" class="pull-right" onclick="AddWorkExperienceRow()"><span class="fa fa-plus"></a>
                             </fieldset>   
                
                      <!-- Skills Information-->
                           <fieldset style="padding: 10px;">
                              <legend>Skills</legend>
                                 <table class="CustomTable" align="center" id="SkillsTable">
                                  <?php $b=0; ?>
                                  @foreach($candidate_skills as $ObjCandidateSkill)
                                      <tr>
                                         <td>
                                          <select name="SkillId_{{$b}}" id="SkillId_{{$b}}" class=" CustomFieldCss">
                                              <option value="">Select Skill</option>
                                                @foreach ($Skills as $ObjSkills)

                                                  @if($ObjSkills->SkillId == $ObjCandidateSkill->SkillId)
                                                  <option selected value="{{ $ObjSkills->SkillId }}">{{ $ObjSkills->Skill_Name }}</option>
                                                  @else
                                                  <option value="{{ $ObjSkills->SkillId }}">{{ $ObjSkills->Skill_Name }}</option>
                                                  @endif

                                                @endforeach</select>
                                        </td>
                                        <td><select name="skill_Level_{{$b}}" id="skill_Level_{{$b}}" class=" CustomFieldCss">
                                                      <option value="">Skill Lavel</option>
                                                      @foreach ($aLevels as $ObjLevel)
                                                        
                                                        @if($ObjLevel->LevelId === $ObjCandidateSkill->LevelId)
                                                         <option selected value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                        @else
                                                          <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                        @endif;
                                                      @endforeach</select>
                                        </td>
                                        <td><a href="javascript:void(0);" class="pull-right" onclick="DeleteRowItems('{{ $ObjCandidateSkill->CSkillId }}','CSkillId','candidate_skills')"><i class="fa fa-times" aria-hidden="true"></i></a></td> 
                                      </tr>
                                       <input type="hidden" name="CSkillId_{{$b}}" value="{{ $ObjCandidateSkill->CSkillId }}">
                                   <?php $b++; ?>
                                   @endforeach  
                                  </table> 
                                   <a href="javascript:void(0);" class="pull-right" onclick="AddSkillRow()"><span class="fa fa-plus"></a>
                             </fieldset> 

                     <!-- Languages Information-->
                           <fieldset style="padding: 10px;">
                              <legend>Languages</legend>
                                 <table class="CustomTable" align="center" id="LanguagesTable">
                                
                                    <?php $b=0; ?>
                                   @foreach($candidate_languages as $ObjCandidateLanguage)
                                         <tr>
                                            <td><select name="LanguageId_{{$b}}" id="LanguageId_{{$b}}" class="CustomFieldCss">
                                                <option value="">Select Language</option>
                                                 @foreach($Languages as $ObjLanguage)
                                                    @if($ObjLanguage->LanguageId == $ObjCandidateLanguage->LanguageId)
                                                      <option selected value="{{ $ObjLanguage->LanguageId }}">{{ $ObjLanguage->Language }}</option>
                                                    @else
                                                      <option value="{{ $ObjLanguage->LanguageId }}">{{ $ObjLanguage->Language }}</option>
                                                    @endif  
                                                @endforeach </select></td>
                                            <td><select name="speaking_Level_{{$b}}" id="speaking_Level_{{$b}}" class=" CustomFieldCss">
                                                <option value="">Speaking Lavel</option>
                                                @foreach ($aLevels as $ObjLevel)
                                                    @if($ObjLevel->LevelId === $ObjCandidateLanguage->Speaking_levelId)
                                                      <option selected value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                    @else
                                                      <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                    @endif 
                                                @endforeach</select></td>
                                            <td><select name="reading_Level_{{$b}}" id="reading_Level_{{$b}}" class=" CustomFieldCss">
                                                          <option value="">Reading Lavel</option>
                                                            @foreach ($aLevels as $ObjLevel)
                                                              @if($ObjLevel->LevelId === $ObjCandidateLanguage->Reading_levelId)
                                                              <option selected value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                              @else
                                                              <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                              @endif  
                                                            @endforeach</select>
                                            </td>
                                            <td><select name="writing_Level_{{$b}}" id="writing_Level_{{$b}}" class=" CustomFieldCss">
                                                          <option value="">Writing Lavel</option>
                                                           @foreach ($aLevels as $ObjLevel)
                                                              @if($ObjLevel->LevelId === $ObjCandidateLanguage->Writing_levelId)
                                                                <option selected value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                              @else
                                                                <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                              @endif  
                                                          @endforeach</select></td>
                                             <td><a href="javascript:void(0);" class="pull-right" onclick="DeleteRowItems('{{ $ObjCandidateLanguage->CLanguageId }}','CLanguageId','candidate_languages')"><i class="fa fa-times" aria-hidden="true"></i></a></td> 
                                            <input type="hidden" name="CLanguageId_{{$b}}" value="{{ $ObjCandidateLanguage->CLanguageId }}">
                                          </tr>
                                           
                                    <?php $b++; ?> 
                                   @endforeach 
                                  </table> 
                                    <a href="javascript:void(0);" class="pull-right" onclick="AddLanguagesRow()"><span class="fa fa-plus"></a>
                             </fieldset> 

                      <!--References Contacts Information  -->
                         <fieldset style="padding: 10px;">
                              <legend>References Contact</legend>
                                 <table class="CustomTable" align="center" id="ReferencesTable">
                                   <?php $b=0; ?>
                                  @foreach($Referencers as $ObjReferencer)
                                     <tr>
                                        <td><input type="text" placeholder="First Name" value="{{ $ObjReferencer->Name }}" name="R_Name_{{$b}}" id="R_Name_{{$b}}"  class="CustomFieldCss"></td>
                                        <td><input type="text" placeholder="Organization Name" value="{{ $ObjReferencer->Organization }}" name="R_Organization_{{$b}}" id="R_Organization_{{$b}}"  class="CustomFieldCss"></td>
                                        <td><input type="number" placeholder="Mobile Number" value="{{ $ObjReferencer->Contact }}" name="R_Mobile_{{$b}}" id="R_Mobile_{{$b}}"  class="CustomFieldCss"></td>
                                        <td><input type="email" placeholder="Email Address" value="{{ $ObjReferencer->Email }}" name="R_EmailAddress_{{$b}}" id="R_EmailAddress_{{$b}}"  class="CustomFieldCss"></td>
                                         <input type="hidden" name="R_RId_{{$b}}" value="{{ $ObjReferencer->RId }}" > 
                                        <td><a href="javascript:void(0);" class="pull-right" onclick="DeleteRowItems('{{ $ObjReferencer->RId }}','RId','referencers')"><i class="fa fa-times" aria-hidden="true"></i></a></td> 
                                      </tr>
                                        
                                      <?php $b++; ?>                            
                                  @endforeach  
                              </table> 
                                  <a href="javascript:void(0);" class="pull-right" onclick="AddReferenceRow()"><span class="fa fa-plus"></a>
                             </fieldset>      
                  <input type="submit" value="Update CV" class="btn btn-default pull-right">
                </form>
                 </div>
              </div>
    <!-- </div> -->


    <?php
      $UcJson=json_encode(["Id"=>$Candidate->TownId,"UcId"=>$Candidate->UcId]);
      $TalukaJson=json_encode(["Id"=>$Candidate->DistrictId,"TownId"=>$Candidate->TownId]);
      $DistrictJson=json_encode(["Id"=>$Candidate->ProvinceId,"DistrictId"=>$Candidate->DistrictId]);
      $ProvinceJson=json_encode(["Id"=>$Candidate->NationalityId,"ProvinceId"=>$Candidate->ProvinceId]);
    ?>
    <script type="text/javascript">
       
      
           var value=0;
           var UcJson = "{{ $UcJson }}";
           var TalukaJson = "{{ $TalukaJson }}";
           var DistrictJson = "{{ $DistrictJson }}";
           var ProvinceJson = "{{ $ProvinceJson }}";

           function AddReferenceRow(){
             value++;
              var Row='<tr><td><input type="text" placeholder="First Name" name="R_Name_New_'+value+'" id="R_Name_New_'+value+'"  class="CustomFieldCss"></td>';
                  Row +='<td><input type="text" placeholder="Organization Name" name="R_Organization_New_'+value+'" id="R_Organization_New_'+value+'"  class="CustomFieldCss"></td>';
                  Row +='<td><input type="number" placeholder="Mobile Number" name="R_Mobile_New_'+value+'" id="R_Mobile_New_'+value+'"  class="CustomFieldCss"  style="width: 160px;"></td>';
                  Row +='<td><input type="email" placeholder="Email Address" name="R_EmailAddress_New_'+value+'" id="R_EmailAddress_New_'+value+'"  class="CustomFieldCss"></td></tr>';
               $("#ReferencesTable").append(Row);
           }

            function AddSkillRow(){
             value++;
              var Row='<tr>'; 
                  Row+='<td><select name="SkillId_New_'+value+'" id="SkillId_New_'+value+'" class=" CustomFieldCss"> <option value="">Select Skill</option>';
                  Row+='@foreach ($Skills as $ObjSkills) <option value="{{ $ObjSkills->SkillId }}">{{ $ObjSkills->Skill_Name }}</option> @endforeach</select></td>';
                  Row+='<td><select name="skill_Level_New_'+value+'" id="skill_Level_New_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Skill Lavel</option>';
                  Row+='@foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select>';
                  Row+='</td></tr>';
               $("#SkillsTable").append(Row);
           }

           function AddLanguagesRow() {
             value++;
              var Row='<tr><td><select name="LanguageId_New_'+value+'" id="LanguageId_New_'+value+'" class="CustomFieldCss" style="width:161px;"><option value="">Select Language</option>';
                  Row+='@foreach($Languages as $ObjLanguage)  <option value="{{ $ObjLanguage->LanguageId }}">{{ $ObjLanguage->Language }}</option> @endforeach </select></td>';
                  Row+='<td><select name="speaking_Level_New_'+value+'" id="speaking_Level_New_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Speaking Lavel</option> @foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select></td>';
                  Row+='<td><select name="reading_Level_New_'+value+'" id="reading_Level_New_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Reading Lavel</option> @foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select></td>';
                  Row+='<td><select name="writing_Level_New_'+value+'" id="writing_Level_New_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Writing Lavel</option>@foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select></td></tr>';
               $("#LanguagesTable").append(Row);
           }

            function AddWorkExperienceRow() {
             value++;
              var Row='<tr><td><input type="text" placeholder="Job Title" name="W_JobTitle_New_'+value+'" id="W_JobTitle_New_'+value+'"  class="CustomFieldCss" style="width: 210px;"></td>';
                  Row+='<td><input type="text" placeholder="Organization" name="W_Organization_New_'+value+'" id="W_Organization_New_'+value+'"  class="CustomFieldCss"  style="width: 210px;"></td>';
                  Row+='<td><input type="text" placeholder="Designation" name="W_Designation_New_'+value+'" id="W_Designation_New_'+value+'"  class="CustomFieldCss"  style="width: 200px;"></td>';
                  Row+='<td><input type="date" name="W_StartDate_New_'+value+'" id="W_StartDate_New_'+value+'"  class="CustomFieldCss"  style="width: 200px;"></td>';
                  Row+='<td>To</td><td><input type="date" name="W_EndDate_New_'+value+'" id="W_EndDate_New_'+value+'"  class="CustomFieldCss"  style="width: 210px;"></td></tr>';
               $("#WorkExperienceTable").append(Row);
           }

            function AddQualificationRow() {
             value++;
               var Row='<tr><td><select name="Q_DegreeId_New_'+value+'" id="Q_DegreeId_New_'+value+'" class="CustomFieldCss"><option value="">Select Degree</option> ';
                   Row+='@foreach($Degrees as $ObjDegree) <option value="{{ $ObjDegree->DegreeId }}"> {{ $ObjDegree->Degree }}</option> @endforeach </select></td>';
                   Row+='<td><input type="text" placeholder="Institute" name="Q_Institute_New_'+value+'" id="Q_Institute_New_'+value+'"  class="CustomFieldCss"></td>';
                   Row+='<td><input type="text" placeholder="Grade / GPA " name="Q_Grade_New_'+value+'" id="Q_Grade_New_'+value+'"  class="CustomFieldCss"   style="width: 160px;"></td>';
                   Row+='<td><select name="Q_Year_New_'+value+'" id="Q_Year_New_'+value+'" class="CustomFieldCss">  <option>Select Year</option>  @for($a=2000;$a<=2020;$a++) <option value="{{$a}}">{{$a}}</option> @endfor </select> </td></tr>';
                   $("#QualificationTable").append(Row);
           }

           
         
            AjaxRequest("#ProvenceId","{{ route('GetProvince') }}",JSON.parse(ProvinceJson.replace(/&quot;/g,'"')));
            AjaxRequest("#DistrictId","{{ route('GetDistrict') }}",JSON.parse(DistrictJson.replace(/&quot;/g,'"')));
            AjaxRequest("#TalukaId","{{ route('GetTaluka') }}",JSON.parse(TalukaJson.replace(/&quot;/g,'"')));
            AjaxRequest("#UcId","{{ route('GetUC') }}",JSON.parse(UcJson.replace(/&quot;/g,'"')));
            AjaxRequest("#DomicileId","{{ route('GetDomicile') }}","DomicileId={{ $Candidate->DomicileId }}");
            
            function AjaxRequest(ResponseId,url,data='') 
             {
                 $.ajax({
                    type: 'GET',
                    url: url,
                    data:data,
                    success:function(data){
                      $(ResponseId).html(data);
                    }
                  });
              }

           function DeleteRow(RowId,url,data='')
           {
               $.ajax({
                   type: 'GET',
                   url: url,
                   data:data,
                   success:function(data){
                       $(ResponseId).html(data);
                   }
               });
           }
        
            function DeleteRowItems(RowId,Colmn,TableName) 
           {
                 var Url = "{{ route('DeleteRowItems') }}"+'/'+RowId+'/'+Colmn+'/'+TableName;
                  $.ajax({
                      type: 'GET',
                      url: Url,
                      success:function(data){
                           AjaxPage("{{ route("EditCV") }}"+'/'+"{{ $Candidate->InfoId }}");
                      }
                  });
           }

            $("#CVForm").on("submit",function(e){
                e.preventDefault();
                var FormData = $(this).serialize();

                  $.ajax({
                      type: 'POST',
                      url: "{{ route('UpdateCV') }}",
                      data:FormData,
                      success:function(data){
                        swal("", "Data Updated Successfuly", "success");
                        AjaxPage("{{ route("CVShowGrid") }}");
                      }
                  });
            });
         

    </script>
