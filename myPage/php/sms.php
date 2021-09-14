<?php
    session_start();
    if ($_SESSION["log"] != "a" && $_SESSION["pass"] != "a") {
        header('Location:../register.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Заказ - клиента </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
  </head>
  <body>
    <?php include("./menu.php");?>
    <div class="home container p-5">     
        <div class="bg-light" style="font-size:20px">
        <ul>
            <?php
            include("./connect.php");
            $id = $_GET["id"];
            $r = $conn -> query("SELECT * FROM klient WHERE id = '$id'");
            $conn -> query("UPDATE klient SET reading = '' WHERE id = '$id'");
             $n = mysqli_num_rows($r);
             $radio = "";
          if ($n) {
            $row = mysqli_fetch_array($r);
            do {
                $radio = $row["radio"];
              echo'
                <li><div class="alert alert-success" role="alert">
                  <div class="row p-2">
                    <div class="col-4">'.$row["aty"].'</div>
                    <div class="col-2">'.$row["tel"].'</div>
                    <div class="col-3">'.$row["adres"].'</div>
                    <div class="col-1"><span class="badge bg-primary text-light">'.$row["kol"].'</span></div>
                    <div class="col-2">'.$row["date"].'</div>
                  </div>
                </div></li>
              ';
            } while ($row = mysqli_fetch_array($r));
          }
        ?>
        </ul>
        <table class="table table-striped table-hover">
            <?php
            $r = $conn -> query("SELECT * FROM zakazy WHERE id = '$id'");
            $n = mysqli_num_rows($r);
            if ($n) {
                $row = mysqli_fetch_array($r);
                $count = 0;
                echo '
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название</th>
                    <th scope="col">Цена-грам</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Картина</th>
                    <th scope="col">Отправка</th>
                    </tr>
                </thead>
                ';
                do {
                    $count++;
                echo'
                   <tbody>
                        <tr>
                        <th scope="row">'.$count.'</th>
                        <td>'.$row["aty"].'</td>
                        <td>'.$row["sena"].' - '.$row["gram"].'</td>
                        <td>'.$row["kol"].'</td>
                        <td><img src="../.'.$row["image"].'" width="150" alt="img"></td>
                        <td>'.$radio.'</td>
                        </tr>
                    </tbody>
                ';
                } while ($row = mysqli_fetch_array($r));
            }
            ?>
        </table>
        </div>
    </div>
  </body>
</html>
