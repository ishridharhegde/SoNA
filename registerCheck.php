<?php
    include "config.php";

    $email = $twitter = $password = "" ;

    if(isset($_POST['but_submit']))
    {
      $email = $_POST['email'];
      $twitter = $_POST['twitter'];
      $password = $_POST['password'];

      $query = "INSERT INTO user(email, twitter, pass) VALUES ('$email', '$twitter', '$password')";
      $result = mysqli_query($con,$query);

      if($result)
      {
        echo ("<SCRIPT LANGUAGE='JavaScript'>
                 window.alert('You are registred successfully, Now login for further process');
                     window.location.href='login.php';
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
