
<?php
	$userName = "ishridharhegde";
	include "$userName\\tweetGenre.php";
	include "$userName\\tweetTimeBlock.php";
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


var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Number of Tweets vs Time of the Day"
	},
	subtitles: [{
		text: "2007 - 2016"
	}],
	axisY: {
		title: "Number of Tweets",
		suffix: " Tweets",
		includeZero: false
	},
	data: [{
		type: "stepArea",
		xValueType: "dateTime",
		xValueFormatString: "YYYY",
		yValueFormatString: "#,##0 Tweets",
		dataPoints: <?php echo json_encode($dataPoints2); ?>
	}]
});

chart2.render();




}
</script>






</head>
<body>


<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>


</body>
</html>
