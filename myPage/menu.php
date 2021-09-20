<header>

    <a href="./" class="logo"><i class=""><img src="../images/taun-logo.jpg" width="60" alt=""></i>TAUN</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a id="menuName1" href="./">Главная</a>
        <a id="menuName2" href="./category.php">Категория</a>
        <a id="menuName3" href="./products.php">Продукты</a>
        <a id="menuName4" href="./popular.php">Популярные</a>
        <a id="menuName5" href="./gallery.php">Галерея</a>
        <a id="menuName6" href="./reklama.php">Рек. - Под</a>
        <a id="menuName7" href="./otzyvy.php">Отзывы</a>
        <a id="menuName9" href="#order"><form action="" method="post"> <button type="submit" class="" name="exit"><i class="fas fa-sign-out-alt"></i></button></form></a>
    </nav>
    <?php
        if (isset($_POST["exit"])) {
            unset($_SESSION["log"]);
            unset($_SESSION["pass"]);
            header("Location:register.php");
        }
    ?>
    <input type="hidden" name="" value = "0" id = "valuesss">
    <input type="hidden" name="" value = "0" id = "valuesss2">
</header>
<script src="../js/jquery.js"></script>
<script>
     function home () {
          let x = 6,n = 0;
           $.ajax({
                url:'./php/sawProduct.php',
                type:'POST',
                cache:false,
                data:{x,n},
                dataType:'html',
                success: function (data) {
                    let kolegtor = data;
                    if (+kolegtor) {
                        document.querySelector("#menuName1").innerHTML = "Главная <span class='badge bg-danger text-light' style='border-radius:50%; font-size:15px'>"+kolegtor+"</span>"; 
                        playAudio();
                    }
                    else document.querySelector("#menuName1").innerHTML = "Главная"; 
                }
            });
            otzyv();
        }
        
        function otzyv () {
          let x = 9,n=0;
           $.ajax({
                url:'./php/sawProduct.php',
                type:'POST',
                cache:false,
                data:{x,n},
                dataType:'html',
                success: function (data) {
                    let kolegtor = data;
                    // alert(data)
                    if (+kolegtor) {
                        document.querySelector("#menuName7").innerHTML = "Отзывы <span class='badge bg-danger text-light' style='border-radius:50%; font-size:15px'>"+kolegtor+"</span>"; 
                        // playAudio();
                    }
                    else document.querySelector("#menuName7").innerHTML = "Отзывы"; 
                }
            });
        }
        home();
        let interval = setInterval(() => {
          home();
        }, 2000);
        var audio = new Audio('./mp3/sms2.mp3');
        function playAudio () {
            let xs =  document.querySelector("#valuesss").value;
            xs = +xs;
            // console.log (xs + xs)
            // alert(xs); 
            if (xs == 0) {
                audio.play(); 
                document.querySelector("#valuesss2").value = audio.duration;
                audio.currentTime = xs;
            } 
            let yx = document.querySelector("#valuesss2").value;
            // xs++;
            if (+yx < xs) {
                xs = 0;
                // xs = 150
                // alert (yx)
            } 
            else xs+=2; 
            document.querySelector("#valuesss").value = xs 
            let audioTimes = setInterval(() => {
                 ()=> {
                    if (Math.floor(xs) >= Math.floor(yx)) {
                        // misuri = 0;
                        // document.querySelector("#valuesss").value = 150;
                        // alert (yx)
                        home();
                    } 
                }
            }, 100);
        }
</script>