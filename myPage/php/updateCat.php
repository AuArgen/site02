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
    <title>Обновить категория</title>
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
            <?php
                include("./connect.php");
                if ($_GET["n"] == 1) {
                    $id = $_GET["id"];
                    $r = $conn->query("SELECT * FROM type WHERE id = '$id'");
                    if (mysqli_num_rows($r)) {
                        $row = mysqli_fetch_array($r);
                        do { echo '
                            <input style="font-size:18px" required type="name" name="name" id="name" class="form-control fs-3" placeholder="Имя категория" value="'.$row["aty"].'"></input>
                            <br><textarea style="font-size:18px" required name="text" id="text" cols="30" rows="10" class="form-control fs-3" placeholder="Введите текст ...">'.$row["text"].'</textarea>
                            <br><label style="font-size:18px" required for="file" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для иконка</label> <div id="0"><img src="../.'.$row["image"].'" width="300" /></div> <input type="file" name="file_icon" id="file" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,0)">
                            <br><label style="font-size:18px" required for="file2" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для фона </label> <div id="1"><img src="../.'.$row["image2"].'" width="300" /></div> <input type="file" name="file_img" id="file2" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,1)">
                            <br><p class="text-center"><button style="font-size:18px" type="button" name = "save" id="btn" class = "btn btn-success" value="" onclick = "saves(1)">Сохранить</button>
                            <button style="font-size:18px" type="button" name = "save" id="btn" class = "btn btn-danger" value="" onclick = "deletes('.$row["id"].',1)">Удалить</button>
                            </p>
                            <input type = "text" id="g1" value="" style="visibility:hidden">
                            <input type = "text" id="g2" value="" style="visibility:hidden">                            <input type = "text" id="g1" value="" style="visibility:hidden">
                            <input type = "text" id="u1" value="" style="visibility:hidden">                            <input type = "text" id="g1" value="" style="visibility:hidden">
                            <input type = "text" id="u2" value="" style="visibility:hidden">
                            <input type = "text" id="i1" value="'.$row["image"].'" style="visibility:hidden">
                            <input type = "text" id="i2" value="'.$row["image2"].'" style="visibility:hidden">
                            <input type = "text" id="id" value="'.$row["id"].'" style="visibility:hidden">
                            ';
                        } while ($row = mysqli_fetch_array($r));
                    }
                }
            ?>
            </form>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script>
        let file = "", file2 = "",s = 0,ss = 0;
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
            if (n === 1 &&(name === '' || text === '')) alert ("Заполните все поля!");
            else {
                document.getElementById("u1").value = document.getElementById("file").files[0]; ;
                document.getElementById("u2").value = document.getElementById("file2").files[0]; ;
                img ("file");
                img ("file2");
            }
        }
        function img (h) {
            let x = new FormData();
            let e = document.getElementById(h).files[0];
            // console.log(e)
            s++;
            if (e !=undefined) {
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
                    document.getElementById("g"+s+"").value += data;
                    // alert(s,data)
                    meha(s)
                }
                });
            } else{
                document.getElementById("g"+s+"").value += "";
                meha(s);
            } 
           
        }
        function meha(s) {
            ss++;
            if (ss === 2) {

                let id = document.querySelector("#id").value
                let name = document.querySelector("#name").value
                let text = document.querySelector("#text").value
                let fileI = document.getElementById("i1").value;
                let fileI2 = document.getElementById("i2").value;
                let u1 = document.getElementById("u1").value;
                let u2 = document.getElementById("u2").value;
                // alert(u1)
                if (u2 === "undefined") {
                    file = document.getElementById("g2").value
                    file2 = document.getElementById("g1").value
                } else {
                    file = document.getElementById("g1").value
                    file2 = document.getElementById("g2").value
                }
                // console.log (file, file2)
                n = 1;
                $.ajax({
                    url:'./saveUp.php',
                    type:'POST',
                    cache:false,
                    data:{name,text,file,file2,fileI,fileI2,id,n},
                    dataType:'html',
                    success: function (data) {
                        if (data === "1") alert ("Категория обнавлена!!!");
                        else  alert ("Ошибька!!!"+data);
                        window.location.replace("../category.php");
                    }
                });
            }
        } 
        function deletes(x,y) {
            let fileI = document.getElementById("i1").value;
            let fileI2 = document.getElementById("i2").value;
            $.ajax({
                    url:'./delete.php',
                    type:'POST',
                    cache:false,
                    data:{x,y,fileI,fileI2},
                    dataType:'html',
                    success: function (data) {
                        if (data === "1") alert ("Категория удалена!!!");
                        else  alert ("Ошибька!!!"+data);
                        window.location.replace("../category.php");
                    }
            });
        }
    </script>
  </body>
</html>
