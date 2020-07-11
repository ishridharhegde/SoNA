  <?php session_start();
    include 'config.php';
    if(isset($_SESSION['id']))
  {
     $_SESSION['clicked'] = $_COOKIE['clicked'];
     $user = $_SESSION['clicked'];
     include(dirname(__FILE__)."/output/$user/Combined/frequency_text_label.php");
     include(dirname(__FILE__)."/output/$user/Combined/hour_frequency.php");
     include(dirname(__FILE__)."/output/$user/Combined/Like_count_per_topic_text_label.php");
     include(dirname(__FILE__)."/output/$user/Combined/positiveNegativeTextLabel.php");
     include(dirname(__FILE__)."/output/$user/Combined/windowMaxTextLabel.php");
     include(dirname(__FILE__)."/output/$user/Combined/hashtagCount.php");
    ?>

  <html lang="en">
  <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
      theme: "light2",
    	title: {
    		text: "Post count under different categories",
        fontSize: 35,
    	},
    	data: [{
    		type: "pyramid",
    		indexLabel: "{label} - {y}",
        indexLabelFontSize: 18,
    		yValueFormatString: "#,##0 posts",
    		dataPoints: <?php echo json_encode($frequency_label, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();

    var chart2 = new CanvasJS.Chart("chartContainer2", {
  	animationEnabled: true,
    theme: "light2",
  	title:{
  		text: "Hour Frequency of posts/tweets",
      fontSize: 35,
  	},
  	axisY: {
  		title: "Number of posts/tweets",
      titleFontSize: 18,
      labelFontSize: 16,
  	},
    axisX: {
      title: "Time slot",
      titleFontSize: 18,
      interval: 1,
      labelFontSize: 14,
    },
  	data: [{
  		type: "bar",
  		yValueFormatString: "#,##0 posts",
  		indexLabel: "{y}",
  		indexLabelPlacement: "inside",
  		indexLabelFontColor: "white",
      indexLabelFontSize: 12,
  		dataPoints: <?php echo json_encode($hour_frequency, JSON_NUMERIC_CHECK); ?>
  	}]
  });
  chart2.render();


  var chart3 = new CanvasJS.Chart("chartContainer3", {
  	animationEnabled: true,
  	theme: "light2",
  	title:{
  		text: "Like count per topic",
      fontSize: 35,
  	},
  	axisY: {
  		title: "Number of likes"
  	},
  	data: [{
  		type: "column",
  		yValueFormatString: "#,##0.##",
  		dataPoints: <?php echo json_encode($likeCountPerTopic, JSON_NUMERIC_CHECK); ?>
  	}]
  });
  chart3.render();


  var chart4 = new CanvasJS.Chart("chartContainer4", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
      text: "Positive, negative and neutral tags for all posts across all topics",
      fontSize: 35,
    },
    axisX:{
      reversed: true
    },
    toolTip:{
      shared: true
    },
    data: [{
      type: "stackedBar",
      name: "Positive",
      dataPoints: <?php echo json_encode($positive, JSON_NUMERIC_CHECK); ?>
    },{
      type: "stackedBar",
      name: "Negative",
      dataPoints: <?php echo json_encode($negative, JSON_NUMERIC_CHECK); ?>
    },{
      type: "stackedBar",
      name: "Neutral",
      indexLabel: "#total",
      indexLabelPlacement: "outside",
      indexLabelFontSize: 15,
      indexLabelFontWeight: "bold",
      dataPoints: <?php echo json_encode($neutral, JSON_NUMERIC_CHECK); ?>
    }]
  });
  chart4.render();


  var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	exportEnabled: true,
  theme: "light2",
	title:{
		text: "Hashtag usage count"
	},
	subtitles: [{
		text: "Gives the count of all the hashtags used by the person"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "#,##0 times",
		dataPoints: <?php echo json_encode($hashtagCount, JSON_NUMERIC_CHECK); ?>
	}]
});
chart5.render();

    }

    </script>


    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>

      <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        .chart--container {
          height: 100%;
          width: 100%;
          min-height: 530px;
        }

        .zc-ref {
          display: none;
        }
      </style>


  </head>
  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
      <div class="container d-flex">

        <div class="logo mr-auto">
          <h1 class="text-light"><a href="home.php"><span>SoNA</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>



        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active">
              <a href="home.php">Home</a>
              <li class="drop-down"><a href="">ACCOUNT</a>
                <ul>
                  <li><a href="profile.php">Profile</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
            </li>
          </ul>
        </nav><!-- .nav-menu -->
    </header><!-- End Header -->



  <main>



    <div class="faq">

          <h1 style="margin-top: 20px; text-align: center;">Analysis for <b> <?PHP echo($user); ?> </b></h1>

    <div class="container">

    <!-- CARD -->
      <div class="page-wrapper bg-dark p-t-100 p-b-50">
          <div class="wrapper wrapper--w900">
              <div class="card card">
                  <div class="card-body">
                    <!-- CARD BODY -->
                    <div id="chartContainer4" style="height: 450px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                  </div>
              </div>
          </div>
      </div> <!-- CARD END -->

        <!-- CARD -->
        <div class="page-wrapper bg-dark p-t-100 p-b-50">
            <div class="wrapper wrapper--w900">
                <div class="card card">
                    <div class="card-body">
                      <!-- CARD BODY -->
                      <div id="chartContainer2" style="height: 600px; width: 100%;"></div>
                      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                </div>
            </div>
        </div> <!-- CARD END -->

        <!-- CARD -->
          <div class="page-wrapper bg-dark p-t-100 p-b-50">
              <div class="wrapper wrapper--w900">
                  <div class="card card">
                      <div class="card-body">
                        <!-- CARD BODY -->
                        <div id="chartContainer3" style="height: 450px; width: 100%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                      </div>
                  </div>
              </div>
          </div> <!-- CARD END -->




            <!-- CARD -->
              <div class="page-wrapper bg-dark p-t-100 p-b-50">
                  <div class="wrapper wrapper--w900">
                      <div class="card card">
                          <div class="card-body">
                            <!-- CARD BODY -->
                            <div id="chartContainer5" style="height: 450px; width: 100%;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                            </div>
                      </div>
                  </div>
              </div> <!-- CARD END -->


              <!-- CARD -->
                <div class="page-wrapper bg-dark p-t-100 p-b-50">
                    <div class="wrapper wrapper--w900">
                        <div class="card card">
                            <div class="card-body">
                              <!-- CARD BODY -->
                              <div id="chartContainer" style="height: 600px; width: 100%;"></div>
                              <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                            </div>
                        </div>
                    </div>
                </div> <!-- CARD END -->


            <!-- CARD -->
              <div class=" bg-dark p-t-100 p-b-50">
                  <div class="wrapper wrapper--w900">
                      <div class="card card">
                          <div class="card-body">
                            <!-- CARD BODY -->
                            <div id="myChart" class="chart--container">
                              <a href="https://www.zingchart.com/" rel="noopener" class="zc-ref">Powered by ZingChart</a>
                            </div>
                          </div>
                      </div>
                  </div>
              </div> <!-- CARD END -->

      </div>
            </div>


    <script>
      ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"]; // CHART CONFIG

      // -----------------------------
      let chartConfig = {
        globals: {
          fontFamily: 'Roboto'
        },
        height: "800px",
        graphset: [{
          type: 'piano',
          theme: 'classic',
          backgroundColor: '#fff',
          title: {
            text: 'Number of posts per topic in given time slot across all posts',
            adjustLayout: true,
            paddingBottom: '25px',
            backgroundColor: 'none',
            fontColor: '#05636c',
            fontSize: '24px'
          },
          subtitle: {
            text: 'This graph gives the values of the number of posts/tweet per topic at a specific time slot in the form a beautiful heatmap.',
            backgroundColor: 'none',
            fontColor: '#05636c',
            fontSize: '14px',
            height: '25px',
            x: '-9.5px',
            y: '38.5px'
          },
          legend: {
            align: 'center',
            borderWidth: '0px',
            footer: {
              backgroundColor: 'none',
              borderColor: 'none',
              fontColor: '#05636c',
              fontSize: '14px',
              textAlign: 'center'
            },
            item: {
              borderColor: 'none',
              fontColor: '#05636c',
              size: '13px'
            },
            layout: 'x6',
            marker: {
              type: 'square',
              borderColor: 'none',
              borderRadius: '8px',
              size: '13px'
            },
            shadow: false,
            toggleAction: 'none',
            verticalAlign: 'bottom',
            width: '80%'
          },
          plot: {
            tooltip: {
              text: '%v posts',
              fontColor: 'white',
              fontSize: '14px',
              textAlign: 'left'
            },
            aspect: 'none',
            borderColor: '#eeeeee',
            borderRadius: '7px',
            borderWidth: '2px',
            rules: [{
                backgroundColor: '#081D58',
                fontColor: '#05636c',
                rule: '%node-value > 50'
              },
              {
                backgroundColor: '#253494',
                fontColor: '#05636c',
                rule: '%node-value > 40  && %node-value <= 50'
              },
              {
                backgroundColor: '#225EA8',
                fontColor: '#05636c',
                rule: '%node-value > 30 && %node-value <= 40'
              },
              {
                backgroundColor: '#1D91C0',
                fontColor: '#05636c',
                rule: '%node-value > 20 && %node-value <= 30'
              },
              {
                backgroundColor: '#41B6C4',
                fontColor: '#05636c',
                rule: '%node-value > 10 && %node-value <= 20'
              },
              {
                backgroundColor: '#7FCDBB',
                fontColor: '#05636c',
                rule: '%node-value >= 0 && %node-value <= 10'
              }
            ]
          },
          plotarea: {
            margin: 'dynamic'
          },
          scaleX: {
            values: ['0-3','3-6','6-9','9-12','12-15','15-18','18-21','21-24'],
            guide: {
              visible: false
            },
            item: {
              borderColor: 'none',
              fontColor: '#05636c',
              size: '13px'
            },
            lineWidth: '0px',
            placement: 'opposite',
            tick: {
              visible: false
            },
            zooming: true,
            zoomSnap: true
          },
          "scale-y": {
            values: ["Fashion","Politics",'Sports','Gaming','Travel','Technology','Books','Music','Business','Vehicles','Space','Food','Movie','Medicine','Others'],
            guide: {
              visible: false,
            },
            item: {
              borderColor: 'none',
              fontColor: '#05636c',
              size: '13px',
            },
            lineWidth: '0px',
            mirrored: true,
            tick: {
              visible: false
            },
            zooming: true
          },
          zoom: {
            alpha: 0.75,
            backgroundColor: '#e5e8ea',
            borderColor: '#009',
            borderWidth: '2px',
            preserveZoom: true
          },
          scrollX: {
            bar: {
              alpha: .5,
              backgroundColor: '#01579B',
              borderRadius: '3px'
            },
            handle: {
              backgroundColor: '#01579B',
              borderRadius: '5px',
              borderTop: 'none',
              borderRight: 'none',
              borderBottom: 'none',
              borderLeft: 'none'
            }
          },
          scrollY: {
            bar: {
              alpha: .5,
              backgroundColor: '#01579B',
              borderRadius: '3px'
            },
            handle: {
              backgroundColor: '#01579B',
              borderRadius: '5px',
              borderTop: 'none',
              borderRight: 'none',
              borderBottom: 'none',
              borderLeft: 'none'
            }
          },
          series: [{
              text: '0-10 Posts',
              values: <?php echo json_encode($Fashion, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#7FCDBB'
              }
            },
            {
              text: '10-20 Posts',
              values: <?php echo json_encode($Politics, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#41B6C4'
              }
            },
            {
              text: '20-30 Posts',
              values: <?php echo json_encode($Sports, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#1D91C0'
              }
            },
            {
              text: '30-40 Posts',
              values: <?php echo json_encode($Gaming, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#225EA8'
              }
            },
            {
              text: '40-50 Posts',
              values: <?php echo json_encode($Travel, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#253494'
              }
            },
            {
              text: '>50 Posts',
              values: <?php echo json_encode($Technology, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#081D58'
              }
            },
            {
              values: <?php echo json_encode($Books, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Music, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Vehicles, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Business, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Space, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Food, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Medicine, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Movie, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
            {
              values: <?php echo json_encode($Others, JSON_NUMERIC_CHECK); ?>,
              legendMarker: {
                backgroundColor: '#e8505b'
              },
              legendItem: {
                visible: false
              }
            },
          ]
        }]
      };

      // RENDER CHARTS
      // -----------------------------
      zingchart.render({
        id: 'myChart',
        data: chartConfig
      });
    </script>



  </main>


  </body>
  </html>




  <?php }
  else { ?>

    <div>
      <h1> Are you a hacker? </br> You are not signed in! </br> <a href="login.php" style="margin: 10px;" class="btn btn-primary">Login</a> </h1>
    </div>

    <style>
    div {

    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    text-align: center;
  }
    </style>

  <?php } ?>
