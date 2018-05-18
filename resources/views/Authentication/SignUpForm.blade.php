

<form action="#" id="SignUpForm">
	<div class="login">
			<div class="login-bottom" style="margin-top: 0px;">
				<!-- <h2>Sign Up</h2> -->

				<div class="row">
					<div class="col-sm-6">
						<div class="login-mail">
							<input type="text" id="Fname" name="Fname" placeholder="First Name" required  tabindex='1'>
							<i class="fa fa-user"></i>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="login-mail">
							<input type="text" id="Lname" name="Lname" placeholder="Last Name" required   tabindex='2'>
							<i class="fa fa-user"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
					<div class="login-mail">
						<input type="email" id="EmailAddress" name="EmailAddress" placeholder="Email" required tabindex='3'>
						<i class="fa fa-envelope"></i>
					</div>
					<div class="login-mail">
						<input type="text" id="UserName" name="UserName" placeholder="UserName" required tabindex='4'>
						<i class="fa fa-user"></i>
					</div>
					<div class="login-mail">
						<input type="password" id="Password" name="Password" placeholder="Password" required tabindex='5'>
						<i class="fa fa-lock"></i>
					</div>
					<div class="login-mail">
						<input type="password" id="RPassword" name="RPassword" placeholder="Repeated password" required tabindex='6'>
						<i class="fa fa-lock"></i>
					</div>
					</div>
					{!! csrf_field() !!}
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="news-letter login-do" href="#">
							<label class="hvr-shutter-in-horizontal login-sub">
							<input type="submit" value="SignUp">
							</label>
						</div>
			
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 login-do">
						<a href="#" onclick="ShowContent('{{ route('ShowLogin') }}')" class="hvr-shutter-in-horizontal">Already Have and Account</a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
</form>


	<script type="text/javascript">
		$("#SignUpForm").on("submit",function(e)
		{
			e.preventDefault();
			var EmailAddress = $.trim($("#EmailAddress").val());
			var UserName = $.trim($("#UserName").val());
			var Password = $.trim($("#Password").val());
			var RPassword = $("#RPassword").val();
			
			if(EmailAddress !='' && UserName !='' && Password !='' && RPassword !='')
			{
				// alert(Password+"=="+RPassword);
				if(Password === RPassword) 
				{ 
						
						var FormData = $(this).serialize();
						$.ajax({
								type: 'POST',
								url: "{{ route('SignUp') }}",
								data:FormData,
								success:function(data)
								{
									if(data['Message']){ swal("",data['Message'], "error"); }
									else{ location.replace(data['URL']); }
									
								}
							});
				
				}
				else
				{
					swal("", "Confirm Password Not Matched", "error");
				}
			}
		});

	</script>