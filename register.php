<?php
    include "config.php";

    $name =$email = $username = $twitter = $instagram = $reddit = $facebook = $password = "" ;

    if(isset($_POST['submit']))
    {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $twitter = $_POST['twitter'];
      $instagram = $_POST['instagram'];
      $reddit = $_POST['reddit'];
      $facebook = $_POST['facebook'];
      $password = $_POST['password'];

      $query = "INSERT INTO user(name, email,username,twitter,instagram,reddit,facebook,pass) VALUES ('$name','$email','$username', '$twitter','$instagram','$reddit','$facebook','$password')";
      $result = mysqli_query($con,$query);

      if($result)
      {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('You are registred successfully, Now login for further process');
                 </SCRIPT>");
      }
      else {
        echo "Invalid Inputs";
        echo "$query";
      }
    }
    else {
      echo "SOME OTHER PROBLEM";
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
                    <h2 class="title">Register</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="register.php">
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Email address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="email" name="email" placeholder="example@email.com" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">SoNA username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="username" placeholder="Choose your username for SoNA platform" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Twitter username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="twitter" placeholder="Do not include @ symbol">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Instagram username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="instagram" placeholder="Do not include @ symbol">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Reddit username</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="reddit" placeholder="Do not include @ symbol">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" onkeyup='check_pass();' type="password" id="password" name="password" placeholder="Set a password for your account" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Retype password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input onkeyup='check_pass();' class="input--style-6" type="password" id="retype-password" name="retype-password" placeholder="Retpe your password" required> <span id='message'></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" id="submit" name="submit" disabled>Register</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery/jquery.min-2.js"></script>


    <!-- Main JS-->
    <script src="assets/js/global.js"></script>

  <script>

  function check_pass()
  {
    if (document.getElementById('password').value ==
            document.getElementById('retype-password').value && document.getElementById('password').value !='')
    {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'PASSWORD MATCHES';
      document.getElementById('submit').disabled = false;
    } else
    {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'PASSWORD DOES NOT MATCH';
      document.getElementById('submit').disabled = true;
    }
}


  </script>


  </main><!-- End #main -->

</body>

</html>
