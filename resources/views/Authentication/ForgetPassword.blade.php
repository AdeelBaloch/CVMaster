<div class="login">
		<div class="login-bottom" style="margin-top: 0px;">
			<h2>Reset Password</h2>
			<form id="PasswordForgetForm">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="email" placeholder="Email Address" name="EmailAddress" id="EmailAddress">
					<i class="fa fa-user"></i>
				</div>
				{!! csrf_field() !!}
				   <div class="news-letter login-do" href="#">
				   	<label class="hvr-shutter-in-horizontal login-sub">
					 <input type="submit" value="Reset Password" >
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
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>

	<script>

		$("#PasswordForgetForm").on("submit",function(e){
			e.preventDefault();
			var FormData = $(this).serialize();
			$.ajax({
				type:"POST",
				url:"{{ route('SendResetLink') }}",
				data:FormData,
				success:function(response){
					if( response == 'NotAvailable'){
							$.confirm({
									title: 'faild.!',
									content: 'User is Not Exists \n Email Address Is Invalid',
									type: 'red',
									typeAnimated: true,
									buttons: {
										close: function () {
										}
									}
								});
					} else if(( response == 'Faild')){
						$.confirm({
								title: 'faild.!',
								content: 'Can\'t ganerate Reset link \n there are problim',
								type: 'red',
								typeAnimated: true,
								buttons: {
									close: function () {
									}
								}
								});
					}
					else{ $("#BodyContainer").html(response); }
				
				}
			});
		});

	</script>

