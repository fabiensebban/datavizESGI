$(document).ready(function(){
	// Pas de cache sur les requête IMPORTANT !
	$.ajaxSetup({ cache: false });
	
	/*** 
		On définit ici les fonctions de base qui vont nous servir à la récupération des données
		Je ne définis que le GET ici, mais il est possible d'utiliser POST pour récupérer ses données (on le verra dans un prochain TP)
	****/
	function getRequest(url, callback) {
		$.get(url, function(data) {
			data = $.parseJSON(data);
			callback(data);
		});
	}
	
	// Fonction pour générer un Pie Chart (on peut entièrement paramétré le tout)
	// WARNING : Pour le reload, on doit stocker la référence (ici plot1), donc ce système de fonction ne peut pas marcher, il faudra le changer.
	function generatePieChart(idDiv, data) {
		// On génère l'exemple du TP :
		var plot1 = $.jqplot(idDiv, [data], {
			gridPadding: {top:0, bottom:38, left:0, right:0},
			seriesDefaults:{
				renderer:$.jqplot.PieRenderer, 
				trendline:{ show:false }, 
				rendererOptions: { padding: 8, showDataLabels: true }
			},
			legend:{
				show:true, 
				placement: 'inside', 
				rendererOptions: {
					numberRows: 3
				}, 
				location:'ne',
				marginTop: '15px'
			}       
		});
	}

	function generateGroupBarChart(idDiv, data){
		$.jqplot.config.enablePlugins = true;
        var months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet'];

        var plot1 = $.jqplot(idDiv, [data], {
            // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
            animate: !$.jqplot.use_excanvas,
            seriesDefaults:{
                renderer:$.jqplot.BarRenderer,
                pointLabels: { show: true }
            },
            axes: {
                xaxis: {
                    renderer: $.jqplot.CategoryAxisRenderer,
                    ticks: months
                }
            },
            highlighter: { show: false }
        });
     
        $(idDiv).bind('jqplotDataClick', 
            function (ev, seriesIndex, pointIndex, data) {
                $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
            }
        );
	}
	
	// On appelle le webservice local, possibilité d'ajouter des paramètre get dans l'URL exploitable dans le script qui génère les données
	getRequest('php/exemple.php', function(data) {
		console.log(data);
		generatePieChart('exemple_pie_chart', data);
	});

	getRequest('php/chart3.php', function(data) {
		console.log(data);
		generateGroupBarChart('chart3', data)
	});
		
});