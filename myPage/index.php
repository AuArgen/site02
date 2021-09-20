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
    <title>Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
  </head>
  <body>
    <?php include("./menu.php");?>
    <div class="home container" style="background:white;">
      <div class="container"> 
        <h3 style="margin-top:20px; background:#d7d3d2; text-align:center; padding:10px; font-size:25px;">Общая статистика</h3>
        <div class="ob row"></div>
      </div>
      <h3 style="margin-top:20px; background:#d7d3d2; text-align:center; padding:10px; font-size:25px;" class="container">Заказы</h3>
      <ul class="container p-5" id = "nova"></ul>
      <ul class="container p-5" style="margin-top:-60px;" id = "last"></ul>
      <ul class="container p-5 text-center" style="margin-top:-50px;" id = "button"><button class="btn btn-primary" style="font-size:20px" onclick = last()>Показать еще</button></ul>
    </div>
     <script src="../js/jquery.js"></script>
    <script src="./js/script.js"></script>
    <script>
      document.querySelector("#menuName1").style.color = "green";
      document.querySelector("#menuName1").style.borderBottom = "2px solid red";
        // document.querySelector("#p").onchange = () => {
        //     pervod(document.querySelector("#p").value);
        //     document.querySelector(".table").innerHTML = "";
        // }
        // function pervod (n) {
        //     let x = 2;
        //     $.ajax({
        //         url:'./php/sawProduct.php',
        //         type:'POST',
        //         cache:false,
        //         data:{n,x},
        //         dataType:'html',
        //         success: function (data) {
        //             document.querySelector(".table").innerHTML = data;
        //         }
        //     });
        // }
        function nova () {
          let x = 4,n = 0;
           $.ajax({
                url:'./php/sawProduct.php',
                type:'POST',
                cache:false,
                data:{x,n},
                dataType:'html',
                success: function (data) {
                    document.querySelector("#nova").innerHTML = data;
                }
            });
            ob();
        }
        nova();
        let vybor = 0;
        function last() {
          let x = 5, n = 0;
            $.ajax({
                url:'./php/sawProduct.php',
                type:'POST',
                cache:false,
                data:{n,x,vybor},
                dataType:'html',
                success: function (data) {
                    document.querySelector("#last").innerHTML += data;
                    let t = document.querySelector("#vybor").value;
                    // alert(t)
                    if (+t <= vybor) document.querySelector("#button").style.display="none";
                }
            });
            vybor += 10;
        }
        last();
        let intervals = setInterval(() => {
          nova();
        }, 2000);
        function ob() {
          let x = 10,n = 0;
           $.ajax({
                url:'./php/sawProduct.php',
                type:'POST',
                cache:false,
                data:{x,n},
                dataType:'html',
                success: function (data) {
                    document.querySelector(".ob").innerHTML = data;
                }
            });
        }
    </script>
  </body>
</html>
