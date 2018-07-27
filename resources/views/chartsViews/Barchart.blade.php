<script src="{{ asset('public/libs/Highcharts/code/highcharts.js') }}"></script>
<script src="{{ asset('public/libs/Highcharts/code/modules/exporting.js') }}"></script>
<script src="{{ asset('public/libs/Highcharts/code/modules/export-data.js') }}"></script>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


<script>
    
Highcharts.chart('container', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Monthly Average Rainfall'
  },
  subtitle: {
    text: 'Source: WorldClimate.com'
  },
  xAxis: {
    categories: [
      'Dadu',
      'Hyderabad',
      'Jacobabad',
      'Jamshoro'
  ],
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Rainfall (mm)'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  // plotOptions: {
  //   column: {
  //     // pointPadding: 0.2,
  //     // borderWidth: 0
  //   }
  // },
  series: [
            { name: 'Tokyo',data: [499, 715, 1064]}, 
            { name: 'New York', data: [836, 788, 985]}, 
            { name: 'London', data: [489, 388, 393]}, 
            { name: 'Berlin', data: [424, 332, 345]}
          ]
});
</script>