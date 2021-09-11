<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive food website design tutorial </title>

    <!-- font awesome cdn link  -->
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
    <?include("cart.php");include("menu.php");?>
<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>food made with love</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptas accusamus tempore temporibus rem amet laudantium animi optio voluptatum. Natus obcaecati unde porro nostrum ipsam itaque impedit incidunt rem quisquam eos!</p>
        <a href="#" class="btn">order now</a>
    </div>

    <div class="image">
        <img src="images/home-img.png" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- speciality section starts  -->

<section class="speciality container" id="speciality">

    <h1 class="heading"> Наш<span> категория</span> </h1>

    <div class="box-container row">

        <?php
                include("./myPage/php/connect.php");
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
                          <p>'.substr($row["text"],0,100).'</p>
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

</section>
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
                    echo '
                        <div class="box">
                            <span class="price"> '.$row["summa"].' - '.$row["gram"].'</span>
                            <img src="'.$row["image"].'">
                            <h3>'.$row["aty"].'</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <a href="#" class="btn">order now</a>
                        </div>';
                } while($row = mysqli_fetch_array($r));
            }
        ?>
    </div>

</section>

<!-- popular section ends -->

<!-- steps section starts  -->

<div class="step-container">

    <h1 class="heading">how it <span>works</span></h1>

    <section class="steps">

        <div class="box">
            <img src="images/step-1.jpg" alt="">
            <h3>choose your favorite food</h3>
        </div>
        <div class="box">
            <img src="images/step-2.jpg" alt="">
            <h3>free and fast delivery</h3>
        </div>
        <div class="box">
            <img src="images/step-3.jpg" alt="">
            <h3>easy payments methods</h3>
        </div>
        <div class="box">
            <img src="images/step-4.jpg" alt="">
            <h3>and finally, enjoy your food</h3>
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
                    echo '
                        <div class="box">
                            <img src="'.$row["image"].'" alt="">
                            <div class="content">
                                <h3>'.$row["aty"].'</h3>
                                <p>'.$row["text"].'</p>
                                <a href="#" class="btn">ordern now</a>
                            </div>
                        </div>';
                } while($row = mysqli_fetch_array($r));
            }
        ?>
    </div>

</section>

<!-- gallery section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> our customers <span>reviews</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic1.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic2.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic3.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- order section starts  -->

<section class="order" id="order">

    <h1 class="heading"> <span>order</span> now </h1>

    <div class="row">
        
        <div class="image">
            <img src="images/order-img.jpg" alt="">
        </div>

        <form action="">

            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>

            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="food name">
            </div>

            <textarea placeholder="address" name="" id="" cols="30" rows="10"></textarea>

            <input type="submit" value="order now" class="btn">

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
    function size (s,g,i) {
        document.querySelector(".price"+i+"").innerHTML = s+" - "+g;
        document.querySelector(".size"+i+"").innerHTML = `<button class='btn' onclick = save('${s}','${g}',${i})>Добавить <i class='fa fa-cart-plus' aria-hidden='true'></i></button>`;
    }
    let x = 0;
    function save (s,g,i) {
        x++;
        document.querySelector(".kal").innerHTML = x;
    }
    // let cart = 0;
    function cart() {
        document.querySelector(".cartWindow").classList.toggle("activeCart");
        // alert("yes")
    }

</script>

</body>
</html>