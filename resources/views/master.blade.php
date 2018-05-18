 <!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resume Ganerator</title>
<!-- Latest compiled and minified CSS -->


<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/jsgrid/css/jsgrid.css') }}" />
<link rel="stylesheet" type="text/css"  media="all" href="{{ asset('public/jsgrid/css/theme.css') }}" />
    <!-- Sweet alerts Librart-->
<script src="{{ asset('public/libs/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js') }}"></script>
<style type="text/css">
  
            #LoadingBackgroundDiv{
                background-image: url("{{ asset('public/images/cv_logo.png') }}"); 
                background-attachment: fixed;
                background-size: 150px;
                background-position: center;
                background-position-y: 180px;
                background-repeat: no-repeat;
            }
           .navbar, .jsgrid-header-row > .jsgrid-header-cell{background-color: #28609038;}   
</style>
</head>
    <body>
                        <nav class="navbar navbar-default"  role="navigation">
                              <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
                                  <a class="navbar-brand" href="#"><img src="{{ asset('public/images/cv_logo.png') }}"  style="width: 64px;height: 49px;margin-top: -15px;"></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                  <ul class="nav navbar-nav">
                                    <li class="test"><a href="#" onclick='AjaxPage("{{ route("ShowGrid") }}");'>Home</a></li>
                                    <li class="test"><a href="#" onclick='AjaxPage("{{ route("ViewNewForm") }}");'>New Resume</a></li>
                                  </ul>
                                  <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">View Profile</a></li>
                                        <li><a href="{{ route('Logout') }}">Logout</a></li>
                                      </ul>
                                    </li>
                                  </ul>
                                </div><!-- /.navbar-collapse -->
                              </div><!-- /.container-fluid -->
                            </nav>
   
    <div class="container">
      <div id="Content">
        <div id="LoadingBackgroundDiv" style="">
          <center><img src="{{ asset('public/images/loading1.gif') }}" class="img img-response" style="width: 340px;"></center>
        </div>
      </div>


    </div>
    <div class="container-fluid text-center">
        <br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-sm-12">
                Copyright © <?=date("Y");?> Designer.baloch2015@gmail.com All Rights Reserved
            </div>
        </div>
    </div>

   <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('public/js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript">
        
      $(document).ready(function(){ AjaxPage("{{ route("ShowGrid") }}"); });
      function AjaxPage(Url) {
          $.ajax({
            url:Url,
            type:"GET",
            success:function(response){
              $("#Content").html(response);
            }
          });
      }
    </script>
     <script type="text/javascript">
                          
                          $("li").on("click",function(){
                             $("li").removeClass("active");
                            $(this).toggleClass("active");
                            // alert("asd");
                          });
                        </script>    
</body>
</html>
