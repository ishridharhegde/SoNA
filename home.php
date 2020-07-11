  <?php session_start();
    include 'config.php';
    if(isset($_SESSION['id']))
  { ?>

  <html lang="en">
  <head>

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


    <main id="main" style="margin-top:50px;">

  <div class="row">
  <?php
    $csv = array_map('str_getcsv', file('celebrity_info2.csv'));
    for($i=1; $i<90; $i++)
    {?>
      <div class="col-lg 3 col-md-3 col-sm-12 col-xs-12">
      <div class="card" style="width: 18rem;">
      <img class="card-img-top card-image" src="images/<?php print_r($csv[$i][4]); ?>.jpg" alt="Card image cap">
      <div class="card-body">
        <h4 class="card-title" style="font-weight: bold;"><?php print_r($csv[$i][0]); ?></h5>
        <p class="card-text card-text-limit" ><?php print_r($csv[$i][1]); ?></p>
        <a href="#" id="<?php echo($csv[$i][0]); ?>" onclick="getName(this)" style="margin-top: 10px;" class="btn btn-primary">See analysis</a>
      </div>
      </div>
      </div>
  <?php  }
  ?>



  <script>

  function getName(ele)
  {
    document.cookie = "clicked = " + ele.id;
    window.location.href = "analysis.php";
  }


  </script>


    </main><!-- End #main -->

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
