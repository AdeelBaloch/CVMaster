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
                <tr>
                  <th colspan="3" style="text-align:center;font-weight:bold;font-size:2em;color:#003300;font-family:Calibri;padding:5px;border-top: none;">New Message From CV Master</th>
                </tr>
            </thead>
					<tbody>
                <tr>
                  <td colspan="3" style=" border-top:1px solid;">&nbsp;</td>
                </tr> 
                
                <tr>
                  <td  colspan="3" style="width:360px;vertical-align:top;padding:5px;border-top:none; width:100%;">
                    <b>Dear {{ $Name }}</b>
                      <p>
                      <br>
                      {{ $Message}}
                    </p>
                  
     

                    @if(isset($sLink) AND !empty($sLink))
                      <p> Click following link<br>
                      <a href="{{ $sLink }}"  target="_blank" style="color: black;">Reset Now </a>
                      </p>
                    @endif  
                  
                  </td>
                 </tr>
             </tbody>
              <tfoot>
                <tr>
                <td colspan="3" style="text-align:center;font-size: 10px;border-top: 1px solid;padding: 10px;">
                    CVMaster are receiving this email because your email is signed up to receive CVMaster Communications. If you prefer not to receive any further emails from CVMaster, you can always <a href="unsubScrible" target="_blank" style="color: black;">Unsubscribe</a> from our list.
                  </td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align:center;"><p> © 2018 CV Master. All Rights Reserved | Developed by <a href="www.facebook.com/Iam.AdeelAhmedBaloch" target="_blank" style="color: black;">Adee Ahmed</a> </p></td>
                </tr>


              </tfoot>
						
					</table>
          </div>
        </div>
					
					<div style="clear:both;"></div>
				</div>
			</div>




</body>
</html>