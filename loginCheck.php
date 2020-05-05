<?php
include "config.php";

if(isset($_POST['but_submit'])) {

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
        {
            header('Location: login.php');
        }

    }

}
