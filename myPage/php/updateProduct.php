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
    <title>Обновить </title>
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
        <?php
            include("./connect.php");
            $id = $_GET["id"];
            $t = $_GET["type"];
            $r = $conn -> query ("SELECT * FROM tovar WHERE id = '$id' AND type = '$t'");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                do {
                    echo '
                    <form action="" class="form-control p-5 fs-3" style="font-size:20px">
                        <input style="font-size:18px" required type="name" name="name" id="name" class="form-control fs-3" value="'.$row["aty"].'" placeholder="Названия продукты"></input>
                        <br><textarea style="font-size:18px" name="text" id="text" cols="10" rows="5" class="form-control fs-3" value="" placeholder="Введите текст если нужно ...">'.$row["text"].'</textarea>
                        <br> <input style="font-size:18px" required type="name" name="name" id="sena" class="form-control fs-3" value="'.$row["summa"].'" placeholder="Стоимость... пример 150р. или 150сом"></input>
                        <br> <input style="font-size:18px" required type="name" name="name" id="gram" class="form-control fs-3" value="'.$row["gram"].'" placeholder="Граммы... пример 150г"></input>
                        <br><label style="font-size:18px" required for="file" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для фона </label> <div id="1"><img src="../.'.$row["image"].'" alt="img" width="300"></div> <input type="file" name="file_img" id="file" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,1)">
                        <br><p class="text-center"><button style="font-size:18px" type="button" name = "save" id="btn" class = "btn btn-success" value="" onclick = "saves(2)">Сохранить</button></p>
                        <input type = "text" id="g1" value="" style="visibility:hidden">
                        <input type = "text" id="g2" value="'.$row["image"].'" style="visibility:hidden">
                    </form>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        ?>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script>
        function pervod (n) {
            if ( n === "6") {
                let x = 2;
                 $.ajax({
                    url:'./addProduct.php',
                    type:'POST',
                    cache:false,
                    data:{x},
                    dataType:'html',
                    success: function (data) {
                         document.querySelector(".kat").innerHTML = data;
                    }
                });
            }
        }
        function saves (n) {
            if (n === 2) {
                let name = document.querySelector("#name").value
                let text = document.querySelector("#text").value
                let f = document.querySelector("#file").value
                let s = document.querySelector("#sena").value
                let g = document.querySelector("#gram").value
                if (g === '' || name === '' || text === '' || s === '') alert ("Заполните все поля!");
                else {
                    img(n);
                }
            } 
        } 
                 function getImagePreview(event,n)
            {
                var image=URL.createObjectURL(event.target.files[0]);
                var imagediv= document.getElementById(n+"");
                var newimg=document.createElement('img');
                imagediv.innerHTML='';
                newimg.src=image;
                newimg.width="300";
                imagediv.appendChild(newimg);
            }
        function img (n) {
            let x = new FormData();
            let e = document.getElementById("file").files[0]
            if (e === undefined) {
                success();
            }
            else {
                x.append('file',e);
                $.ajax({
                    url:'./image.php',
                    type:'POST',
                    cache:false,
                    data:x,
                    contentType:false,
                    processData:false,
                    dataType:'html',
                    success: function (data) {
                        document.getElementById("g1").value = data;
                    success();
                    }
                });
            }
        }
        function success() {
            let x = "<?echo $t;?>";
            let y = "<?echo $id;?>";
            let name = document.querySelector("#name").value
            let text = document.querySelector("#text").value
            let f = document.getElementById("g1").value
            let f2 = document.getElementById("g2").value
            let s = document.querySelector("#sena").value
            let g = document.querySelector("#gram").value
            let n = 2;
            // console.log(x,n,name,text,f,s,g,f2,y);
                $.ajax({
                    url:'./saveUp.php',
                    type:'POST',
                    cache:false,
                    data:{x,n,name,text,f,s,g,f2,y},
                    dataType:'html',
                    success: function (data) {
                        if (data === "1") alert ("Продукт обновлена!!!");
                        else  alert ("Ошибька!!!"+data);
                        window.location.replace("../products.php");
                    }
                });
        }
    </script>
  </body>
</html>
