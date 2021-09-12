<?php
    include("./myPage/php/connect.php");
    $id = $_POST["ids"];
    $a = $_POST["a"];
    $a2 = $_POST["a2"];
    $a3 = $_POST["a3"];
    $a4 = $_POST["a4"];
    $a5 = $_POST["a5"];
    $conn -> query("INSERT INTO zakazy (aty,image,sena,gram,kol,id) VALUES ('$a','$a2','$a3','$a4','$a5','$id')");
?>