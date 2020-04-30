
<?php
	$userName = "ishridharhegde";
	include "$userName\\tweetGenre.php";
?>

<!DOCTYPE HTML>
<html>
<head>



<script>
//Script for number of tweet for each Genre
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	title:{
		text: "Tweet Counts and Genre"
	},
	subtitles: [{
		text: "Tweet Genre and the number of tweets given"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",

		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>






</head>
<body>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>


</body>
</html>
