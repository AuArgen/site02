<?php
    include("./connect.php");
    $y = $_POST["y"];
    if ($y == 1) {
        $id = $_POST["x"];
        $fileI = $_POST["fileI"];
        $fileI2 = $_POST["fileI2"];
        $conn -> query("DELETE FROM type WHERE id = '$id'");
        unlink('../.'.$fileI);
        unlink('../.'.$fileI2);
        echo 1;
    }
    if ($y == 2) {
        $x = $_POST["x"];
        $z = $_POST["z"];
        $f = $_POST["f"];
        if ($x == 6) {
            $conn -> query("DELETE FROM tovar_pizza WHERE id = '$z'");
            unlink('../.'.$f);
        } else {
            $conn -> query("DELETE FROM tovar WHERE id = '$z' AND type = '$x'");
            unlink('../.'.$f);
        }
        $conn -> query("DELETE FROM popular WHERE ids = '$z' AND type = '$x'");
        $conn -> query("DELETE FROM gallery WHERE ids = '$z' AND type = '$x'");
    }
    if ($y == 3) {
        $x = $_POST["x"];
        $z = $_POST["z"];
        $i = $_POST["i"];
        $conn -> query("DELETE FROM popular WHERE id = '$x'");
        if ($z == 6) {
            $conn -> query("UPDATE tovar_pizza SET popular = '' WHERE id = '$i'");
        } else {
            $conn -> query("UPDATE tovar SET popular = '' WHERE type = '$z' AND id = '$i'");
        }
    }
    if ($y == 4) {
        $x = $_POST["x"];
        $z = $_POST["z"];
        $i = $_POST["i"];
        $conn -> query("DELETE FROM gallery WHERE id = '$x'");
        if ($z == 6) {
            $conn -> query("UPDATE tovar_pizza SET gallery = '' WHERE id = '$i'");
        } else {
            $conn -> query("UPDATE tovar SET gallery = '' WHERE type = '$z' AND id = '$i'");
        }
    }
    if ($y == 5) {
        $x = $_POST["x"];
        $conn -> query("DELETE FROM otzyv WHERE id = '$x'");
    }
    if ($y == 6) {
        $x = $_POST["x"];
        $conn -> query("DELETE FROM klient WHERE id = '$x'");
        $conn -> query("DELETE FROM zakazy WHERE id = '$x'");
    }
?> 