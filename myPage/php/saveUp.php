<?php
    include("./connect.php");
    if ($_POST["n"] == 1) {
        $m = array(
            $_POST["name"], $_POST["text"], $_POST["file"], $_POST["file2"],$_POST["fileI"],$_POST["fileI2"],$_POST["id"]
        );
        // var_dump($m);
        if ($m[2] == "") $m[2] = $m[4];
        else unlink('../.'.$m[4]);
        if ($m[3] == "") $m[3] = $m[5];
        else unlink('../.'.$m[5]);
        // var_dump($m);
        $conn -> query("UPDATE type SET aty = '$m[0]', text = '$m[1]', image = '$m[2]', image2 = '$m[3]' WHERE id = '$m[6]'");
        echo 1;
    }
?>