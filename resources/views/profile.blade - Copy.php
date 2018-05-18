@extends("master")
@section('content')
        <style>
          th{text-align:left;}
          </style>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                  <div class="container">
             <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Candidate  Profile</h3>
                      </div>
                      <div class="panel-body">
                           <table class="table">
                            <tr>
                                <th>Name<th>
                                <td>'.$sName.'</td>
                            </tr>
                            <tr>
                                <th>Surname<th>
                                <td>'.$sSurname.'</td>
                            </tr>
                            <tr>
                                <th>Father Name<th>
                                <td>'.$sFatherName.'</td>
                            </tr>
                             <tr>
                                <th>CNIC<th>
                                <td>'.$sCNIC.'</td>
                            </tr>
                              <tr>
                                <th>Date Of Birth<th>
                                 <td>'.$sDateOfBirth.'</td>
                            </tr>
                            <tr>
                                <th>Address<th>
                                <td>'.$sAddress.'</td>
                            </tr>
                             <tr>
                                <th>City<th>
                                <td>'.$sDistrictName.'</td>
                            </tr>
                              <tr>
                                <th>Email Address<th>
                                 <td>'.$sFatherName.'</td>
                            </tr>
                             <tr>
                                <th>Skype Id<th>
                                 <td>'.$sSkypeId.'</td>
                            </tr>
                             <tr>
                                <th>Contact Home<th>
                                <td>'.$sContactHome.'</td>
                            </tr>
                            <tr>
                                <th>Contact Mobile<th>
                                 <td>'.$sContactMobile.'</td>
                            </tr>
                              <tr>
                                <th>Specialties<th>
                                <td>sSpecialties</td>
                            </tr>
                            <tr>
                                <th>Skills<th>
                               <td>sSkills</td>
                            </tr>
                              <tr>
                                <th>Hobbies<th>
                                <td>sHobbies</td>
                            </tr>
                            </table>
                      </div>
                </div>

                   <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Work Experiences </h3>
                      </div>
                      <div class="panel-body">
                       <table class="table">
                        <tr>
                            <th>Duration</th>
                            <th>Company</th>
                            <th>Job Tile</th>
                            <th>Description of Duties</th>
                           
                        </tr>
                        <tr>
                               
                                <td>FromDate To ToDate</td>
                                <td>Company</td>
                                <td>JobTitle</td>
                                <td>Description</td>
                            
                            </tr></table>
                      </div>
                    </div>

                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Qualification</h3>
                      </div>
                      <div class="panel-body">
                       <table class="table">
                        <tr>
                            <th>Degree / Diploma / Certification</th>
                            <th>Institute</th>
                            <th>Percentage / CGPA</th>
                            <th>Year</th>
                        </tr>
                        <tr>
                                       
                                        <td>Degree</td>
                                        <td>Institute</td>
                                        <td>%Percentage</td>
                                        <td>Year</td>
                                    
                                    </tr>
                                  </table>
                      </div>
                    </div>



                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">References</h3>
                      </div>
                      <div class="panel-body">
                       <table class="table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                           
                        </tr>
                        <tr>
                                       
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Contact</td>
                                    
                                    </tr>
                                  </table>
                      </div>
                    </div>



                </div>
             </div>
          </div>

          @endsection