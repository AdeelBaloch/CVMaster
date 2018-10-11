<!DOCTYPE HTML>
<html>
<head>
<title>{{ env('APP_NAME') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Login,Login Page,CV Ganerator" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('public/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="{{ asset('public/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet"> 
<script src="{{ asset('public/js/jquery.min.js') }}"> </script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"> </script>
<script src="{{ asset('public/libs/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js') }}"></script>
<!-- jquery-confirm files -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/jquery-confirm-master/css/jquery-confirm.css ') }}"/>
 <script type="text/javascript" src="{{ asset('public/jquery-confirm-master/js/jquery-confirm.js') }}"></script>

<style type="text/css">
  
            #LoadingBackgroundDiv{
                background-image: url("{{ asset('public/images/cv_logo.png') }}"); 
                background-attachment: fixed;
                background-size: 126px;
                background-position: center;
                background-position-y: 77px;
                background-repeat: no-repeat;
            }
            #CopyRight{background:#1abc9c;padding:10px;text-align:center;} 
		
			.fa { float: right; }
			input[type="text"], .login-mail input[type="password"],input[type="email"] 
			{
			border: none;
			outline: none;
			font-size: 0.9em;
			color: #999;
			width: 89%;
			font-family: 'Muli-Regular';
			}
</style>
</head>
<body>
	
	<center><a href="index.html"><img src="{{ asset('public/images/cv_logo.png') }}" style="width:155px; margin-bottom:  -140px;"></a></center>
	<div id="BodyContainer"></div>

<div id="CopyRight">
<p style="color: white"> &copy; {{ date('Y')}} CV Master. All Rights Reserved | Developed by <a href="www.facebook.com/Iam.AdeelAhmedBaloch" target="_blank" style="color: black;">Adee Ahmed</a> </p>	    
</div>  
	<script src="{{ asset('public/js/jquery.nicescroll.js') }}"></script>
	<script src="{{ asset('public/js/scripts.js') }}"></script>
	<?php
		if(isset($sDefaultPage)) :
				$sDefaultPage = $sDefaultPage;
		else :
				$sDefaultPage = route('ShowLogin');
		endif;
	?>
	<script type="text/javascript">
	
		$(document).ready(function(){ 
			ShowContent("{{ $sDefaultPage }}"); 
		});	
		
		function ShowContent(url) 
		{
			$.ajax({
					url:url,
					type:"get",
					success:function(data){
						$("#BodyContainer").html(data);
					}
			});
		}
		
	</script>

</body>
</html>
