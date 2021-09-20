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
    <title>Добавить категория</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
  </head>
  <body>
    <?php include("./menu.php");?>
    <div class="home container p-5">     
        <div class="bg-light" style="font-size:20px">
            <form action="" class="form-control p-5 fs-3" style="font-size:20px">
                <input style="font-size:18px" required type="name" name="name" id="name" class="form-control fs-3" placeholder="Имя категория"></input>
                <br><textarea style="font-size:18px" required name="text" id="text" cols="30" rows="10" class="form-control fs-3" placeholder="Введите текст ..."></textarea>
                <br><label style="font-size:18px" required for="file" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для иконка</label> <div id="0"></div> <input type="file" name="file_icon" id="file" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,0)">
                <br><label style="font-size:18px" required for="file2" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для фона </label> <div id="1"></div> <input type="file" name="file_img" id="file2" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,1)">
                <br><p class="text-center"><button style="font-size:18px" type="button" name = "save" id="btn" class = "btn btn-success" value="" onclick = "saves(1)">Сохранить</button></p>
                <input type = "text" id="g1" value="" style='visibility:hidden'>
                <input type = "text" id="g2" value="" style='visibility:hidden'>
            </form>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script>
        document.querySelector("#menuName2").style.color = "green";
        document.querySelector("#menuName2").style.borderBottom = "2px solid red";
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
        function saves(n) {
            let name = document.querySelector("#name").value
            let text = document.querySelector("#text").value
            let f = document.querySelector("#file").value
            let fi = document.querySelector("#file2").value
            if (n === 1 &&(f === '' || fi === '' || name === '' || text === '')) alert ("Заполните все поля!");
            else {
                s = 0;
                img ("file");
                img ("file2");
            }
        }
        function img (h) {
            let x = new FormData();
            let e = document.getElementById(h).files[0]
            x.append('file',e);
            // imagediv.innerHTML='';
            // newimg.src=image;
            // newimg.width="300";
            // imagediv.appendChild(newimg);
            $.ajax({
            url:'./image.php',
            type:'POST',
            cache:false,
            data:x,
            contentType:false,
            processData:false,
            dataType:'html',
            success: function (data) {
                s++;
                let l = "g"+s;
                document.getElementById(l).value = data;
                if (s == 2) {
                let name = document.querySelector("#name").value
                let text = document.querySelector("#text").value
                let file = document.getElementById("g1").value;
                let file2 = document.getElementById("g2").value;
                n = 1
                $.ajax({
                    url:'./save.php',
                    type:'POST',
                    cache:false,
                    data:{name,text,file,file2,n},
                    dataType:'html',
                    success: function (data) {
                         if (data === "1") alert ("Категория добавлена!!!");
                         else  alert ("Ошибька!!!"+data);
                         window.location.replace("../category.php");
                    }
                });
                }
            }
            });
        }
    </script>
  </body>
</html>
