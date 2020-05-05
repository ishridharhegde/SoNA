<?php

?>

<html>
<head>
<!-- Donut Chart Code -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
          var data = google.visualization.arrayToDataTable([
            ['Category', 'Tweet Percentage'],
            ['Politics',     11],
            ['Entertainment',      8],
            ['Travel',  2],
            ['Movies', 4],
            ['Photography',    3]
          ]);

          var options = {
            title: 'Tweet Categorization',
            is3D: true,
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
          chart.draw(data, options);
        }

//  Bar Graph Code

        google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTitleSubtitle);

function drawTitleSubtitle() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Number of Tweets');

      data.addRows([
        [{v: [12, 0, 0], f: '12 am'}, 23],
        [{v: [1, 0, 0], f: '1 am'}, 19],
        [{v: [2, 0, 0], f: '2 am'}, 8],
        [{v: [3, 0, 0], f: '3 am'}, 9],
        [{v: [4, 0, 0], f: '4 am'}, 3],
        [{v: [5, 0, 0], f: '5 am'}, 4],
        [{v: [6, 0, 0], f: '6 am'}, 6],
        [{v: [7, 0, 0], f: '7 am'}, 2],
        [{v: [8, 0, 0], f: '8 am'}, 8],
        [{v: [9, 0, 0], f: '9 am'}, 14],
        [{v: [10, 0, 0], f:'10 am'}, 19],
        [{v: [11, 0, 0], f: '11 am'}, 19],
        [{v: [12, 0, 0], f: '12 pm'}, 12],
        [{v: [13, 0, 0], f: '1 pm'}, 16],
        [{v: [14, 0, 0], f: '2 pm'}, 27],
        [{v: [15, 0, 0], f: '3 pm'}, 25],
        [{v: [16, 0, 0], f: '4 pm'}, 33],
        [{v: [17, 0, 0], f: '5 pm'}, 50],
        [{v: [18, 0, 0], f: '6 pm'}, 56],
        [{v: [19, 0, 0], f: '7 pm'}, 76],
        [{v: [20, 0, 0], f: '8 pm'}, 93],
        [{v: [21, 0, 0], f: '9 pm'}, 293],
        [{v: [22, 0, 0], f: '10 pm'}, 454],
        [{v: [23, 0, 0], f: '11 pm'}, 321],
      ]);

      var options = {
        chart: {
          title: 'Tweet throughout the day',
        },
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'No. Of Tweets'
        }
      };

      var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
      materialChart.draw(data, options);
    }

//Bubble Chart code
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['ID', 'Retweets', 'Tweets'],
        ['GameOfThrones',    80,              12],
        ['NaMo',    95,              15],
        ['RaGa',    22,               13],
        ['CAA_NRC',    150,              22],
        ['LehLadakh',    55,              19],
        ['Foodie',    72,              15],
        ['BLR',    68,              4],
        ['JaiHind',    81,              27],
        ['USA_Elections',    68,               76],
        ['Karnataka',    79,              31]
      ]);

      var options = {
        title: 'Hashtags Usage in Tweets',
        hAxis: {title: 'Retweets'},
        vAxis: {title: 'Tweets'},
        bubble: {textStyle: {fontSize: 11}}      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }



    data = loadJSON("ishridharhegde.json")


    </script>

</head>

<body>

<h1> Hello Shridhar. Welcome back! </h1>

<h3>Here is your social media analysis! Have a look. </h3>

  <div id="piechart_3d" style="width: 900px; height: 500px;"></div>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div" style="width: 1000px; height: 600px;"> </div>


<div id="series_chart_div" style="width: 900px; height: 500px;"></div>


</body>

</html>
