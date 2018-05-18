
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/jsgrid/css/jsgrid.css') }}" />
<link rel="stylesheet" type="text/css"  media="all" href="{{ asset('public/jsgrid/css/theme.css') }}" />
<style type="text/css">
           .navbar, .jsgrid-header-row > .jsgrid-header-cell{background-color: #28609038;}   
</style>
    
<div class="banner"><h2><a href="#">Curriculum vitae</a><i class="fa fa-angle-right"></i><span>CV's</span></h2></div>
<div class="typo-grid">
    <div class="typo-1">
        <div class="grid_3 grid_4">
       
        
                    <div id="jsGrid" class="jsgrid" style="position: relative; width: 100%;font-size: smaller;">

                        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:50px;">#</th>
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:180px;">Name</th>
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:200px;">Father's Name</th>
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:150px;">Surname</th>
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:200px;">CNIC</th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width:100px;">Oprations</th>
                                    </tr>
                                    
                                </table>
                        </div>

                        <div class="jsgrid-grid-body" style="height: 500px;">
                            <table class="jsgrid-table">
                                <tbody>
                                    <?php $a=1;?>
                                   @foreach($Candidates as $Candidate)
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell" style="width:50px;">{{ $a++ }}</td>
                                            <td class="jsgrid-cell" style="width:180px;">{{ $Candidate->FirstName.' '.$Candidate->LastName }}</td>
                                            <td class="jsgrid-cell" style="width:200px;">{{ $Candidate->FatherName }}</td>
                                            <td class="jsgrid-cell" style="width:150px;">{{ $Candidate->Surname }}</td>
                                            <td class="jsgrid-cell" style="width: 200px;">{{ $Candidate->CNIC }}</td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"style="width:100px;">
                                            <input class="jsgrid-button jsgrid-edit-button" onclick='Edit("{{ $Candidate->InfoId }}")' type="button" title="Edit">
                                            <input class="jsgrid-button jsgrid-delete-button" onclick='Delete("{{ $Candidate->InfoId }}");' type="button" title="Delete">
                                            <a href="#" onclick='View("{{ $Candidate->InfoId }}");' ><i class="fa fa-eye" style="font-size: 16px;color: green;"></i></a></td>
                                        </tr>
                                    @endforeach()
                                  
                                </tbody>
                            </table>
                        </div>

                    </div>

        </div>
    </div>
</div>
           
<!-- <script src="{{ asset('public/js/bootstrap.min.js') }}"></script> -->
        <script type="text/javascript">
            
            function View(InfoId) {
                 window.open("{{ route('ViewCV') }}"+"/"+InfoId,"","width=700px,height=500px,location=no");
            }
            function Edit(InfoId) {
                AjaxPage("{{ route("EditCV") }}"+'/'+InfoId);
            }
            function Delete(InfoId) {
                
                var Url = "{{ route("DeleteCV") }}"+'/'+InfoId;
                $.ajax({
                    type: 'GET',
                    url: Url,
                    data:FormData,
                    success:function(data){
                        swal("", "CV Deleted Successfuly", "success");
                        AjaxPage("{{ route("CVShowGrid") }}");
                    }
                });
            }
        </script>


