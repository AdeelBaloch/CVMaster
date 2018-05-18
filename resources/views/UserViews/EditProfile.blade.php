	<style type="text/css">
		 .CustomFieldCss{
              border-top: 0px;
              border-left: 0px;
              border-right: 0px;
              border-bottom: 1px solid #b9b9b9;
              background-color: transparent;
              width: 100%;
        } 
        .profile-bottom {width: 80%;}
	</style>
	<div class="banner"><h2><a href="index.html">User</a><i class="fa fa-angle-right"></i><span>Edit Profile</span></h2></div>

	 <div class=" profile">
	 	<form id="UpdateProfileForm" method="GET" action="#">
		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			
			<div class="col-md-4 profile-bottom-img">
				@if (Storage::disk('public')->has($UserInfo->UserImage))
					<img src="<?=asset('storage/app/public').'/'.$UserInfo->UserImage;?>" id="ProfilePic" style="height:150px;width:151px;">
				@else
					<img src="{{ asset('public/images/User.png') }}" alt="" id="ProfilePic" style="height:150px;width:151px;">
				@endif 
				<input type="file" name="UserImage" id="UserImage" style="font-size:11px;padding:8px;">
			</div>
			<div class="col-md-8 profile-text">
				<table>
					<tr><th colspan="2" style="padding:12px;padding-bottom: 0px;">User Information</th></tr>
					<td><input type="text" required placeholder="First Name" name="FirstName" id="FirstName"  class="CustomFieldCss" value="{{ $UserInfo->FirstName }}"></td></tr>
					<tr><td><input type="text" required placeholder="Last Name" name="LastName" id="LastName"  class="CustomFieldCss" value="{{ $UserInfo->LastName }}"></td></tr>
					<tr><td><input type="text" required placeholder="Mobile Number" name="MobileNumber" id="MobileNumber"  class="CustomFieldCss" value="{{ $UserInfo->MobileNumber }}"></td></tr>
					<tr><td><input type="Email" required placeholder="Email Address" disabled id="EmailAddress"  class="CustomFieldCss" value="{{ $UserInfo->EmailAddress }}"></td></tr>
					<tr><td><select name="CountryId" id="CountryId" class="CustomFieldCss">
							 <option value="">Select Country</option>
                              @foreach ($Countries as $Countrie)

                              	@if($Countrie->country_id == $UserInfo->CountryId)
                                <option selected value="{{ $Countrie->country_id }}" >{{ $Countrie->country_name }}</option>
                           		@else
                                <option value="{{ $Countrie->country_id }}" >{{ $Countrie->country_name }}</option>
                              	@endif

                              @endforeach
						</select></td></tr>
					<tr><td><select name="ProvinceId" id="ProvinceId" required class=" CustomFieldCss"><option value="">Select Provence</option></select></td></tr>
					<tr><td><select name="DistrictId" id="DistrictId" required class=" CustomFieldCss"> <option value="">Select District</option></select></td></tr>
					<tr><th style="padding:12px;padding-bottom: 0px;">Login Information</th></tr>
					<tr><td><input type="text" required placeholder="User Name" Disabled id="UserName"  class="CustomFieldCss" value="{{ $UserInfo->UserName }}"></td></tr>
					<tr><td><input type="Password" required placeholder="Password" name="Password" id="Password"  class="CustomFieldCss" value="{{ $UserInfo->Password }}"></td></tr>
				
					<tr><td class="profile-btn" colspan="4"><button type="submit" class="btn bg-red">Update Profile</button></td></tr>
					</table>
				<input type="hidden" name="UserId" id="UserId" value="{{ $UserInfo->UserId }}">					
				<input type="hidden" name="ActiveUserId" value="{{ $CurrentUserInfo->UserId }}">					
				 {!! csrf_field() !!}
			</div>
			
			<div class="clearfix"></div>
			</div>
			 </form>
			
		</div>
	</div>

	<?php
      $DistrictJson=json_encode(["Id"=>$UserInfo->ProvinceId,"DistrictId"=>$UserInfo->DistrictId]);
      $ProvinceJson=json_encode(["Id"=>$UserInfo->CountryId,"ProvinceId"=>$UserInfo->ProvinceId]);

    ?>
	<script type="text/javascript">
			
			function readURL(input) 
			{
				   if (input.files && input.files[0]) 
				  {
				    var reader = new FileReader();

				    reader.onload = function(e) {
				      $('#ProfilePic').attr('src', e.target.result);
				    }

				    reader.readAsDataURL(input.files[0]);
				  }
			}

			$("#UserImage").on("change",function(){
				 var fileName = $(this).val();
       			readURL(this);
			});
			   var DistrictJson = "{{ $DistrictJson }}";
               var ProvinceJson = "{{ $ProvinceJson }}";

		    $("#CountryId").on("change",function(){
                  AjaxRequest("#ProvinceId","{{ route('GetProvince') }}",$(this).val());
              });

            $("#ProvinceId").on("change",function(){
                  AjaxRequest("#DistrictId","{{ route('GetDistrict') }}",$(this).val());
              });

            AjaxRequest("#ProvinceId","{{ route('GetProvince') }}",JSON.parse(ProvinceJson.replace(/&quot;/g,'"')));
            AjaxRequest("#DistrictId","{{ route('GetDistrict') }}",JSON.parse(DistrictJson.replace(/&quot;/g,'"')));
          
            function AjaxRequest(ResponseId,url,value='') 
             {
                 $.ajax({
                    type: 'GET',
                    url: url,
                    data:value,
                    success:function(data){
                      $(ResponseId).html(data);
                    }
                  });
             }

             $("#UpdateProfileForm").on("submit",function(e){
             	e.preventDefault();
             	 var formData = new FormData(this);
			// console.log(formData);
			
				 $.ajax({
                      type: 'POST',
                      url: "{{ route('UpdateProfile') }}",
                      data:formData,
                       async: false,
                      success:function(data){
                        if(data =="faild")
                        	swal("", "Profile Update Faild", "error");
                       	
                       	if(data =="success"){
                       		swal("", "Profile Updated Successfully", "success");
                        	AjaxPage("{{ route("ViewProfile").'/'.$UserInfo->UserId }}");
                      	}
                      },
				        cache: false,
				        contentType: false,
				        processData: false
                  });
             });

	</script>