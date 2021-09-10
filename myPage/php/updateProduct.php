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
            if ($t == 6) {
                $r = $conn -> query ("SELECT * FROM tovar_pizza WHERE id = '$id'");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    do {
                        $s = '<option value="0">Выберте количество размеры для добавление варианты</option>';
                        for ($i = 1; $i <= 3; $i++) {
                            if ($i == $row["kol"]) $s = $s.'<option selected value="'.$i.'">'.$i.'</option>';
                            else $s = $s.'<option value="'.$i.'">'.$i.'</option>';
                        }
                        $column = '';
                        for ($i = 1; $i <= $row["kol"]; $i++) {
                            $column = $column.''.$i.'
                            <br> <input style="font-size:18px" required type="name" name="name" id="sena'.$i.'" class="form-control fs-3" placeholder="Стоимость... пример 150р. или 150сом" value="'.$row["sena".$i].'"></input>
                            <br> <input style="font-size:18px" required type="name" name="name" id="gram'.$i.'" class="form-control fs-3" placeholder="Размер... пример 150см" value="'.$row["gram".$i].'"></input>';
                        }
                        echo '
                            <form action="" class="form-control p-5 fs-3" style="font-size:20px">
                                <input style="font-size:18px" required type="name" value="'.$row["aty"].'" name="name" id="name" class="form-control fs-3" placeholder="Имя продукты"></input>
                                <br><textarea style="font-size:18px" value="" name="text" id="text" cols="30" rows="10" class="form-control fs-3" placeholder="Введите текст если нужно ...">'.$row["text"].'</textarea>
                                <br><select name="kol" id="kol" style="font-size:18px" class="form-select" onchange = "select()"> 
                                    '.$s.'
                                </select>
                                <div class="select_kol">'.$column.'</div>
                                <br><label style="font-size:18px" required for="file" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для фона </label> <div id="1"><img src="../.'.$row["image"].'" alt="img" width="300"></div> <input type="file" name="file_img" id="file" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,1)">
                                <br><p class="text-center"><button style="font-size:18px" type="button" name = "save" id="btn" class = "btn btn-success" value="" onclick = "saves(3)">Сохранить</button></p>
                                <input type = "text" id="g1" value="" style="visibility:hidden">
                                <input type = "text" id="g2" value="'.$row["image"].'" style="visibility:hidden">
                            </form>
                        ';  
                    }while ($row = mysqli_fetch_array($r));
                }              
            } else {
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
            }
        ?>
        </div>
    </div>
    <script src="../../js/jquery.js"></script>
    <script>
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
                    img();
                }
            } else {
                let name = document.querySelector("#name").value
                let text = document.querySelector("#text").value
                let g = document.querySelector("#kol").value;
                let s = "a";
                for (let i = 1; i <= g; i++) {
                    if (!document.querySelector("#sena"+i+"").value || !document.querySelector("#gram"+i+"").value) s = "";
                }
                if (g === '0' || name === '' || text === '' || s === '') alert ("Заполните все поля!");
                else img();
        
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
        function img () {
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
            if (x === "6") {
                    let h = document.querySelector("#kol").value;
                    let name = document.querySelector("#name").value
                    let text = document.querySelector("#text").value
                    let f = document.getElementById("g1").value
                    let f2 = document.getElementById("g2").value
                    let mas = ["","",""];
                    let mas2 = ["","",""];
                    n = 3;
                    for (let i = 1; i <= h; i++) {
                        mas[i-1] = document.querySelector("#sena"+i+"").value;
                        mas2[i-1] = document.querySelector("#gram"+i+"").value;
                    }
                    let s1 = mas[0], s2 = mas[1],s3 = mas[2];
                    let g1 = mas2[0], g2 = mas2[1],g3 = mas2[2];
                    // console.log(x,n,y,name,text,f,f2,h,s1,s2,s3,g1,g2,g3);
                        $.ajax({
                            url:'./saveUp.php',
                            type:'POST',
                            cache:false,
                            data:{x,n,y,name,text,f,f2,h,s1,s2,s3,g1,g2,g3},
                            dataType:'html',
                            success: function (data) {
                                if (data === "1") alert ("Продукт обновлена!!!");
                                else  alert ("Ошибька!!!"+data);
                                window.location.replace("../products.php");
                            }
                        });
            } else {
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
        }
    </script>
  </body>
</html>
