<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <title>My CV Master Email</title>
</head>
<body>
  

			
			<div>
			
				<br/><br/>
				
				<div style="width:98%;" class="container">
						
				<div class="row">
          <div class="col-sm-12">
          <table align="center" class="table table-responsive" style=" width:100%;">
            <thead>
                <tr>
                  <td colspan="3" align="center"><img src="{{ asset('public/images/cv_logo.png') }}" width="150px;" border="0" alt="CVMaster" title="CVMaster" /></td>
                </tr> 
                
            </thead>
					<tbody>
                <tr>
                  <td colspan="3"  style="border-top: none;">&nbsp;</td>
                </tr> 
                <tr>
                  <td colspan="3"  style="border-top: none;">&nbsp;</td>
                </tr> 
                <tr>
                    <th colspan="3" style="text-align:center;font-weight:bold;font-size:2em;color:#003300;font-family:Calibri;padding:5px;border-top: none;">
                    <div class="alert alert-danger" role="alert">
                      @if($Error == 'AccessToken') 
                          Access token has expired
                      @elseif($Error == 'SystemError')
                          Sorry, something went to wrong
                      @elseif($Error == 'AuthFaild')
                          Unable to authenticate. <br> please try again
                      @endif  
                    </div></th>
                  </tr>
             </tbody>
        	</table>
          </div>
        </div>
					
					<div style="clear:both;"></div>
				</div>
			</div>




</body>
</html>