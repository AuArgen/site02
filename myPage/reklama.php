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
      <form action="" class="form-control container text-center" method="post">
          <h1>Реклама</h1>              
          <?php
            include("./php/connect.php");
            $r = $conn -> query("SELECT * FROM reklama WHERE id = '1'");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                do {
                    echo '
                            <div class="text-center justify-content-center" width="300">
                                <div  width="290">
                                    <h2 class="p-2" width="280"><input value="'.$row["theme"].'" name = "theme" required placeholder="Enter theme for reklama" class="form-control" style="font-size:22px"></h2>
                                </div>
                                <div class="p-2 text-center">
                                    <h2 class="p-2 text-center"><textarea name="text" rows="7" cols="50" required placeholder="Enter text for reklama" class="form-control" style="font-size:22px">'.$row["text2"].'</textarea></h2>
                                </div>
                                <p><input type="submit" class="btn btn-success" style="font-size:22px" name="save" value="Сохранить"></p>
                            </div>
                    ';
                } while ($row = mysqli_fetch_array($r));
            }
            if (isset($_POST["save"])) {
                $a = $_POST["theme"];
                $b = $_POST["text"];
                $conn -> query("UPDATE reklama SET theme = '$a', text2 = '$b' WHERE id = '1'");
                 echo'
                    <script>
                        function Load() {
                            window.location.replace("./reklama.php");
                        }
                        setTimeout(Load,10);
                    </script>
                    ';
            }
          ?>
          <hr>
         <br><label style="font-size:18px" required for="file" class="" style= "cursor:pointer"><i style= "cursor:pointer" class="fa fa-picture-o btn btn-warning" aria-hidden="true"> Добавить картинки </i>  </label> <div id="1"></div> <input type="file" name="file_img" id="file" class="form-control" style="visibility:hidden" onchange = "getImagePreview()">
        <table class="table">
            <?php
                $r = $conn -> query("SELECT * FROM reklama WHERE image != '' ORDER BY id DESC");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    $count = 0;
                    do {
                        $count++;
                        echo '
                                <tr style="font-size:20px">
                                      <th scope="row">'.$count.'</th>
                                      <td><img src = ".'.$row["image"].'" alt="img" width="200"></td>
                                      <td><button class="btn btn-danger" style="font-size:25px" onclick="deletes('.$row["id"].')">&times;</button></td>
                                </tr>
                        ';
                    } while ($row = mysqli_fetch_array($r));
                }
            ?>
        </table>
    </form>
    </div>
    <script src="../script/jquery-1.11.1.min.js"></script>
    <script>
        document.querySelector("#menuName6").style.color = "green";
        document.querySelector("#menuName6").style.borderBottom = "2px solid red";
        function getImagePreview()
      {
        // var image=URL.createObjectURL(event.target.files[0]);
        var imagediv= document.querySelector('label');
        // var newimg=document.createElement('img');
        let x = new FormData();
        x.append("file",document.getElementById('file').files[0]);
        // console.log(x);
        // imagediv.innerHTML='';
        // newimg.src=image;
        // newimg.width="300";
        // imagediv.appendChild(newimg);
        // let x = 0;
        $.ajax({
          url:'./php/image2.php',
          type:'POST',
          cache:false,
          data:x,
          contentType:false,
          processData:false,
          dataType:'html',
          success: function (data) {
            window.location.replace("./reklama.php");
          }
        });
      }
      function deletes (x) {
        let y = 7;
            $.ajax({
                url:'./php/delete.php',
                type:'POST',
                cache:false,
                data:{x,y},
                dataType:'html',
                success: function (data) {
                  window.location.replace("./reklama.php");
                }
            });
      }
    </script>
  </body>
</html>
<!-- 
  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sint recusandae assumenda quibusdam ab veniam? Incidunt inventore nobis explicabo exercitationem ut neque eos, earum corrupti officiis quibusdam quae delectus totam blanditiis.
 -->