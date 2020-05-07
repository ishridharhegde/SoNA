<?php
include "config.php";

if(isset($_POST['submit'])) {

    $uname = $_POST['email'];
    $password = $_POST['password'];

    if ($uname != "" && $password != "")
    {
        $sql_query = "SELECT COUNT(*) as cntUser FROM USER where email='".$uname."' and pass='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0)
        {
            header('Location: home.php');
        }
        else
        {?>
            <script> alert("Either email or password is wrong!"); </script>
    <?php    }

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>SoNA</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active">
            <a href="index.html">Home</a>
            <li class="drop-down"><a href="">ACCOUNT</a>
              <ul>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
              </ul>
            </li>
          </li>
        </ul>
      </nav><!-- .nav-menu -->
  </header><!-- End Header -->


  <main id="main">


    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="login.php">
                      <div class="form-row">
                            <div class="name">Email address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" placeholder="example@email.com" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="password" name="password" placeholder="Set a password for your account" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" name="submit" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
    <!-- Jquery JS-->
    <script src="assets/vendor/jquery/jquery.min-2.js"></script>

    <!-- Main JS-->
    <script src="assets/js/global.js"></script>

  </main><!-- End #main -->

</body>

</html>
