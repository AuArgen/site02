<?php
    include("./myPage/php/connect.php");
    $fio = $_POST["fio"];
    $adres = $_POST["adres"];
    $tel = $_POST["tel"];
    $radio = $_POST["radio"];
    $kol = $_POST["kal"];
    $conn -> query("INSERT INTO klient (aty,adres,tel,radio,kol,reading) VALUES ('$fio','$adres','$tel','$radio','$kol','1')");
    $r = $conn -> query("SELECT * FROM klient ORDER BY id DESC LIMIT 1");
    if (mysqli_num_rows($r)) {
        $row = mysqli_fetch_array ($r);
        do {
            echo $row["id"];
        } while ($row = mysqli_fetch_array($r));
    }
?>