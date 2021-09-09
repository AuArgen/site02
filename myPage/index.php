<?php
    session_start();
    if ($_SESSION["log"] != "a" && $_SESSION["pass"] != "a") {
        header('Location:./register.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
  </head>
  <body>
    <?php include("./menu.php");?>
    <ul class="home container">
      <li>'<div class="alert alert-danger" role="alert"> <i class="fas fa-cart-arrow-down">0</i></div>'</li>
      <li>'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>'</li>
      <li>'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>'</li>
      <li>'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>'</li>
      <li>'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>'</li>
      <li>'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>'</li>
      <li>'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>'</li>
      <li>'<div class="alert alert-success" role="alert">This is a success alert—check it out!</div>'</li>
    </ul>
    <script src="./js/script.js"></script>
  </body>
</html>
