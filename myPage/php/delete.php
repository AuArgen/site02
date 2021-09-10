<?php
    include("./connect.php");
    if ($_POST["y"] == 1) {
        $id = $_POST["x"];
        $fileI = $_POST["fileI"];
        $fileI2 = $_POST["fileI2"];
        $conn -> query("DELETE FROM type WHERE id = '$id'");
        unlink('../.'.$fileI);
        unlink('../.'.$fileI2);
        echo 1;
    } else if ($_POST["y"] == 2) {
        $x = $_POST["x"];
        $z = $_POST["z"];
        $f = $_POST["f"];
        if ($x == 6) {
            $conn -> query("DELETE FROM tovar_pizza WHERE id = '$z'");
            unlink('../.'.$f);
        } else {
            $conn -> query("DELETE FROM tovar WHERE id = '$z' AND type = '$x' ");
            unlink('../.'.$f);
        }
    }
?> 