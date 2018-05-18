<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Roles</title>

     <link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/bootstrap.min.css') }}" />
     <script src="{{ asset('public/js/jquery.min.js') }}"> </script>
      <!-- jquery-confirm files -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/jquery-confirm-master/css/jquery-confirm.css ') }}"/>
        <script type="text/javascript" src="{{ asset('public/jquery-confirm-master/js/jquery-confirm.js') }}"></script>
     <style>
            td{padding-left:5px; }
     </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
          <center> <img src="{{ asset('public/images/cv_logo.png') }}"  style="width: 150px;height: 100px;">
            <h3>Roles & Permissions</h3>
            </center>
        </div>

    </div>
    <form action="#" id="UpdateRolesForm">
            <table class="table table-responsive" style="" align="center">
                <tr style="height: 50px;background: #e6e6fa;">
                    <th><span class="WhiteHeading">Role Type</span></th>
                    <th width="5%" align="center"><span class="WhiteHeading">View</span></th>
                    <th width="5%" align="center"><span class="WhiteHeading">Add</span></th>
                    <th width="5%" align="center"><span class="WhiteHeading">Update</span></th>
                    <th width="5%" align="center"><span class="WhiteHeading">Delete</span></th>
                </tr>
                {!! $sRolesData !!}
                <tr><td colspan="5" align="center"><br />
                    <input type="submit" class="SmartPupilsButton" value="Save Roles" /></td></tr>
                    <input type="hidden" name="action" id="action" value="Add">
                     <input type="hidden" name="UserId" id="UserId" value="{{ $iUserId }}">
                     {{ csrf_field() }}
                     <!-- <input type="hidden" name="_token" id="_token" value=""> -->
            </table>
    </form>
</div>




<!-- <script src="{{ asset('public/js/jquery-3.3.1.js') }}"></script> -->

<script> 
    
    $("#UpdateRolesForm").on("submit",function(e){
          
              e.preventDefault();
            var Url = "{{ route('SaveRoles') }}";
            var Data = $("#UpdateRolesForm").serialize();
            $.ajax({
                url:Url,
                type :"POST",
                data:Data,
                success:function(responsive){
                    // alert(responsive);
                    if(responsive =='Success'){
                        $.confirm({
                                title: 'Success.!',
                                content: 'User Roles has been Updated..',
                                type: 'green',
                                typeAnimated: true,
                                // buttons: {
                                //     tryAgain: {
                                //         text: 'Try again',
                                //         btnClass: 'btn-red',
                                //         action: function(){
                                //         }
                                //     },
                                //     close: function () {
                                //     }
                                // }
                            });
                    }
                    else{
                        $.confirm({
                                title: 'Faild.!',
                                content: 'User Roles faild to Updated n\ please confirm your data..',
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    tryAgain: {
                                        text: 'Try again',
                                        btnClass: 'btn-red',
                                        action: function(){
                                        }
                                    },
                                    close: function () {
                                    }
                                }
                            });

                       
                    }
                     
                }
            });
    });
</script>

</body>
</html>