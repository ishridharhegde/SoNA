<html lang="en">

<head>

  <!-- Include the CSS and JS files from config.php file-->
  <?php
    include 'config.php';
  ?>

  <!-- Javascript to render the charts -->
  <script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
	     animationEnabled: true,
	      exportEnabled: true,
	       theme: "light1", // "light1", "light2", "dark1", "dark2"
	        title:{
		          text: "Simple Column Chart with Index Labels"
	        },
	      data: [{
		        type: "column", //change type to bar, line, area, pie, etc
		          //indexLabel: "{y}", //Shows y value on all Data Points
		  indexLabelFontColor: "#5A5757",
		    indexLabelPlacement: "outside",
		      dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	       }]
       });
    chart.render();
  }
</script>

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


  <main id="main">

    <!-- CARD -->
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card">
                <div class="card-body">
                  <!-- CARD BODY -->
                  <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
            </div>
        </div>
    </div> <!-- CARD END -->

</main>


  </main><!-- End #main -->

</body>
</html>
