

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/highcharts/highcharts.js"></script>
		
		<!-- 1a) Optional: add a theme file -->
		<script type="text/javascript" src="js/highcharts/themes/dark-blue.js"></script>
		

		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->

		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'spline'
					},
					title: {
						text: 'Hour by Hour Wind Speed Chart for Day:  23/10/2014'
					},
					subtitle: {
						text: 'Buenos Aires, Argentina'
					},
					xAxis: {
						categories: ['22:00', '23:00']
					},
					yAxis: {
						title: {
							text: 'Wind Speed'
						},
						labels: {
							formatter: function() {
								return this.value +' mph'
							}
						}
					},
					tooltip: {
						enabled: true,
						formatter: function() {
							return '<b>'+ this.series.name +'</b><br/>'+
								this.x +': <b>'+ this.y +'</b> mph';
						}
					},
					plotOptions: {
						spline: {
							marker: {
								radius: 4,
								lineColor: '#666666',
								lineWidth: 1
							}
						}
					},
					series: [{
						name: 'Wind Speed',
						marker: {
							symbol: 'square'
						},
						data: [9, 9]
				
					}]
				});
				
				
			});
				
		</script>		
	</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width: 900px; height: 400px; margin: 0 auto"></div>
		
				
	</body>
</html>


