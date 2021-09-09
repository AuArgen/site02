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
    }
?>