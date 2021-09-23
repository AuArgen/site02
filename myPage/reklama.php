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
      <form action="" class="form-control container text-center" method="post" enctype="multipart/form-data" >
          <h1>Реклама</h1>   
           <div class="text-center justify-content-center" width="300">
                                <div  width="290">
                                    <h2 class="p-2" width="280"><input value="" name = "theme" required placeholder="Enter theme for reklama" class="form-control" style="font-size:22px"></h2>
                                </div>
                                <div class="p-2 text-center">
                                    <h2 class="p-2 text-center"><textarea name="text" rows="7" cols="50" required placeholder="Enter text for reklama" class="form-control" style="font-size:22px"></textarea></h2>
                                </div>
                                <br><label style="font-size:18px" required for="image" class="" style= "cursor:pointer">
                                <i style= "cursor:pointer" class="fa fa-picture-o btn btn-warning" aria-hidden="true"> Добавить картинки </i>  </label> <div id="h1"></div>
                                 <input type="file" name="image" id="image" class="form-control" style="opacity:0;" onchange = "getImagePreview()" required>
                                <p><input type="submit" class="btn btn-success" style="font-size:22px" name="save" value="Сохранить"></p>
                            </div>           
          <?php
            include("./php/connect.php");
            if (isset($_POST["save"])) {
                 $image = "";
                    // ----------------------
                    // var_dump($_FILES["image"]);
                        $a = $_FILES["image"]["name"];
                        $c = $_FILES["image"]["tmp_name"];
                        $img_ex = pathinfo($a,PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);
                        $allowed_exs = array("jpg","jpeg","png","gif");
                        if(in_array($img_ex_lc,$allowed_exs)) {
                            $new_img = uniqid("YES-IMG-",true).".".$img_ex_lc;
                            $img_path = "../img/".$new_img;
                            $image = "./img/".$new_img;
                            move_uploaded_file($_FILES["image"]["tmp_name"],$img_path);
                        }
                $a = $_POST["theme"];
                $b = $_POST["text"];
                 $conn->query("INSERT INTO reklama (theme,text2,image) VALUES('$a','$b','$image')");
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
         
        <table class="table">
            <?php
                $r = $conn -> query("SELECT * FROM reklama  ORDER BY id DESC");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    $count = 0;
                    do {
                        $count++;
                        echo '
                                <tr style="font-size:20px" class="row">                            
                                      <th class="col-1" scope="row">'.$count.'</th>
                                      <th class="col-3">'.$row["theme"].'</th>
                                      <th class="col-4">'.$row["text2"].'</th>
                                      <td class="col-3"><img src = ".'.$row["image"].'" alt="img" width="200"></td>
                                      <td class="col-1"><button class="btn btn-danger" style="font-size:25px" onclick="deletes('.$row["id"].')">&times;</button></td>
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
        var image=URL.createObjectURL(event.target.files[0]);
        var imagediv= document.querySelector('#h1');
        var newimg=document.createElement('img');
        let x = new FormData();
        x.append("file",document.getElementById('image').files[0]);
        console.log(x);
        imagediv.innerHTML='';
        newimg.src=image;
        newimg.width="300";
        imagediv.appendChild(newimg);
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