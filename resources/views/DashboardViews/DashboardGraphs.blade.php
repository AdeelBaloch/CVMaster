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
<div class="banner"><h2><a href="#">Home</a><i class="fa fa-angle-right"></i><span>Dashboard</span></h2></div>
		
		<div class="content-top">
			<div class="col-md-4">
				<div class="content-top-1">
						<div class="col-md-6 top-content">
							<h5>Total</h5>
							<label>{{ $TotalCv }}</label>
						</div>
						<div class="col-md-6 top-content1">	   
							<div id="demo-pie-1" class="pie-title-center" data-percent="<?php if($TotalCv !=0) { print($TotalCv / $TotalCv * 100);}else{ print("0"); } ?>"> <span class="pie-value">25%</span> <canvas height="100" width="100" style="margin-top:-85px;"></canvas></div>
						</div>
						 <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 content-top-2">
				<div class="content-top-1">
						<div class="col-md-6 top-content">
							<h5>Saved</h5>
							<label>{{ $TotalSavedCv }}</label>
						</div>
						<div class="col-md-6 top-content1">	   
							<div id="demo-pie-2" class="pie-title-center" data-percent="<?php if($TotalSavedCv !=0) { print($TotalSavedCv / $TotalCv * 100); }else{ print("0"); } ?>"> <span class="pie-value">50%</span> <canvas height="100" width="100" style="margin-top:-85px;"></canvas></div>
						</div>
						 <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 content-top-2">
				<div class="content-top-1">
						<div class="col-md-6 top-content">
							<h5>Deleted</h5>
							<label>{{ $TotalDeletedCv }}</label>
						</div>
						<div class="col-md-6 top-content1">	   
							<div id="demo-pie-3" class="pie-title-center" data-percent="<?php if($TotalDeletedCv !=0){ print($TotalDeletedCv / $TotalCv * 100); }else{ print("0"); } ?>"> <span class="pie-value">75%</span> <canvas height="100" width="100" style="margin-top:-85px;"></canvas></div>
						</div>
						 <div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	
		


