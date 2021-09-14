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
    <div class="home">
      <ul class="container p-5" id = "nova"></ul>
      <ul class="container p-5" style="margin-top:-60px;" id = "last"></ul>
      <ul class="container p-5 text-center" style="margin-top:-50px;" id = "button"><button class="btn btn-primary" style="font-size:20px" onclick = last()>Показать еще</button></ul>
    </div>
     <script src="../js/jquery.js"></script>
    <script src="./js/script.js"></script>
    <script>
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
                    // alert("Yes");
                    let kolegtor = document.querySelector("#kolegtor").value;
                    if (!localStorage.getItem("kolegtor_int_Argen_generation")) {
                      localStorage.setItem("kolegtor_int_Argen_generation",kolegtor);
                        var audio = new Audio('./mp3/sms.mp3');
                        audio.play();
                    } else {
                      let lSkolegtor = localStorage.getItem("kolegtor_int_Argen_generation");
                      if (lSkolegtor < +kolegtor) {
                        localStorage.setItem("kolegtor_int_Argen_generation",kolegtor);
                        var audio = new Audio('./mp3/sms.mp3');
                        audio.play();
                      } else localStorage.setItem("kolegtor_int_Argen_generation",kolegtor);
                    }
                }
            });
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
        let interval = setInterval(() => {
          nova();
        }, 5000);
    </script>
  </body>
</html>
