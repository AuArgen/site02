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
    <title>Реклама и подарки</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./style.css">
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
  </head>
  <body>
    <?php include("./menu.php");?>
    <div class="home ">
      <br>  
      <form action="" class="form-control container text-center">
          <h2>Реклама</h2>
          <?php
            include("./php/connect.php");
            $r = $conn -> query("SELECT * FROM reklama WHERE id = '1'");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                do {
                    echo '
                        <a href = "./php/reklama.php?id='.$row["id"].'">
                            <div class="text-center justify-content-center" width="300">
                                <div class="p-2 img" width="280">
                                    <img src = ".'.$row["image"].'" width = "280" alt="img"/>
                                </div>
                                <div  width="290">
                                    <h2 class="p-2" width="280">'.$row["theme"].'</h2>
                                </div>
                                <div class="p-2 text-center" style="display:flex; justify-content:center; color:red">
                                    <h2 class="p-2 text-center" style=" max-width:400px" width="280">'.$row["text2"].'</h2>
                                </div>
                            </div>
                        </a>
                    ';
                } while ($row = mysqli_fetch_array($r));
            }
            $r = $conn -> query("SELECT * FROM reklama WHERE id != '1'");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo '<hr><h2>Подарки</h2><div style="display:flex; justify-content:center">';
                do {
                    echo '
                        <a href = "./php/reklama.php?id='.$row["id"].'">
                            <div class="text-center p-5" style="border:1px solid brown; margin-left:5px" width="300" >
                                <div class="p-2 img" width="280">
                                    <img src = ".'.$row["image"].'" width = "280" alt="img"/>
                                </div>
                                <div  width="290">
                                    <h2 class="p-2" width="280">'.$row["aty"].'</h2>
                                </div>
                                <div class="p-2 text-center" style="display:flex; justify-content:center; color:red">
                                    <h2 class="p-2 text-center" style=" max-width:280px" width="280">'.$row["text"].'</h2>
                                </div>
                            </div>
                        </a>
                    ';
                } while ($row = mysqli_fetch_array($r));
            }
          ?>
      </form>
    </div>
    <script>
        document.querySelector("#menuName6").style.color = "green";
        document.querySelector("#menuName6").style.borderBottom = "2px solid red";
    </script>
  </body>
</html>
<!-- 
  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.
 -->