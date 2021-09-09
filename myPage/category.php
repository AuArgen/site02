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
    <title>Категория</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
  </head>
  <body>
    <?php include("./menu.php");?>
    <div class="home ">
      <br>
        <div class="text-center"><a href="./php/category.php"><button type="button" class="btn btn-outline-success" style="width:90%; font-size: 20px;">Добавить категория +</button></a></div>
          <section class="speciality" id="speciality">
            <div class="box-container">
              <?php
                include("./php/connect.php");
                $r = $conn -> query("SELECT * FROM type");
                if (mysqli_num_rows($r)) {
                  $row = mysqli_fetch_array($r);
                  do {
                    echo '
                    <div class="box">
                    <a href="./php/updateCat.php?id='.$row["id"].'&n=1">
                      <img class="image" src=".'.$row["image2"].'" style="width:100%; height:100%" alt="">
                      <div class="content">
                          <img src=".'.$row["image"].'" height="50" alt="">
                          <h3>'.$row["aty"].'</h3>
                          <p>'.substr($row["text"],0,50).'</p>
                      </div>
                      </a>
                    </div>
                    ';
                  } while($row = mysqli_fetch_array($r));
                }
              ?>
            </div>
          </section>
    </div>
    <script src="./js/script.js"></script>
  </body>
</html>
<!-- 
  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.
 -->