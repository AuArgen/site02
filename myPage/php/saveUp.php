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
    } else if ($_POST["n"] == 2) {
        $m = array (
            $_POST["name"], $_POST["text"],$_POST["x"], $_POST["y"],$_POST["f"], $_POST["f2"],$_POST["s"], $_POST["g"]
        );
        // var_dump($m);
        if ($m[4] == "") $m[4] = $m[5];
        else unlink('../.'.$m[5]);
        $conn -> query("UPDATE tovar SET aty = '$m[0]', text = '$m[1]', image = '$m[4]',summa = '$m[6]',gram='$m[7]' WHERE id = '$m[3]' AND type = '$m[2]'");
        echo 1;
    } else if ($_POST["n"] == 3) {
        $m = array (
            $_POST["name"], $_POST["text"],$_POST["x"], $_POST["y"],$_POST["f"], $_POST["f2"], $_POST["h"],$_POST["s1"], $_POST["s2"], $_POST["s3"], $_POST["g1"], $_POST["g2"], $_POST["g3"]
        );
        // var_dump($m);
        if ($m[4] == "") $m[4] = $m[5];
        else unlink('../.'.$m[5]);
        $conn -> query("UPDATE tovar_pizza SET aty = '$m[0]', text = '$m[1]', image = '$m[4]',kol = '$m[6]',sena1 = '$m[7]',sena2 = '$m[8]',sena3 = '$m[9]', gram1 = '$m[10]', gram2 = '$m[11]', gram3 = '$m[12]' WHERE id = '$m[3]'");
        echo 1;
    }
?>