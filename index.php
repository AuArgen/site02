<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive food website design tutorial </title>

    <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="./css/cssfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script> -->
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
</head>
<body>

<!-- header section starts  -->
    <?php include("cart.php");include("menu.php");?>
<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
            <?php 
            include("./myPage/php/connect.php");
                $r = $conn -> query("SELECT * FROM reklama WHERE theme != ''");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    do {
                        echo'
                            <h3>'.$row["theme"].'</h3>
                            <p>'.$row["text2"].'</p>
                        ';
                    } while($row = mysqli_fetch_array($r));
                }
            ?>
    </div>

    <div class="image">
        <?php 
            include("./slider.php");
        ?>
    </div>

</section>

<!-- home section ends -->

<!-- speciality section starts  -->

<section class="speciality container" id="speciality">

    <h1 class="heading"> Наш<span> категория</span> </h1>

    <div class="box-container row">

        <?php
                $mas = array();
                $r = $conn -> query("SELECT * FROM type");
                if (mysqli_num_rows($r)) {
                  $row = mysqli_fetch_array($r);
                  do {
                    $mas = array (
                        $row["id"] => ''.$row["aty"],
                    );
                    echo '
                    <div class="box">
                    <a href="#grbox" onclick = "sawMe('.$row["id"].')">
                      <img class="image" src="'.$row["image2"].'" style="width:100%; height:100%" alt="">
                      <div class="content">
                          <img src="'.$row["image"].'" height="50" alt="">
                          <h3>'.$row["aty"].'</h3>
                          <p>'.$row["text"].'</p>
                      </div>
                      </a>
                    </div>
                    ';
                  } while($row = mysqli_fetch_array($r));
                }
              ?>

    </div>

</section>

<!-- speciality section ends -->

<!-- products  starts-->
<section class="popular grbox" id="grbox">
                <h1 style="width:100%; text-align:center; font-size:3rem; color:red">Товары</h1>
                <br>
                <div class="box-container grbox2"></div>
</section>
<div class="buttonDale" style="width:100%; text-align:center">
                <button style="width:250px; padding:5px; border:1px solid black; background:white;text-align:center; font-size:25px;border-radius:15px; cursor:pointer;" onclick="sawAuto()">Показать еще</button>
</div>
<!-- products  ends-->

<!-- popular section starts  -->

<section class="popular" id="popular">

    <h1 class="heading"> самые <span>популярные</span> продукты </h1>

    <div class="box-container row">
        <?php 
            $r = $conn -> query("SELECT * FROM popular");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                do {
                $img = $row["image"];
                $aty = $row["aty"];
                $text = $row["text"];
                $id = $row["id"];
                $sena = $row["summa"];
                $gram = $row["gram"];
                $x = $row["type"];
                if ($x == 6) {
                    $sena = $row["sena1"];
                    $gram = $row["gram1"];
                }
                 echo "
                        <div class='box'>
                            <span class='price'> $sena - $gram</span>
                            <img src='$img'>
                            <h3>$aty</h3>
                            <p>$text</p>
                            <div class='stars'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='far fa-star'></i>
                            </div>
                            <button class='btn' onclick = popsave('$sena','$gram',$id)>Добавить <i class='fa fa-cart-plus' aria-hidden='true'></i></button>
                            <input type='hidden' class='popaty$id' value='$aty'>
                            <input type='hidden' class='poptype$id' value='$x'>
                            <input type='hidden' class='popimg$id' value='$img'>
                        </div>";
                } while($row = mysqli_fetch_array($r));
            }
        ?>
    </div>

</section>

<!-- popular section ends -->

<!-- steps section starts  -->

<div class="step-container">

    <h1 class="heading">как это <span>работает</span></h1>

    <section class="steps">

        <div class="box">
            <img src="images/step-1.jpg" alt="">
            <h3>выберите свою любимую еду</h3>
        </div>
        <div class="box">
            <img src="images/step-2.jpg" alt="">
            <h3>бесплатная и быстрая доставка</h3>
        </div>
        <div class="box">
            <img src="images/step-3.jpg" alt="">
            <h3>простые способы оплаты</h3>
        </div>
        <div class="box">
            <img src="images/step-4.jpg" alt="">
            <h3>и, наконец, наслаждайтесь едой</h3>
        </div>
    
    </section>

