<!DOCTYPE html>
<html>
	<head>
		<title>Data Vizualisation - TP1</title>
		<!-- Inclusion CSS (librairie + perso) -->
		<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css">
		<link rel="stylesheet" type="text/css" href="css/dataviz.css">
		
		<!-- Inclusion JS (librairie + scripts de création de graph) -->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.jqplot.min.js"></script>
		<script type="text/javascript" src="js/dataviz.js"></script>
		
		<!-- Renderer : Utilisés pour générer les graphiques, n'inclure QUE ce dont vous avez besoin -->
		<script type="text/javascript" src="js/renderer/jqplot.pieRenderer.js"></script>

		<!-- Chart3 -->	
		<script type="text/javascript" src="js/renderer/jqplot.barRenderer.js"></script>
		<script type="text/javascript" src="js/renderer/jqplot.pieRenderer.js"></script>
		<script type="text/javascript" src="js/renderer/jqplot.categoryAxisRenderer.js"></script>
		<script type="text/javascript" src="js/renderer/jqplot.pointLabels.js"></script>

		<!-- D3 -->
		<script type="text/javascript" src="js/d3/d3.min.js"></script>

	</head>
	<body>
		<?php include ('structure/header.php'); ?>
		<div id="content">
			<h1>Chart exemple</h1>
			<div id="exemple_pie_chart"></div>

			<h1>Chart1: </h1>
			<div id="chart1"></div>
			
			<h1>Chart2: </h1>
			<div id="chart2"></div>

			<h1>Chart3: </h1>
			<div id="chart3"></div>

			<h1>Chart4: </h1>
			<div id="chart4"></div>

			<h1>Chart D3: </h1>
			<div id="d3" style="text-align: center">
				
			</div>

		</div>
		<?php include ('structure/footer.php'); ?>
	</body>
	<script type="text/javascript">
		var dataset = [5, 11, 15, 20, 25];

		d3.select("#d3").selectAll("p")
						.data(dataset)
						.enter()
						.append("i")
						.style("height", function(d){
								return d * 5 + "px";
							})
						.style("background-color", function(d){
								return "rgb("+ d +"0, 0," + d * 3 + " )";
							})
						.attr("class", "d3-bar");
	</script>
</html>