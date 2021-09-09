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
            <div class="kat"></div>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script>
               document.querySelector("#p").onchange = () => {
            pervod(document.querySelector("#p").value);
        }
        function select() {
            let g = document.querySelector("#kol").value;
            let s = "";
            for (let i = 1; i <= g; i++) {
                s += `
                    ${i}
                    <br> <input style="font-size:18px" required type="name" name="name" id="sena${i}" class="form-control fs-3" placeholder="Стоимость... пример 150р. или 150сом"></input>
                    <br> <input style="font-size:18px" required type="name" name="name" id="gram${i}" class="form-control fs-3" placeholder="Размер... пример 150см"></input>
                `;
            }
            document.querySelector(".select_kol").innerHTML = s;
        }
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
            } else { 
               let x = 1;
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
                if (f === '' || g === '' || name === '' || text === '' || s === '') alert ("Заполните все поля!");
                else {
                    img(n);
                }
            } else {
                let name = document.querySelector("#name").value
                let text = document.querySelector("#text").value
                let f = document.querySelector("#file").value
                let g = document.querySelector("#kol").value;
                let s = "a";
                for (let i = 1; i <= g; i++) {
                    if (!document.querySelector("#sena"+i+"").value || !document.querySelector("#gram"+i+"").value) s = "";
                }
                if (f === '' || g === '0' || name === '' || text === '' || s === '') alert ("Заполните все поля!");
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
                if (n === 2) {
                    let x = document.querySelector("#p").value;
                    let name = document.querySelector("#name").value
                    let text = document.querySelector("#text").value
                    let f = document.getElementById("g1").value
                    let s = document.querySelector("#sena").value
                    let g = document.querySelector("#gram").value
                        $.ajax({
                            url:'./save.php',
                            type:'POST',
                            cache:false,
                            data:{x,n,name,text,f,s,g},
                            dataType:'html',
                            success: function (data) {
                                document.querySelector(".kat").innerHTML = "";
                                if (data === "1") alert ("Продукт добавлена!!!");
                                else  alert ("Ошибька!!!"+data);
                                // window.location.replace("../category.php");
                            }
                        });
                } else {
                    let x = document.querySelector("#kol").value;
                    let name = document.querySelector("#name").value
                    let text = document.querySelector("#text").value
                    let f = document.getElementById("g1").value
                    let mas = ["","",""];
                    let mas2 = ["","",""];
                    for (let i = 1; i <= x; i++) {
                        mas[i-1] = document.querySelector("#sena"+i+"").value;
                        mas2[i-1] = document.querySelector("#gram"+i+"").value;
                    }
                    let s1 = mas[0], s2 = mas[1],s3 = mas[2];
                    let g1 = mas2[0], g2 = mas2[1],g3 = mas2[2];
                    // console.log(x,n,name,text,f,s1,s2,s3,g1,g2,g3);
                        $.ajax({
                            url:'./save.php',
                            type:'POST',
                            cache:false,
                            data:{x,n,name,text,f,s1,s2,s3,g1,g2,g3},
                            dataType:'html',
                            success: function (data) {
                                document.querySelector(".kat").innerHTML = "";
                                if (data === "1") alert ("Продукт добавлена!!!");
                                else  alert ("Ошибька!!!"+data);
                                // window.location.replace("../category.php");
                            }
                        });
                    }
                }
            });
        }
    </script>
  </body>
</html>
