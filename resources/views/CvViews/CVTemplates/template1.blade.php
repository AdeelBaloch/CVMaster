<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <link rel="stylesheet" type="text/css" media="all" href="{{ asset('public/css/bootstrap.min.css') }}" />
   
</head>
<body>
    <a href="#" id="DownloadPdfId" class="btn btn-default pull-right">Download Pdf File</a>
<button id="PrintReportId" onclick="window.print();" class="btn btn-default pull-right">Ganerate Print File</button>
<br><br><br><br><br><br>

    <div class="container">
    
    <table cellspacing="10" cellpadding="10" width="100%" align="center" class="table" id="CVTable">
        <tr>
            <th colspan="2"  style="text-align:right;"><b style="font-size:30px;">Your Name</b><br>Curriculum Vitae</th>
        </tr>
        <tr>
            <th colspan="2" style="border-bottom:2px solid;"><b>Personal Details</b></th>
        </tr>
        <tr>
            <td>Birth</td>
            <td>January 1, 1980</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>111 First St, New York</td>
        </tr>
        <tr>
            <td>Phone</td>
            <td>(123) 000-0000</td>
        </tr>
        <tr>
            <td>Mail</td>
            <td>me@home.com</td>
        </tr>
        <tr>
            <th colspan="2" style="border-bottom:2px solid;"><b>EDUCATION</b></th>
        </tr>
        <tr>
            <th>1 ) MSc. Name of Education</th>
            <th>2010</th>
        </tr>
        <hr>
        <tr style="border-top: 1px solid;">
            <td style="padding-left: 29px;">Name of University  - A-1 Grade</td>
            <th>A-1 Grade</th>
        </tr>
        <tr>
            <th>2 ) MSc. Name of Education</th>
            <th>2010</th>
        </tr>
        <tr>
            <td style="padding-left: 29px;">Name of University  - A-1 Grade</td>
            <th>A-1 Grade</th>
        </tr>
    </table>
    </div>
    <footer>
        <table class="table text-center">
            <tfoot>
                    <tr><td class="text-left">Copyright © 2018 Designer.baloch2015@gmail.com All Rights Reserved</td>
                    <td  class="text-right"><p>Developed By - <a href="https://www.facebook.com/Iam.AdeelAhmedBaloch" target="_blank">Adeel Ahmed</a></p></td></tr>
            </tfoot>
        </table>
    </footer>
    

  <script src="{{ asset('public/js/jquery-3.3.1.js') }}"></script>

<script> 
    $("#PrintReportId").on("click",function(){
        onclick="window.print();" 
        window.print();
    });
</script>

</body>
</html>