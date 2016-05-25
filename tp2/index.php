<!DOCTYPE html>
<html>
<head>
	<title>TP 2 - D3</title>
	<script type="text/javascript" scr="d3.min.js"></script>
</head>
<body>
	<div id="d3">
		
	</div>
</body>

<script type="text/javascript">
	
	var svg = d3.select("#d3")
				.append("svg")
				.attr("width", 500)
				.attr("height", 50);

	var dataset = [ 
					[5, 20],
					[480, 90],
					[250, 50],
					[100, 33],
					[330, 95],
					[410, 12],
					[475, 44],
					[25, 67],
					[85, 21],
					[220, 88],
				  ];
</script>
</html>