</div>

<!-- steps section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">

    <h1 class="heading"> наша еды <span> галерея </span> </h1>

    <div class="box-container">
        <?php 
            $r = $conn -> query("SELECT * FROM gallery");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                do {
                    $img = $row["image"];
                    $aty = $row["aty"];
                    $text = $row["text"];
                    $id = $row["id"];
                    $x = $row["type"];
                    $sena = $row["summa"];
                    $gram = $row["gram"];
                    if ($x == 6) {
                        $sena = $row["sena1"];
                        $gram = $row["gram1"];
                    }
                    echo "
                        <div class='box'>
                            <img src='$img' alt=''>
                            <div class='content'>
                                <h3>$aty</h3>
                                <p>$text</p>
                            <button class='btn' onclick = galsave('$sena','$gram',$id)>Добавить <i class='fa fa-cart-plus' aria-hidden='true'></i></button>
                            <input type='hidden' class='galaty$id' value='$aty'>
                            <input type='hidden' class='galtype$id' value='$x'>
                            <input type='hidden' class='galimg$id' value='$img'>
                            </div>
                        </div>";
                } while($row = mysqli_fetch_array($r));
            }
        ?>
    </div>

</section>

<!-- gallery section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> новый <span>отзывы</span> </h1>

    <div class="box-container">
        <?php
            $r = $conn -> query("SELECT * FROM otzyv WHERE ifElse = '1' ORDER BY id DESC"); 
            $n = mysqli_num_rows($r);
            if ($n) {
                $row = mysqli_fetch_array($r);
                do {
                echo'
                   <div class="box">
                        <img src="images/imgAva.png" alt="" width="100" height="100">
                        <h3>'.$row["aty"].'</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <p>'.$row["text"].'</p>
                    </div>
                ';
                } while ($row = mysqli_fetch_array($r));
            }
        ?>
    </div>

</section>

<!-- review section ends -->

<!-- order section starts  -->

<section class="order" id="order">

    <h1 class="heading">написать <span>отзывы</span></h1>

    <div class="row">
        
        <div class="image">
            <img src="images/order-img.jpg" alt="">
        </div>

        <form action="">

            <div class="inputBox">
                <input type="text" placeholder="Имя и фамилия" id = "atys" required>
            </div>
            <textarea placeholder="Коментарий" name="" id="text" cols="30" rows="10" maxlength="200" required></textarea>

            <input type="button" value="Отправить" class="btn btnOtzyv">

        </form>

    </div>

</section>

<!-- order section ends -->

<!-- footer section  -->

<?include("footer.php");?>
















