
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/jsgrid/css/jsgrid.css') }}" />
<link rel="stylesheet" type="text/css"  media="all" href="{{ asset('public/jsgrid/css/theme.css') }}" />
<style type="text/css">
           .navbar, .jsgrid-header-row > .jsgrid-header-cell{background-color: #28609038;}   
</style>
    
<div class="banner"><h2><a href="#">Settings</a><i class="fa fa-angle-right"></i><span>Users</span></h2></div>
<div class="typo-grid">
    <div class="typo-1">
        <div class="grid_3 grid_4">
       
        
                    <div id="jsGrid" class="jsgrid" style="position: relative; width: 100%;font-size: smaller;">

                        <div class="jsgrid-grid-header jsgrid-header-scrollbar">
                                <table class="jsgrid-table">
                                    <tr class="jsgrid-header-row">
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:25px;">#</th>
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:156px;">Name</th>
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:190px;">Father's Name</th>
                                        <th class="jsgrid-header-cell jsgrid-header-sortable" style="width:200px;">CNIC</th>
                                        <th class="jsgrid-header-cell jsgrid-control-field jsgrid-align-center" style="width:100px;">Oprations</th>
                                    </tr>
                                    
                                </table>
                        </div>

                        <div class="jsgrid-grid-body" style="height: 500px;">
                            <table class="jsgrid-table">
                                <tbody>
                                    <?php $a=1;?>
                                   @foreach($Users as $ObjUser)
                                        <tr class="jsgrid-row">
                                            <td class="jsgrid-cell" style="width:20px;">{{ $a++ }}</td>
                                            <td class="jsgrid-cell" style="width: 133px;">{{ $ObjUser->FirstName.' '.$ObjUser->LastName }}</td>
                                            <td class="jsgrid-cell" style="width: 158px;">{{ $ObjUser->UserName }}</td>
                                            <td class="jsgrid-cell" style="width:150px;">{{ $ObjUser->EmailAddress }}</td>
                                            <td class="jsgrid-cell jsgrid-control-field jsgrid-align-center"style="width:100px;">
                                            <input class="jsgrid-button jsgrid-edit-button" onclick='Edit("{{ $ObjUser->UserId }}")' type="button" title="Edit">
                                            <input class="jsgrid-button jsgrid-delete-button" onclick='Delete("{{ $ObjUser->UserId }}");' type="button" title="Delete">
                                            <a href="#" onclick='View("{{ $ObjUser->UserId }}");' ><i class="fa fa-eye" style="font-size: 16px;color: green;"></i></a>
                                            <a href="#" onclick='UserRoles("{{ $ObjUser->UserId }}");' ><i class="fa fa-lock" style="font-size: 16px;color: green;"></i></a></td>
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
            
            function UserRoles(InfoId) {
                InfoId = btoa(unescape(encodeURIComponent(InfoId+'/CVMaster')));
                 var Updated = window.open("{{ route('UserRoles') }}"+'/'+InfoId,"","width=700px,height=500px,location=no");
                if(Updated){
                    alert("Updated");
                } 
                else{
                    alert("Faild");
                }
            }

            function View(InfoId) {
                AjaxPage('{{ route('ViewProfile') }}'+'/'+InfoId);
            }
            function Edit(InfoId) {
                
                AjaxPage('{{ route('EditProfile') }}'+'/'+InfoId);
            }
            function Delete(InfoId) {
                
                var Url = "{{ route("DeleteUser") }}"+'/'+InfoId;
                $.ajax({
                    type: 'GET',
                    url: Url,
                    success:function(data){
                        swal("", "User Deleted Successfuly", "success");
                        AjaxPage("{{ route("UsersDataGrid") }}");
                    }
                });
            }
        </script>


