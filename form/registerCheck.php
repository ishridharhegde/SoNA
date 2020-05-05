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
