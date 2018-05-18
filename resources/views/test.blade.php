
			<div id="results"></div>
			  <script src="{{ asset('public/js/jquery.min.js') }}"></script>
				<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
			<script type="text/javascript">
				jQuery(document).ready(function(){
				    jQuery.get("http://ipinfo.io/202.88.237.138", function (response)
				               {
				                   var lats = response.loc.split(',')[0]; 
				                   var lngs = response.loc.split(',')[1];

				                   alert(lats+' '+lngs);
				                   // map = new GMaps({
				                   //     el: '#map',
				                   //     lat: lats, //latitude
				                   //     lng: lngs //longitude
				                   // });

				               }, "jsonp");
				});
			</script>