<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/jquery.js"></script>
<script>
    document.querySelector(".btnOtzyv").onclick = () => {
        let name = document.querySelector("#atys").value
        let otzyv = document.querySelector("#text").value
        if (!name || !otzyv) alert("Для отправка отзыв надо запольнит все поле!");
        else {
            let n = 5
            $.ajax({
                url:'./myPage/php/save.php',
                type:'POST',
                cache:false,
                data:{n,name,otzyv},
                dataType:'html',
                success: function (data) {
                    if (data == 1) {
                        alert("Спосибо ваша отзыв сохранен!!");
                        document.querySelector("#atys").value = ''
                        document.querySelector("#text").value = ''
                    }
                    else alert (data)
                }
            });
        }
    }
    sawCart();
    function sawMe(x) {
         $.ajax({
                url:'./sawMe.php',
                type:'POST',
                cache:false,
                data:{x},
                dataType:'html',
                success: function (data) {
                    document.querySelector(".grbox").innerHTML = data;
                }
            });
    }
    let dale1 = 0, dale2 = 0;
    function sawAuto() {
        let x = -1;
         $.ajax({
                url:'./sawMe.php',
                type:'POST',
                cache:false,
                data:{x,dale1,dale2},
                dataType:'html',
                success: function (data) {
                    document.querySelector(".grbox2").innerHTML += data;
                    var ty = document.querySelector("#tovarsLength").value;
                    // alert(ty)
                    if (+ty <= dale1+dale2) document.querySelector(".buttonDale").style.display = "none";
                }
            });
        dale1 += 6;
        dale2 += 2;
        // alert(dale1)
    }
    sawAuto ();
    function size (s,g,i) {
        document.querySelector(".price"+i+"").innerHTML = s+" - "+g;
        document.querySelector(".size"+i+"").innerHTML = `<button class='btn' onclick = save('${s}','${g}',${i})>Добавить <i class='fa fa-cart-plus' aria-hidden='true'></i></button>`;
    }
    let x = 0;
    function save (s,g,i) {
        let aty = document.querySelector(".aty"+i).value
        let t = document.querySelector(".type"+i).value
        let img = document.querySelector(".img"+i).value
        let sname = aty;
        if (t === '6') aty+=" -> "+g;
        if (!localStorage.getItem("My_Site_Argen_Cart_Arrays_name")) {
            aty = [aty];
            s = [s];
            g = [g];
            t = [t];
            kol = [1];
            i = [i];
            sname = [sname];
            img = [img];
            localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(aty));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(sname));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(s));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(g));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(t));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(img));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(i));
            sawCart();
        } else {
            let name = localStorage.getItem("My_Site_Argen_Cart_Arrays_name");
            let names = localStorage.getItem("My_Site_Argen_Cart_Arrays_sname");
            let sena = localStorage.getItem("My_Site_Argen_Cart_Arrays_sena");
            let gram = localStorage.getItem("My_Site_Argen_Cart_Arrays_gram");
            let type = localStorage.getItem("My_Site_Argen_Cart_Arrays_type");
            let kol = localStorage.getItem("My_Site_Argen_Cart_Arrays_kol");
            let image = localStorage.getItem("My_Site_Argen_Cart_Arrays_img");
            let id = localStorage.getItem("My_Site_Argen_Cart_Arrays_id");
            names = JSON.parse(names);
            image = JSON.parse(image);
            name = JSON.parse(name);
            sena = JSON.parse(sena);
            gram = JSON.parse(gram);
            type = JSON.parse(type);
            kol = JSON.parse(kol);
            id = JSON.parse(id);
            let w = 0,ii;
            for (let i = 0; i < name.length; i++) {
                if (name[i] === aty) {
                    w = 1;
                    ii = i;
                    // console.log (name.splice(i,1))
                }
            }
            if (w) {
                kol[ii]++;
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                sawCart();
            } else {
                names.push(sname);
                image.push(img);
                name.push(aty);
                sena.push(s);
                gram.push(g);
                type.push(t);
                kol.push(1);
                id.push(i);
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(names));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(name));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(sena));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(gram));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(type));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(image));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(id));
                sawCart();
            }
            // console.log(name,sena,gram,type,kol)
        }
    }
    // let cart = 0;
    function cart() {
        document.querySelector(".cartWindow").classList.toggle("activeCart");
        // alert("yes")
    }
    function sawCart() {
        if (localStorage.getItem("My_Site_Argen_Cart_Arrays_name")) {
            let name = localStorage.getItem("My_Site_Argen_Cart_Arrays_name");
            let names = localStorage.getItem("My_Site_Argen_Cart_Arrays_sname");
            let sena = localStorage.getItem("My_Site_Argen_Cart_Arrays_sena");
            let gram = localStorage.getItem("My_Site_Argen_Cart_Arrays_gram");
            let type = localStorage.getItem("My_Site_Argen_Cart_Arrays_type");
            let kol = localStorage.getItem("My_Site_Argen_Cart_Arrays_kol");
            let image = localStorage.getItem("My_Site_Argen_Cart_Arrays_img");
            let id = localStorage.getItem("My_Site_Argen_Cart_Arrays_id");
            names = JSON.parse(names);
            image = JSON.parse(image);
            name = JSON.parse(name);
            sena = JSON.parse(sena);
            gram = JSON.parse(gram);
            type = JSON.parse(type);
            kol = JSON.parse(kol);
            id = JSON.parse(id);
            let s = '';
                summa = 0,
                kal = 0;
            for (let i = 0; i < name.length; i++) {
                let a = 0,b = "",c = sena[i], sany = 0;
                for (let k = 0; k < c.length;k++) {
                    let r = 0;
                    for (let j = 0; j < 10; j++) {
                        if (c[k] === ''+j) r++; 
                    }
                    if (r) b += c[k];
                    else break;
                }
                sany = kol[i];
                kal += +sany;
                a = b*sany;
                summa += a;
                s += `
                        <div class = "cartDiv"> 
                            <div class="img">
                                <img src = "${image[i]}" alt = "${names[i]}" width="150">
                            </div>
                            <div class = "nameSumma">
                                <p style="text-align:center">${names[i]}</p>
                                <p style="text-align:center">${a}</p>
                            </div>
                            <div class="deleteInput">
                                <p><input style="text-align:center; font-size:20px" min="1" class="inp${i}" type="number" onchange = "inpt(${i},'${name[i]}')" value="${kol[i]}"></p>
                                <p><button class="btn" onclick="deletea('${name[i]}')">X</button></p>
                            </div>
                        </div>
                `;
            }
            s += `<div class="summaZakaz"><h3>Сумма заказа: ${summa}</h3></div>
                    <div class="form">
        <form action="" method = "post">
            <div class="divRow">
                <div class="divCol"><input type="name"placeholder="ФИО" name="name" id="name" required></div>
                <div class="divCol"><input type="addres"placeholder="Адрес" name="adres" id="adres" required></div>
            </div>
            <div class="divRow">
                <div class="divCol"><input type="tel" placeholder="Тел"name="tel" id="tel" required></div>
                <div class="divCol">
                    <input type="radio" name="radio" checked id="radio1"><label for="radio1" required>Курьер</label> 
                    <input type="radio" name="radio" id="radio2"><label for="radio2" required>Такси</label> 
                    <input type="radio" name="radio" id="radio3"><label for="radio3" required>Почта</label> 
                </div>
            </div>
            <div class="divRow">
                <br>
                <button class = "" type="button" style="text-align:center" onclick = "oformit()"><span style="width:100%; text-align:center;">Оформить заказ</span></button>
            </div>
        </form>
        </div>
        <input type="hidden" id = "kal">
            `;
            document.querySelector(".main").innerHTML = s;
            document.querySelector(".kal").innerHTML = kal;
            document.querySelector("#kal").value = kal;
            if (kal === 0) document.querySelector(".main").innerHTML = '<img src="./images/empty-cart.png" alt="">';
        } else {document.querySelector(".main").innerHTML = `<img src="./images/empty-cart.png" alt="">`;}
    }
    // 
    // 
    // 
    function oformit () {
        let fio = document.querySelector("#name").value,
            adres = document.querySelector("#adres").value,
            tel = document.querySelector("#tel").value,
            kal = document.querySelector("#kal").value,
            radio,ids;
        if (document.querySelector("#radio1").checked) radio = 'Курьер';
        if (document.querySelector("#radio2").checked) radio = 'Такси';
        if (document.querySelector("#radio3").checked) radio = 'Почта';
        if (!adres || !tel || !fio) alert ("Заполните все поля!!!");
        else {
            // console.log (fio,adres,tel,radio,kal);
            $.ajax({
                    url:'./klient.php',
                    type:'POST',
                    cache:false,
                    data:{fio,adres,tel,kal,radio},
                    dataType:'html',
                    success: function (data) {
                        ids = data;
                        let name = localStorage.getItem("My_Site_Argen_Cart_Arrays_name");
                        let names = localStorage.getItem("My_Site_Argen_Cart_Arrays_sname");
                        let sena = localStorage.getItem("My_Site_Argen_Cart_Arrays_sena");
                        let gram = localStorage.getItem("My_Site_Argen_Cart_Arrays_gram");
                        let type = localStorage.getItem("My_Site_Argen_Cart_Arrays_type");
                        let kol = localStorage.getItem("My_Site_Argen_Cart_Arrays_kol");
                        let image = localStorage.getItem("My_Site_Argen_Cart_Arrays_img");
                        let id = localStorage.getItem("My_Site_Argen_Cart_Arrays_id");
                        names = JSON.parse(names);
                        image = JSON.parse(image);
                        name = JSON.parse(name);
                        sena = JSON.parse(sena);
                        gram = JSON.parse(gram);
                        type = JSON.parse(type);
                        kol = JSON.parse(kol);
                        id = JSON.parse(id);
                        let w = 0,ii = name.length-1;

                        for (let i = ii; i >= 0 ;i--) {
                            let a = names[i],a2 = image[i], a3 = sena[i], a4 = gram[i], a5 = kol[i];
                            $.ajax({
                                    url:'./zakazy.php',
                                    type:'POST',
                                    cache:false,
                                    data:{ids,a,a2,a3,a4,a5},
                                    dataType:'html',
                                    success: function (data) {
                                        radio = data;
                                    }
                            });
                            names.splice(i,1);
                            image.splice(i,1);
                            name.splice(i,1);
                            type.splice(i,1);
                            sena.splice(i,1);
                            gram.splice(i,1);
                            kol.splice(i,1);
                            id.splice(i,1);
                        }
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(names));
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(image));
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(name));
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(sena));
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(gram));
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(type));
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                        localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(id));
                    }
            });
            // localStorage.clear();
            alert ("Вы успешно оформили заказ ... Спасибо");
            sawCart();
        }
    }
    // 
    // 
    // 
    function deletea (x) {
            let name = localStorage.getItem("My_Site_Argen_Cart_Arrays_name");
            let names = localStorage.getItem("My_Site_Argen_Cart_Arrays_sname");
            let sena = localStorage.getItem("My_Site_Argen_Cart_Arrays_sena");
            let gram = localStorage.getItem("My_Site_Argen_Cart_Arrays_gram");
            let type = localStorage.getItem("My_Site_Argen_Cart_Arrays_type");
            let kol = localStorage.getItem("My_Site_Argen_Cart_Arrays_kol");
            let image = localStorage.getItem("My_Site_Argen_Cart_Arrays_img");
            let id = localStorage.getItem("My_Site_Argen_Cart_Arrays_id");
            names = JSON.parse(names);
            image = JSON.parse(image);
            name = JSON.parse(name);
            sena = JSON.parse(sena);
            gram = JSON.parse(gram);
            type = JSON.parse(type);
            kol = JSON.parse(kol);
            id = JSON.parse(id);
            let w = 0,ii;
            for (let i = 0; i < id.length; i++) {
                if (name[i] === x) {
                    w = 1;
                    ii = i;
                    // console.log (name.splice(i,1))
                }
            }
            if (w) {
                names.splice(ii,1);
                image.splice(ii,1);
                name.splice(ii,1);
                type.splice(ii,1);
                sena.splice(ii,1);
                gram.splice(ii,1);
                kol.splice(ii,1);
                id.splice(ii,1);
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(names));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(image));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(name));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(sena));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(gram));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(type));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(id));
                sawCart();
            }
    } 
    function inpt (x,z) {
        y = document.querySelector(".inp"+x).value
        if ((+y) < 1 && y !="") y = 1;
        y = +y;
        y = document.querySelector(".inp"+x).value = y;
        if (y != "") {
            let name = localStorage.getItem("My_Site_Argen_Cart_Arrays_name");
            let kol = localStorage.getItem("My_Site_Argen_Cart_Arrays_kol");
            kol = JSON.parse(kol);
            name = JSON.parse(name);
            let w = 0,ii;
            for (let i = 0; i < name.length; i++) {
                if (name[i] === z) {
                    w = 1;
                    ii = i;
                    // console.log (name.splice(i,1))
                }
            }
            if (w) {
                kol[ii] = y ;
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                sawCart();
            }
        }
    }
    function popsave (s,g,i) {
        let aty = document.querySelector(".popaty"+i).value
        let t = document.querySelector(".poptype"+i).value
        let img = document.querySelector(".popimg"+i).value
        let sname = aty;
        if (t === '6') aty+=" -> "+g;
        if (!localStorage.getItem("My_Site_Argen_Cart_Arrays_name")) {
            aty = [aty];
            s = [s];
            g = [g];
            t = [t];
            kol = [1];
            i = [i];
            sname = [sname];
            img = [img];
            localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(aty));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(sname));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(s));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(g));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(t));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(img));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(i));
            sawCart();
        } else {
            let name = localStorage.getItem("My_Site_Argen_Cart_Arrays_name");
            let names = localStorage.getItem("My_Site_Argen_Cart_Arrays_sname");
            let sena = localStorage.getItem("My_Site_Argen_Cart_Arrays_sena");
            let gram = localStorage.getItem("My_Site_Argen_Cart_Arrays_gram");
            let type = localStorage.getItem("My_Site_Argen_Cart_Arrays_type");
            let kol = localStorage.getItem("My_Site_Argen_Cart_Arrays_kol");
            let image = localStorage.getItem("My_Site_Argen_Cart_Arrays_img");
            let id = localStorage.getItem("My_Site_Argen_Cart_Arrays_id");
            names = JSON.parse(names);
            image = JSON.parse(image);
            name = JSON.parse(name);
            sena = JSON.parse(sena);
            gram = JSON.parse(gram);
            type = JSON.parse(type);
            kol = JSON.parse(kol);
            id = JSON.parse(id);
            let w = 0,ii;
            for (let i = 0; i < name.length; i++) {
                if (name[i] === aty) {
                    w = 1;
                    ii = i;
                    // console.log (name.splice(i,1))
                }
            }
            if (w) {
                kol[ii]++;
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                sawCart();
            } else {
                names.push(sname);
                image.push(img);
                name.push(aty);
                sena.push(s);
                gram.push(g);
                type.push(t);
                kol.push(1);
                id.push(i);
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(names));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(name));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(sena));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(gram));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(type));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(image));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(id));
                sawCart();
            }
            // console.log(name,sena,gram,type,kol)
        }
    }
    function galsave (s,g,i) {
        let aty = document.querySelector(".galaty"+i).value
        let t = document.querySelector(".galtype"+i).value
        let img = document.querySelector(".galimg"+i).value
        let sname = aty;
        if (t === '6') aty+=" -> "+g;
        if (!localStorage.getItem("My_Site_Argen_Cart_Arrays_name")) {
            aty = [aty];
            s = [s];
            g = [g];
            t = [t];
            kol = [1];
            i = [i];
            sname = [sname];
            img = [img];
            localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(aty));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(sname));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(s));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(g));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(t));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(img));
            localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(i));
            sawCart();
        } else {
            let name = localStorage.getItem("My_Site_Argen_Cart_Arrays_name");
            let names = localStorage.getItem("My_Site_Argen_Cart_Arrays_sname");
            let sena = localStorage.getItem("My_Site_Argen_Cart_Arrays_sena");
            let gram = localStorage.getItem("My_Site_Argen_Cart_Arrays_gram");
            let type = localStorage.getItem("My_Site_Argen_Cart_Arrays_type");
            let kol = localStorage.getItem("My_Site_Argen_Cart_Arrays_kol");
            let image = localStorage.getItem("My_Site_Argen_Cart_Arrays_img");
            let id = localStorage.getItem("My_Site_Argen_Cart_Arrays_id");
            names = JSON.parse(names);
            image = JSON.parse(image);
            name = JSON.parse(name);
            sena = JSON.parse(sena);
            gram = JSON.parse(gram);
            type = JSON.parse(type);
            kol = JSON.parse(kol);
            id = JSON.parse(id);
            let w = 0,ii;
            for (let i = 0; i < name.length; i++) {
                if (name[i] === aty) {
                    w = 1;
                    ii = i;
                    // console.log (name.splice(i,1))
                }
            }
            if (w) {
                kol[ii]++;
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                sawCart();
            } else {
                names.push(sname);
                image.push(img);
                name.push(aty);
                sena.push(s);
                gram.push(g);
                type.push(t);
                kol.push(1);
                id.push(i);
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sname",JSON.stringify(names));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_name",JSON.stringify(name));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_sena",JSON.stringify(sena));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_gram",JSON.stringify(gram));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_type",JSON.stringify(type));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_kol",JSON.stringify(kol));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_img",JSON.stringify(image));
                localStorage.setItem("My_Site_Argen_Cart_Arrays_id",JSON.stringify(id));
                sawCart();
            }
            // console.log(name,sena,gram,type,kol)
        }
    }

</script>

</body>
</html>