<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
<title>{{ env('APP_NAME') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template,CV,Ganerator, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('public/css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />
<script src="{{ asset('public/libs/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js') }}"></script>
<!-- Custom Theme files -->
<link href="{{ asset('public/css/style.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet"> 
<script src="{{ asset('public/js/jquery.min.js') }}"> </script>

<script src="{{ asset('public/js/jquery2.0.3.min.js') }}"> </script>
<!-- <script src="{{ asset('public/js/jquery1.9.1.min.js') }}"> </script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- Mainly scripts -->
<script src="{{ asset('public/js/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('public/js/jquery.slimscroll.min.js') }}"></script>
<!-- Custom and plugin javascript -->
<link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
<script src="{{ asset('public/js/custom.js') }}"></script>
<script src="{{ asset('public/js/screenfull.js') }}"></script>

 <!-- jquery-confirm files -->
 <link rel="stylesheet" type="text/css" href="{{ asset('public/jquery-confirm-master/css/jquery-confirm.css ') }}"/>
 <script type="text/javascript" src="{{ asset('public/jquery-confirm-master/js/jquery-confirm.js') }}"></script>

<!-- Pie Chart -->
<script src="{{ asset('public/js/pie-chart.js') }}" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- skycons-icons -->
<script src="{{ asset('public/js/skycons.js') }}"></script>
<!-- //skycons-icons -->
<style type="text/css">
       .CustomTable{
          width: 100%;
          font-size: 15px;
          font-family: 'Muli-Regular';
        }
        .CustomTable td,th{
          padding: 4px;
        }
       .fa-times{font-size:  20px;margin: -3px;color: #ff1313d1;}
        .fa-plus{font-size:  20px;color:#008000bf;}
          

        .CustomFieldCss{
              border-top: 0px;
              border-left: 0px;
              border-right: 0px;
              border-bottom: 1px solid #b9b9b9;
              background-color: transparent;
              width: 100%;
        }
        legend{font-size: 18px;}
</style>
</head>
<body>
<div id="wrapper">
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1><a class="navbar-brand" href="#" style="padding: 14px 0px;background:white;border-bottom:1px solid #f4a460;">
               	<center id="logo"><img src="{{ asset('public/images/cv_logo.png') }}" style="width: 80px;margin-top:  -18px;">
               </center></a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	<div class="clearfix"> </div>
           </div>
     	
       
		    <div class="drop-men" >
		        <ul class=" nav_1">
		           <li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">{{ $UserInfo->FirstName.' '.$UserInfo->LastName }}<i class="caret"></i></span>

                    @if (Storage::disk('public')->has($UserInfo->UserImage))
                     <img src="<?=asset('storage/app/public').'/'.$UserInfo->UserImage;?>" id="ProfilePic" style="height: 60px;width: 60px;margin-right: 15px;">
                    @else
                        <img src="{{ asset('public/images/User.png') }}" alt="" id="ProfilePic" style="height: 60px;width: 60px;margin-right: 15px;">
                    @endif 
                    <ul class="dropdown-menu " role="menu">
                        <li><a href="#" onclick="AjaxPage('{{ route('ViewProfile') }}')" ><i class="fa fa-user"></i>View Profile</a></li>
		                <li><a href="#" onclick="AjaxPage('{{ route('EditProfile').'/'.$UserInfo->UserId }}')" ><i class="fa fa-user"></i>Edit Profile</a></li>
		                <li><a href="{{ route('Logout') }}"><i class="fa fa-clipboard"></i>Sign Out</a></li>
		              </ul>
		            </li>
		           
		        </ul>
		     </div>
		      <!-- /.navbar-collapse  -->
			<div class="clearfix">
       
     </div>
	  
		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
				          <?php
                
                    $sHTML='';
                    $sHTML1='';
                    $bSubMenu =FALSE;
                    foreach($jModulesJson as $ObjModule)
                    {
                        if(count($ObjModule->SubMenues) > 0)
                        {
                           
                            $sRolesKey = "aUserRoles_CVMaster_".$ObjModule->Module;
                            if(!empty($aUserRoles) AND isset($aUserRoles->$sRolesKey))
                            {
                                    if($aUserRoles->$sRolesKey[0] == 1) 
                                    {
                                            $sHTML .='<li>
                                            <a href="#" id="'.preg_replace('/\s+/', ' ', $ObjModule->ModuleName).'" '.( $ObjModule->RouteName !="#" ? 'onclick="AjaxPage(\''.route($ObjModule->RouteName).'\');"' : '').'  class="hvr-bounce-to-right nolink"><i class="'.$ObjModule->Icon.'"></i><span class="nav-label">'.$ObjModule->ModuleName.'</span><span class="fa arrow"></span> </a>
                                            <ul class="nav nav-second-level">';
                                            
                                                foreach ($ObjModule->SubMenues as $ObjSubMenu) {
                                                        $sRolesKey =  "aUserRoles_CVMaster_".$ObjModule->Module."_".$ObjSubMenu->Module;
                                                        if(!empty($aUserRoles) AND isset($aUserRoles->$sRolesKey)){
                                                            
                                                            if($aUserRoles->$sRolesKey[0] == 1)
                                                            $sHTML .='  <li><a href="#" id="'.preg_replace('/\s+/', ' ', $ObjSubMenu->ModuleName).'" '.( $ObjSubMenu->RouteName !="#" ? 'onclick="AjaxPage(\''.route($ObjSubMenu->RouteName).'\');"' : '').' class=" hvr-bounce-to-right"><i class="'.$ObjSubMenu->Icon.'"></i>'.$ObjSubMenu->ModuleName.'</a></li>';
                                                        }
                                                }
                                            $sHTML .='</ul></li>';
                                    }
                            }
                        }
                        else
                        {   
                            $sRolesKey = "aUserRoles_CVMaster_".$ObjModule->Module;
                            if(!empty($aUserRoles) AND isset($aUserRoles->$sRolesKey)){
                                
                                if($aUserRoles->$sRolesKey[0] == 1)
                                $sHTML .=' <li><a href="#" id="'.preg_replace('/\s+/', ' ', $ObjModule->ModuleName).'" '.( $ObjModule->RouteName !="#" ? 'onclick="AjaxPage(\''.route($ObjModule->RouteName).'\');"' : '').'  class=" hvr-bounce-to-right"><i class="'.$ObjModule->Icon.'"></i><span class="nav-label">'.$ObjModule->ModuleName.'</span> </a></li>';
                        
                            }
                        }
                    }
                    print($sHTML);
                  ?>
                </ul>
            </div>
			</div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="content-main">
				<div  id="ContentDiv">
                          
                    
				</div>
 			<div class="copy">
	            <p> &copy; {{ date('Y') }} CV Master. All Rights Reserved | Developed by <a href="https://www.facebook.com/Iam.AdeelAhmedBaloch/" target="_blank">Adeel Ahmed</a> </p>
	        </div>
			</div>
		</div>
	   <div class="clearfix"> </div>
   </div>

<!--scrolling js  -->
	<script src="{{ asset('public/js/jquery.nicescroll.js') }}"></script>
	<script src="{{ asset('public/js/scripts.js') }}"></script>
	<!-- scrolling js -->
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>

        @if($UserInfo->IsNewUser == 1) 
            <script type="text/javascript">
                $.alert({
                                title: 'Welcome To CV Master.!',
                                content: "{{ $UserInfo->FirstName.' '.$UserInfo->LastName }}",
                                icon: 'fa fa-smile-o',
                                buttons: {
                                    ok: function () {
                                    
                                    $.ajax({
                                        url:"{{ route('IsNewUser') }}",
                                        type:"POST",
                                        data:{"_token":"{{ csrf_token() }}"},
                                        success:function(data){
                                            // alert(data);
                                        }
                                    });
                                    },
                                },
                                theme: 'modern',
                                closeIcon: true,
                                animation: 'scale',
                                type: 'blue',
                        });
            </script>   
        @endif
    <script type="text/javascript">
                        
       $(document).ready(function(){ AjaxPage("{{ route("Dashboard") }}"); });
      function AjaxPage(Url) {
        $("#ContentDiv").html('<center><img src="{{ asset("public/images/loading1.gif") }}" class="img img-response" style="width: 250px;"></center>');
          $.ajax({
            url:Url,
            type:"GET",
            success:function(response){
              $("#ContentDiv").html(response);
            }
          });
      }
    </script>
  
</body>
</html>

