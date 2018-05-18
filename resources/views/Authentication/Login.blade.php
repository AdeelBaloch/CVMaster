<div class="login">
		<div class="login-bottom" style="margin-top: 0px;">
			<!-- <h2>SignIn</h2> -->
			<form id="LoginForm">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="UserName" required="" name="username" id="username">
					<i class="fa fa-user"></i>
				</div>
				{!! csrf_field() !!}
				<div class="login-mail">
					<input type="password" placeholder="Password" required="" name="pass" id="pass">
					<i class="fa fa-lock"></i>
				</div>
				   <div class="news-letter login-do" href="#">
				   	<label class="hvr-shutter-in-horizontal login-sub">
					 <input type="submit" value="SignIn">
					</label>
					   </div>

			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<a href="#" onclick="ShowContent('{{ route('ForgetPassword') }}')" class="hvr-shutter-in-horizontal">Forget Password</a>
					</label>
					<p>Do not have an account?</p>
				<a href="#" onclick="ShowContent('{{ route('SignUpForm') }}')" class="hvr-shutter-in-horizontal">Signup</a>
			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>

	<script type="text/javascript">
		$("#LoginForm").on("submit",function(e){
			e.preventDefault();
			var username = $("#username").val()
			var pass = $("#pass").val();
			
			if(username !='' && pass !='')
			{
				var FormData = $(this).serialize();
				  $.ajax({
                      type: 'POST',
                      url: "{{ route('Authentication') }}",
                      data:FormData,
                      success:function(data){

									if(data['Message']){ swal("",data['Message'], "error"); }
									if(data['URL']){
										location.replace("{{ Route('home') }}");
									}
						}
        	          });
			}
		});
	</script>

