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
    <title>Продукты</title>
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
      <div class="text-center"><a href="./php/products.php"><button type="button" class="btn btn-outline-success" style="width:90%;font-size:20px">Добавить продукты +</button></a></div>
      <br>  
      <div class="text-center container">
            <form action="" class="container form-control">
                <select name="p" id="p"  class="form-select" aria-label="Default select example" style="font-size:20px">
                    <option value="0">Категория</option>
                    <?php
                        include("./php/connect.php");
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
        </div>
        <section class="popular" id="popular">
            <div class="box-container row"></div>
        </section>
    </div>
     <script src="../js/jquery.js"></script>
    <script src="./js/script.js"></script>
    <script>
        document.querySelector("#p").onchange = () => {
            pervod(document.querySelector("#p").value);
            document.querySelector(".box-container").innerHTML = "";
        }
        function pervod (n) {
            $.ajax({
                url:'./php/sawProduct.php',
                type:'POST',
                cache:false,
                data:{n},
                dataType:'html',
                success: function (data) {
                    document.querySelector(".box-container").innerHTML = data;
                }
            });
        }
    </script>
  </body>
</html>
<!-- 
  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.
 -->