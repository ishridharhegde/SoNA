<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <link rel="stylesheet" type="text/css" href="css\custom.css">
    <?php include 'links.php' ?>
</head>

<body>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="https://cdn.unlockboot.com/wp-content/uploads/2018/12/type-apple-logo.jpg" id="icon" alt="User Icon" />
    </div>

    LOGIN
    <!-- Login Form -->
    <form action="loginCheck.php" method="POST">
      <input type="text" id="form" class="fadeIn second" name="email" placeholder="Email">
      <input type="text" id="form" class="fadeIn third" autocomplete="off" name="password" placeholder="Password">
      <input type="submit" name="but_submit" id="but_submit" class="fadeIn fourth" value="Log In">
    </form>

  </div>
</div>




</body>
</html>
