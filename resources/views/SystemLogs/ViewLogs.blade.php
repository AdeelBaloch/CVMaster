<div class="banner"><h2><a href="#">Settings</a><i class="fa fa-angle-right"></i><span>System Logs</span><i class="fa fa-angle-right"></i><span>View Log</span>
<i class="fa fa-angle-right"></i><span>{{$FileName}}</span></h2></div>
    <div class="typo-grid">
        <div class="typo-1">
            <div class="grid_3 grid_4">
                   
                   <table border="0" cellspacing="0" cellpadding="3" align="center" class="table table-default">
                    <thead> 
                    <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>UserId</th>
                            <th>User Name</th>
                            <th>IP Address </th>
                            <th>User Log</th>
                            <th>Action</th>
                     </tr>
                     </thead>
                     <tbody id="tbody_logs">
                        <?php
                                $HTML='';
                                $sFilePath = 'storage/SystemsLogs/' . $FileName;
                                $sLogContents = ltrim(file_get_contents($sFilePath),"|");
                                
                                $aLogContents = explode("|",$sLogContents);
                                for ($i=0; $i < count($aLogContents) ; $i++)
                                { 
                                    $aLog = explode(',',$aLogContents[$i]);
                                    
                                    $HTML .= '<tr>'; 
                                        
                                    for ($a=0; $a < count($aLog); $a++)
                                        $HTML .= '<td>' . $aLog[$a] .'</td>';
                                        
                                        $sLog=  trim(preg_replace('/\s\s+/', ' ', "|".$aLogContents[$i]));
                                        $HTML .= '<td><a href="#" onclick="DeleteLogLine(\''.$sLog.'\');" ><i class="fa fa-trash" style="font-size: 16px;color: red;"></i></a></td></tr>'; 
                                }
                                print  $HTML;
                        ?>
                     </tbody>
                     </table>
            </div>
        </div>
    </div>

  
