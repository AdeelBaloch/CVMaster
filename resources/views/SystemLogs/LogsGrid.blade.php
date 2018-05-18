<div class="banner"><h2><a href="#">Settings</a><i class="fa fa-angle-right"></i><span>System Logs</span></h2></div>
    <div class="typo-grid">
        <div class="typo-1">
            <div class="grid_3 grid_4">
                    
                    <table border="0" cellspacing="0" cellpadding="3" align="center" class="table table-default" id="LogsGrid">
                            
                    </table>           
            </div>
        </div>
    </div>

    <script type="text/javascript">
         
             AjaxRequest('#LogsGrid','{{ route("LogFiles")}}');
             function AjaxRequest(ResponseId,url,value='') 
             {
                $(ResponseId).html('<tr><td colspan="4"><center><img src="{{ asset("public/images/loading1.gif") }}" class="img img-response" style="width: 250px;"></center></td></tr>');
                $.ajax({
                    type: 'GET',
                    url: url,
                    data:{FileName:value},
                    success:function(data){
                      $(ResponseId).html(data);
                    }
                  });
                
              }
    </script>

    <script type="text/javascript">

        function DeleteLogFile(sFileName)
        {

            $.confirm({
                        title: 'Are You Sure..!',
                        content: 'Do you want to Delete Log..?',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            Yes: function () {

                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('DeleteLogFile') }}",
                                    data:{"_token":"{{ csrf_token() }}","sFileName":sFileName},
                                    success:function(response){
                                        if(response ==200){
                                        
                                            $.confirm({
                                                title: 'Success.!',
                                                content: 'Log has been Deleted..',
                                                type: 'green',
                                                typeAnimated: true,
                                                buttons: {
                                                    close: function () {
                                                        AjaxRequest('#LogsGrid','{{ route("LogFiles")}}');
                                                    }
                                                }
                                            });
                                        }else{
                                            $.confirm({
                                                title: 'Faild.!',
                                                content: 'Faild to delete log..',
                                                type: 'red',
                                                typeAnimated: true,
                                                buttons: {
                                                    close: function () {
                                                    }
                                                }
                                            });
                                        }
                                 }
                                });
                                },
                                No: function () {
                                }
                            }
                        });
            
        }      
        function DeleteLogLine(sLog,sFilePath){
        
            $.confirm({
                        title: 'Are You Sure..!',
                        content: 'Do you want to Delete Log..?',
                        type: 'red',
                        typeAnimated: true,
                        buttons: {
                            Yes: function () {

                                $.ajax({
                                    type:'POST',
                                    url:"{{ route('DeleteLog') }}",
                                    data:{"_token":"{{ csrf_token() }}","sLog":sLog,"FilePath":sFilePath},
                                    success:function(response){
                                        if(response ==200){
                                        // $("#tbody_logs").reload();
                                            $.confirm({
                                                title: 'Success.!',
                                                content: 'Log has been Deleted..',
                                                type: 'green',
                                                typeAnimated: true,
                                                buttons: {
                                                    close: function () {
                                                        AjaxRequest('#LogsGrid',"{{ route('ViewLogs') }}",sFilePath);
                                                    }
                                                }
                                            });
                                        }else{
                                            $.confirm({
                                                title: 'Faild.!',
                                                content: 'Faild to delete log..',
                                                type: 'red',
                                                typeAnimated: true,
                                                buttons: {
                                                    close: function () {
                                                    }
                                                }
                                            });
                                        }

                                    //    alert(response)
                                    }
                                });
                                },
                                No: function () {
                                }
                            }
                        });
                        
            }


    </script>
