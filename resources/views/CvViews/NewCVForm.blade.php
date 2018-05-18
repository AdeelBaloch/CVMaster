


<div class="banner"><h2><a href="#">Curriculum vitae</a><i class="fa fa-angle-right"></i><span>Add New</span></h2></div>
<div class="typo-grid">
<div class="typo-1">
<div class="grid_3 grid_4">
              <form action="" method="POST" id="CVForm">
                   {!! csrf_field() !!}
                      <!-- basit information -->
                            <fieldset style="padding: 10px;">
                                  <legend>Personal Informaion</legend>
                                      <table class="CustomTable" align="center">
                                            <tr>
                                              <td>FirstName</td><td><input type="text" required placeholder="First Name" name="FirstName" id="FirstName"  class="CustomFieldCss"></td>
                                              <td>LastName</td><td><input type="text" required placeholder="Last Name" name="LastName" id="LastName"  class="CustomFieldCss"></td>
                                            </tr>
                                            <tr>
                                              <td>Father's Name</td><td><input type="text" required placeholder="Father's Name" name="FatherName" id="FatherName" class="CustomFieldCss"></td>
                                              <td>Surname</td><td><input type="text" required placeholder="Surname" name="Surname" id="Surname" class="CustomFieldCss"></td>
                                             </tr>
                                            <tr>
                                              <td>CNIC</td><td><input type="text" required placeholder="CNIC Number" name="CNIC" id="CNIC"  class=" CustomFieldCss"></td>
                                            
                                              <td>Date Of Birth</td><td><input required type="date" placeholder="Date Of Birth" name="DOB" id="DOB" class="CustomFieldCss"></td>
                                             
                                            </tr>
                                            <tr>
                                               <td>Mobile Number</td><td><input required type="number" placeholder="Mobile Number" name="Mobile" id="Mobile" class="CustomFieldCss"></td>
                                              <td>Email Address</td><td><input required type="email" placeholder="Email Address" name="EmailAddress" id="EmailAddress"  class="CustomFieldCss"></td>
                                              
                                            </tr>
                                           <tr>
                                            <td>Home Address</td><td><input type="text" required placeholder="Home Address" name="HomeAddress" id="HomeAddress" class="CustomFieldCss"></td>
                                              <td>Nationality </td><td><select name="country_id" id="country_id" required class=" CustomFieldCss">
                                                  <option value="">Select Country</option>
                                                  @foreach ($Countries as $Countrie)
                                                    <option value="{{ $Countrie->country_id }}">{{ $Countrie->country_name }}</option>
                                                  @endforeach</select></td>
                                              
                                           </tr>
                                            <tr>
                                              <td>Provience</td><td><select name="ProvenceId" id="ProvenceId" required class=" CustomFieldCss"><option value="">Select Provence</option></select></td>
                                               <td>District</td><td><select name="DistrictId" id="DistrictId" required class=" CustomFieldCss"> <option value="">Select District</option></select></td>
                                              
                                            </tr>
                                            <tr>
                                               <td>Taluka </td><td><select name="TalukaId" id="TalukaId" required class=" CustomFieldCss"><option value="">Select Taluka</option></select></td>
                                               <td>UC </td><td><select name="UcId" id="UcId" required class=" CustomFieldCss"><option value="">Select UC</option></select></td>
                                               
                                            <tr>
                                              <td>Domicile </td><td><select name="DomicileId" required id="DomicileId" class=" CustomFieldCss"><option>Select Domicile</option></select></td>
                                               <td>Marital Status</td><td> <input type="radio" name="MaritalStatus" value="Single" checked>Single <input type="radio" name="MaritalStatus" value="Married">Married</td>
                                              
                                            </tr>
                                            <tr>
                                               <td>Gander</td><td><input type="radio" name="Gander" value="Male" checked>Male <input type="radio"  name="Gander" value="Female">Female </td>
                                               <td></td>
                                            </tr>
                                      </table>
                            </fieldset>

                      <!-- Qualification Information -->
                            <fieldset style="padding: 10px;">
                              <legend>Qualification</legend>
                                 <table class="CustomTable" align="center" id="QualificationTable">
                                           <tr>
                                              <td>
                                                 <select name="Q_DegreeId_0" id="Q_DegreeId_0"  required class="CustomFieldCss">
                                                  <option value="">Select Degree</option>
                                                    @foreach($Degrees as $ObjDegree)
                                                    <option value="{{ $ObjDegree->DegreeId }}">{{ $ObjDegree->Degree }}</option>
                                                    @endforeach
                                                </select></td>
                                              <td><input type="text"  required placeholder="Institute" name="Q_Institute_0" id="Q_Institute_0"  class="CustomFieldCss"></td>
                                              <td><input type="text"  required placeholder="Grade / GPA " name="Q_Grade_0" id="Q_Grade_0"  class="CustomFieldCss"></td>
                                              <td>
                                                <select name="Q_Year_0" class="CustomFieldCss"  required>
                                                  <option value="">Select Year</option>
                                                    @for($a=2000;$a<=2020;$a++)
                                                    <option value="{{$a}}">{{$a}}</option>
                                                    @endfor
                                                </select>
                                              </td>
                                          </tr>
                                          

                                  </table> 
                                    <a href="javascript:void(0);" class="pull-right" onclick="AddQualificationRow()"><span class="fa fa-plus"></span></a>
                             </fieldset>
                      
                      <!-- Work Experience Information -->
                        <fieldset style="padding: 10px;">
                              <legend>Work Experience</legend>
                                 <table class="CustomTable" align="center" id="WorkExperienceTable">
                                          <tr>
                                              <td><input type="text" placeholder="Job Title"  required name="W_JobTitle_0" id="W_JobTitle_0"  class="CustomFieldCss"></td>
                                              <td><input type="text" placeholder="Organization"  required name="W_Organization_0" id="W_Organization_0"  class="CustomFieldCss"></td>
                                              <td><input type="text" placeholder="Designation" required name="W_Designation_0" id="W_Designation_0"  class="CustomFieldCss"></td>
                                              <td><input type="date" name="W_StartDate_0" required id="W_StartDate_0"  class="CustomFieldCss"></td>
                                              <td>To</td>
                                              <td><input type="date" name="W_EndDate_0" required id="W_EndDate_0"  class="CustomFieldCss"></td>
                                          </tr>
                                  </table> 
                                  <a href="javascript:void(0);" class="pull-right" onclick="AddWorkExperienceRow()"><span class="fa fa-plus"></span></a>
                             </fieldset>   
                
                      <!-- Skills Information-->
                           <fieldset style="padding: 10px;">
                              <legend>Skills</legend>
                                 <table class="CustomTable" align="center" id="SkillsTable">
                                    <tr>
                                      <td>
                                          <select name="SkillId_0" id="SkillId_0" required class=" CustomFieldCss">
                                              <option value="">Select Skill</option>
                                                @foreach ($Skills as $ObjSkills)
                                                  <option value="{{ $ObjSkills->SkillId }}">{{ $ObjSkills->Skill_Name }}</option>
                                                @endforeach</select>
                                        </td>
                                      <td><select name="skill_Level_0" id="skill_Level_0" required class=" CustomFieldCss">
                                                    <option value="">Skill Lavel</option>
                                                    @foreach ($aLevels as $ObjLevel)
                                                      <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                    @endforeach</select>
                                      </td>
                                    </tr>
                                  </table> 
                                   <a href="javascript:void(0);" class="pull-right" onclick="AddSkillRow()"><span class="fa fa-plus"></span></a>
                             </fieldset> 

                     <!-- Languages Information-->
                           <fieldset style="padding: 10px;">
                              <legend>Languages</legend>
                                 <table class="CustomTable" align="center" id="LanguagesTable">
                              
                                 <tr>
                                    <td><select name="LanguageId_0" id="LanguageId_0"  required class="CustomFieldCss">
                                                <option value="">Select Language</option>
                                                 @foreach($Languages as $ObjLanguage)
                                                      <option value="{{ $ObjLanguage->LanguageId }}">{{ $ObjLanguage->Language }}</option>
                                                 @endforeach </select></td>
                                    <td><select name="speaking_Level_0" id="speaking_Level_0" required class=" CustomFieldCss">
                                                  <option value="">Speaking Lavel</option>
                                                  @foreach ($aLevels as $ObjLevel)
                                                    <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                  @endforeach</select>
                                    </td>
                                    <td><select name="reading_Level_0" id="reading_Level_0" required class=" CustomFieldCss">
                                                  <option value="">Reading Lavel</option>
                                                    @foreach ($aLevels as $ObjLevel)
                                                    <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                  @endforeach</select>
                                    </td>
                                    <td><select name="writing_Level_0" id="writing_Level_0" required class=" CustomFieldCss">
                                                  <option value="">Writing Lavel</option>
                                                   @foreach ($aLevels as $ObjLevel)
                                                    <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option>
                                                  @endforeach</select>
                                    </td>
                                  </tr>
                                  </table> 
                                   <a href="javascript:void(0);" class="pull-right" onclick="AddLanguagesRow()"><span class="fa fa-plus"></span></a>
                             </fieldset> 

                      <!--References Contacts Information  -->
                         <fieldset style="padding: 10px;">
                              <legend>References Contact</legend>
                                 <table class="CustomTable" align="center" id="ReferencesTable">
                                   <tr>
                                      <td><input type="text" placeholder="First Name" required name="R_Name_0" id="R_Name_0"  class="CustomFieldCss"></td>
                                      <td><input type="text" placeholder="Organization Name" required name="R_Organization_0" id="R_Organization_0"  class="CustomFieldCss"></td>
                                      <td><input type="number" placeholder="Mobile Number" required name="R_Mobile_0" id="R_Mobile_0"  class="CustomFieldCss"></td>
                                      <td><input type="email" placeholder="Email Address" required name="R_EmailAddress_0" id="R_EmailAddress_0"  class="CustomFieldCss"></td>
                                    </tr>
                                  </table> 
                                  <a href="javascript:void(0);" class="pull-right" onclick="AddReferenceRow()"><span class="fa fa-plus"></span></a>
                             </fieldset>
                  <br>
                  <input type="submit" value="Save" class="btn btn-default pull-right">
                </form>
    
  </div>


    </div>
  </div>

    <script type="text/javascript">
           var value=0;
           function AddReferenceRow(){
             value++;
              var Row='<tr><td><input type="text" placeholder="First Name" name="R_Name_'+value+'" id="R_Name_'+value+'"  class="CustomFieldCss"></td>';
                  Row +='<td><input type="text" placeholder="Organization Name" name="R_Organization_'+value+'" id="R_Organization_'+value+'"  class="CustomFieldCss"></td>';
                  Row +='<td><input type="number" placeholder="Mobile Number" name="R_Mobile_'+value+'" id="R_Mobile_'+value+'"  class="CustomFieldCss"  style="width: 160px;"></td>';
                  Row +='<td><input type="email" placeholder="Email Address" name="R_EmailAddress_'+value+'" id="R_EmailAddress_'+value+'"  class="CustomFieldCss"></td></tr>';
               $("#ReferencesTable").append(Row);
           }

            function AddSkillRow(){
             value++;
              var Row='<tr>'; 
                  Row+='<td><select name="SkillId_'+value+'" id="SkillId_'+value+'" class=" CustomFieldCss"> <option value="">Select Skill</option>';
                  Row+='@foreach ($Skills as $ObjSkills) <option value="{{ $ObjSkills->SkillId }}">{{ $ObjSkills->Skill_Name }}</option> @endforeach</select></td>';
                  Row+='<td><select name="skill_Level_'+value+'" id="skill_Level_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Skill Lavel</option>';
                  Row+='@foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select>';
                  Row+='</td></tr>';
               $("#SkillsTable").append(Row);
           }

           function AddLanguagesRow() {
             value++;
              var Row='<tr><td><select name="LanguageId_'+value+'" id="LanguageId_'+value+'" class="CustomFieldCss" style="width:161px;"><option value="">Select Language</option>';
                  Row+='@foreach($Languages as $ObjLanguage)  <option value="{{ $ObjLanguage->LanguageId }}">{{ $ObjLanguage->Language }}</option> @endforeach </select></td>';
                  Row+='<td><select name="speaking_Level_'+value+'" id="speaking_Level_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Speaking Lavel</option> @foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select></td>';
                  Row+='<td><select name="reading_Level_'+value+'" id="reading_Level_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Reading Lavel</option> @foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select></td>';
                  Row+='<td><select name="writing_Level_'+value+'" id="writing_Level_'+value+'" class=" CustomFieldCss">';
                  Row+='<option>Writing Lavel</option>@foreach ($aLevels as $ObjLevel) <option value="{{ $ObjLevel->LevelId }}">{{ $ObjLevel->Level }}</option> @endforeach</select></td></tr>';
               $("#LanguagesTable").append(Row);
           }

            function AddWorkExperienceRow() {
             value++;
              var Row='<tr><td><input type="text" placeholder="Job Title" name="W_JobTitle_'+value+'" id="W_JobTitle_'+value+'"  class="CustomFieldCss" style="width: 210px;"></td>';
                  Row+='<td><input type="text" placeholder="Organization" name="W_Organization_'+value+'" id="W_Organization_'+value+'"  class="CustomFieldCss"  style="width: 210px;"></td>';
                  Row+='<td><input type="text" placeholder="Designation" name="W_Designation_'+value+'" id="W_Designation_'+value+'"  class="CustomFieldCss"  style="width: 200px;"></td>';
                  Row+='<td><input type="date" name="W_StartDate_'+value+'" id="W_StartDate_'+value+'"  class="CustomFieldCss"  style="width: 200px;"></td>';
                  Row+='<td>To</td><td><input type="date" name="W_EndDate_'+value+'" id="W_EndDate_'+value+'"  class="CustomFieldCss"  style="width: 210px;"></td></tr>';
               $("#WorkExperienceTable").append(Row);
           }

            function AddQualificationRow() {
             value++;
               var Row='<tr><td><select name="Q_DegreeId_'+value+'" id="Q_DegreeId_'+value+'" class="CustomFieldCss"><option value="">Select Degree</option> ';
                   Row+='@foreach($Degrees as $ObjDegree) <option value="{{ $ObjDegree->DegreeId }}"> {{ $ObjDegree->Degree }}</option> @endforeach </select></td>';
                   Row+='<td><input type="text" placeholder="Institute" name="Q_Institute_'+value+'" id="Q_Institute_'+value+'"  class="CustomFieldCss"></td>';
                   Row+='<td><input type="text" placeholder="Grade / GPA " name="Q_Grade_'+value+'" id="Q_Grade_'+value+'"  class="CustomFieldCss"   style="width: 160px;"></td>';
                   Row+='<td><select name="Q_Year_'+value+'" id="Q_Year_'+value+'" class="CustomFieldCss">  <option>Select Year</option>  @for($a=2000;$a<=2020;$a++) <option value="{{$a}}">{{$a}}</option> @endfor </select> </td></tr>';
                   $("#QualificationTable").append(Row);
           }


            $("#country_id").on("change",function(){
                  AjaxRequest("#ProvenceId","{{ route('GetProvince') }}",$(this).val());
              });

            $("#ProvenceId").on("change",function(){
                  AjaxRequest("#DistrictId","{{ route('GetDistrict') }}",$(this).val());
              });
            $("#DistrictId").on("change",function(){
                  AjaxRequest("#TalukaId","{{ route('GetTaluka') }}",$(this).val());
              });
            $("#TalukaId").on("change",function(){
                AjaxRequest("#UcId","{{ route('GetUC') }}",$(this).val());
              });
            
            AjaxRequest("#DomicileId","{{ route('GetDomicile') }}");
             


             function AjaxRequest(ResponseId,url,value='') 
             {
                 $.ajax({
                    type: 'GET',
                    url: url,
                    data:{Id:value},
                    success:function(data){
                      $(ResponseId).html(data);
                    }
                  });
              }
        

            $("#CVForm").on("submit",function(e){
                e.preventDefault();
                var FormData = $(this).serialize();

                  $.ajax({
                      type: 'POST',
                      url: "{{ route('AddCV') }}",
                      data:FormData,
                      success:function(data){
                        swal("", "CV Created Successfuly", "success");
                        AjaxPage("{{ route("CVShowGrid") }}");
                      }
                  });
            });
         

    </script>
