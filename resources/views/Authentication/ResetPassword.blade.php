
<div class="login">

		<div class="login-bottom" style="margin-top: 0px;">
			<h2>Save Password</h2>
			<form id="UpdatePasswordForm">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="password" placeholder="Password" required name="Password" id="Password" maxlength="14">
					<i class="fa fa-lock"></i>
				</div>
				{!! csrf_field() !!}
				<input type="hidden" name="sUserId" value="{{ $sUserId }}">
				<div class="login-mail">
					<input type="password" placeholder="Repeated password" required name="PasswordConfirm" id="PasswordConfirm" maxlength="14">
					<i class="fa fa-lock"></i>
				</div>
				  <div class="news-letter login-do" href="#">
				   	<label class="hvr-shutter-in-horizontal login-sub">
					 <input type="submit" value="Save Password">
					</label>
					   </div>
	
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<a href="#" onclick="ShowContent('{{ route('ShowLogin') }}')" class="hvr-shutter-in-horizontal">SingIn</a>
					</label>
					<p>Do not have an account?</p>
				<a href="#" onclick="ShowContent('{{ route('SignUpForm') }}')" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			</form>
			<div class="clearfix"> </div>
		</div>
	</div>

	<script>
	
		$("#UpdatePasswordForm").on("submit",function(e){
			e.preventDefault();
			var Password = $("#Password").val();
			var PasswordConfirm = $("#PasswordConfirm").val();
			
			if(Password !=' ' && PasswordConfirm !=' '){
				if(Password == PasswordConfirm){

						var FormData = $(this).serialize();
						$.ajax({
							url:"{{ route('UpdateNewPassword') }}",
							type:"POST",
							data:FormData,
							success:function(responsive){
									if(responsive['Message']){ swal("",responsive['Message'], "error"); }
									if(responsive['URL']){
										location.replace("{{ Route('home') }}");
									}
							}
						});

				}else {
					$.alert("Password does not matched","faild");
					}
			}
			else{
				$.alert("Fill the out of field ");
			}
		});
	</script>