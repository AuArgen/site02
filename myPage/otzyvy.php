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
    <title>Отзывы</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/addbab05b6.js"></script>
  </head>
  <body>
    <?php include("./menu.php");?>
    <div class="home">
        <div class="container" style="background:white">
            <ul class="container p-5" id = "nova"></ul>
            <ul class="container p-5" style="margin-top:-60px;" id = "last"></ul>
        </div>
    </div>
     <script src="../js/jquery.js"></script>
    <script src="./js/script.js"></script>
    <script>
      document.querySelector("#menuName7").style.color = "green";
      document.querySelector("#menuName7").style.borderBottom = "2px solid red";
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
          let x = 7,n = 0;
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
        }
        nova();
        function last() {
          let x = 8, n = 0;
            $.ajax({
                url:'./php/sawProduct.php',
                type:'POST',
                cache:false,
                data:{n,x},
                dataType:'html',
                success: function (data) {
                    document.querySelector("#last").innerHTML = data;
                }
            });
        }
        last();
        let intervals = setInterval(() => {
          nova();
        }, 2000);
        function deletes (x,z) {
            let y = 5;
            $.ajax({
                url:'./php/delete.php',
                type:'POST',
                cache:false,
                data:{x,y},
                dataType:'html',
                success: function (data) {
                    if (+z == 1) last();
                    else nova();
                }
            });
        }

        function adds (x) {
            let n = 4;
            $.ajax({
                url:'./php/saveUp.php',
                type:'POST',
                cache:false,
                data:{x,n},
                dataType:'html',
                success: function (data) {
                    nova();
                    last();
                }
            });
        }
    </script>
  </body>
</html>
