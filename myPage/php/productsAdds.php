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
    <title>Добавить <?php $type = $_GET["type"]; if ($type == 1) echo 'популярный';
    else echo 'галерея'; ?></title>
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
        <form action="" class="container form-control">
                <select name="p" id="p"  class="form-select" aria-label="Default select example" style="font-size:20px">
                    <option value="0">Категория</option>
                    <?php
                        include("./connect.php");
                        $r = $conn -> query("SELECT * FROM type");
                        if (mysqli_num_rows($r)) {
                        $row = mysqli_fetch_array($r);
                            do {
                                echo '
                                    <option value="'.$row["id"].'">'.$row["aty"].'</option>
                                ';
                            } while($row = mysqli_fetch_array($r));
                        }
                    ?>
                </select>
            </form>
            <br>
            <table class="container table table-dark table-hover">
</table>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script>
        document.querySelector("#p").onchange = () => {
            pervod(document.querySelector("#p").value);
        }
        function pervod (n) {
                let x = <?echo $type;?>+"";
                 $.ajax({
                    url:'./addsProduct.php',
                    type:'POST',
                    cache:false,
                    data:{x,n},
                    dataType:'html',
                    success: function (data) {
                         document.querySelector(".table").innerHTML = data;
                    }
                });
        }
        function adds (id) {
            let t = <?echo $type;?>+"",
                x = document.querySelector("#p").value,
                n = 4;
             $.ajax({
                url:'./save.php',
                type:'POST',
                cache:false,
                data:{x,n,id,t},
                dataType:'html',
                success: function (data) {
                    pervod (x);
                }
            });
        } 
    </script>
  </body>
</html>
