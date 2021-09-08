<?php
    session_start();
    if ($_SESSION["log"] == "a" && $_SESSION["pass"] == "a") {
        header('Location:./');
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin logins</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <form action="" method="post">
    <div class="login-box">
      <h1>Login</h1>
      <div class="textbox">
        <i class="fas fa-user"></i>
        <input type="text" placeholder="Username" name="log">
      </div>

      <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="password" placeholder="Password" name="pass">
      </div>

      <input type="submit" class="btn" value="Sign in" name="analize">
    </div>
  </form>
  <?php
    include("./analize.php");
?>
  </body>
</html>
