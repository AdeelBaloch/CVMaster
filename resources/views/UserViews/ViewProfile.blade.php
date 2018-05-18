	<div class="banner"><h2><a href="index.html">User</a><i class="fa fa-angle-right"></i><span>View Profile</span></h2></div>
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
 	 <div class=" profile">
		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
				<div class="col-md-4 profile-bottom-img text-center">
				@if (Storage::disk('public')->has($UserInfo->UserImage))
					<img src="<?=asset('storage/app/public').'/'.$UserInfo->UserImage;?>" id="ProfilePic" style="height:150px;width:151px;margin: 5px;">
				@else
					<img src="{{ asset('public/images/User.png') }}" alt="" id="ProfilePic" style="height:150px;width:151px;margin: 5px;">
				@endif 
				<br><b>Adeel Ahmed</b>
			</div>
			<div class="col-md-8 profile-text">
				<table>
					<tr><th colspan="2" style="padding:12px;padding-bottom: 0px;">User Information</th></tr>
					<td><input type="text" disabled placeholder="First Name" name="FirstName" id="FirstName"  class="CustomFieldCss" value="{{ $UserInfo->FirstName }}"></td></tr>
					<tr><td><input type="text" disabled placeholder="Last Name" name="LastName" id="LastName"  class="CustomFieldCss" value="{{ $UserInfo->LastName }}"></td></tr>
					<tr><td><input type="text" disabled placeholder="Mobile Number" name="MobileNumber" id="MobileNumber"  class="CustomFieldCss" value="{{ $UserInfo->MobileNumber }}"></td></tr>
					<tr><td><input type="Email" disabled placeholder="Email Address" name="EmailAddress" id="EmailAddress"  class="CustomFieldCss" value="{{ $UserInfo->EmailAddress }}"></td></tr>
					<tr><td><input type="text" disabled placeholder="Country" class="CustomFieldCss" value="{{ $UserInfo->country_name }}"></td></tr>
					<tr><td><input type="text" disabled placeholder="Province" class="CustomFieldCss" value="{{ $UserInfo->province_name }}"></td></tr>
					<tr><td><input type="text" disabled placeholder="District" class="CustomFieldCss" value="{{ $UserInfo->DistrictName }}"></td></tr>
					<tr><th style="padding:12px;padding-bottom: 0px;">Login Information</th></tr>
					<tr><td><input type="text" disabled placeholder="User Name" name="UserName" id="UserName"  class="CustomFieldCss" value="{{ $UserInfo->UserName }}"></td></tr>
					<tr><td><input type="Password" disabled disabled placeholder="Password" name="Password" id="Password"  class="CustomFieldCss" value="{{ $UserInfo->Password }}"></td></tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-btn">
	       <div class="clearfix"></div>
			</div>
			 
			
		</div>
	</div>
	<!--//gallery-->