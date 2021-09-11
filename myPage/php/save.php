<?php
    include("./connect.php");
    $n = $_POST["n"];
    if ($n == 1) {
        $nk = $_POST["name"];
        $t = $_POST["text"];
        $f = $_POST["file"];
        $f2 = $_POST["file2"];
        $conn -> query("INSERT INTO type (aty,text,image,image2) VALUES('$nk','$t','$f','$f2')");
        echo 1; 
    } else if ($n == 2) {
        $name = $_POST["name"];
        $text = $_POST["text"];
        $f = $_POST["f"];
        $s = $_POST["s"];
        $g = $_POST["g"];
        $x = $_POST["x"];
        $conn -> query("INSERT INTO tovar (aty,text,image,summa,gram,type,popular,gallery) VALUES('$name','$text','$f','$s','$g','$x','','')");
        echo 1;
    } else if ($n == 3) {
        $name = $_POST["name"];
        $text = $_POST["text"];
        $f = $_POST["f"];
        $x = $_POST["x"];
        $s1 = $_POST["s1"];
        $s2 = $_POST["s2"];
        $s3 = $_POST["s3"];
        $g1 = $_POST["g1"];
        $g2 = $_POST["g2"];
        $g3 = $_POST["g3"];
        $conn -> query("INSERT INTO tovar_pizza (aty,text,image,kol,sena1,sena2,sena3,gram1,gram2,gram3,popular,gallery) VALUES('$name','$text','$f','$x','$s1','$s2','$s3','$g1','$g2','$g3','','')");
        echo 1;
    } else if ($n == 4) {
        $x = $_POST["x"];
        $t = $_POST["t"];
        $i = $_POST["id"];
        if ($t == 1) {
            if ($x == 6) {
                $r = $conn -> query ("SELECT * FROM tovar_pizza WHERE id = '$i'");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    do {
                        $conn -> query("INSERT INTO popular (aty,text,image,kol,sena1,sena2,sena3,gram1,gram2,gram3,summa,gram,type,ids) VALUES('".$row["aty"]."','".$row["text"]."','".$row["image"]."','".$row["kol"]."','".$row["sena1"]."','".$row["sena2"]."','".$row["sena3"]."','".$row["gram1"]."','".$row["gram2"]."','".$row["gram3"]."','','','$x','$i')");
                        $conn -> query("UPDATE tovar_pizza SET popular = '1' WHERE id = '$i'");
                    } while ($row = mysqli_fetch_array($r));
                }
            } else {
                $r = $conn -> query ("SELECT * FROM tovar WHERE type = '$x' AND id = '$i'");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    do {
                        $conn -> query("INSERT INTO popular (aty,text,image,kol,sena1,sena2,sena3,gram1,gram2,gram3,summa,gram,type,ids) VALUES('".$row["aty"]."','".$row["text"]."','".$row["image"]."','','','','','','','','".$row["summa"]."','".$row["gram"]."','$x','$i')");
                        $conn -> query("UPDATE tovar SET popular = '1' WHERE type = '$x' AND id = '$i'");
                    } while ($row = mysqli_fetch_array($r));
                }
            }
            
        } else {
            if ($x == 6) {
                $r = $conn -> query ("SELECT * FROM tovar_pizza WHERE id = '$i'");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    do {
                        $conn -> query("INSERT INTO gallery (aty,text,image,kol,sena1,sena2,sena3,gram1,gram2,gram3,summa,gram,type,ids) VALUES('".$row["aty"]."','".$row["text"]."','".$row["image"]."','".$row["kol"]."','".$row["sena1"]."','".$row["sena2"]."','".$row["sena3"]."','".$row["gram1"]."','".$row["gram2"]."','".$row["gram3"]."','','','$x','$i')");
                        $conn -> query("UPDATE tovar_pizza SET gallery = '1' WHERE id = '$i'");
                    } while ($row = mysqli_fetch_array($r));
                }
            } else {
                $r = $conn -> query ("SELECT * FROM tovar WHERE type = '$x' AND id = '$i'");
                if (mysqli_num_rows($r)) {
                    $row = mysqli_fetch_array($r);
                    do {
                        $conn -> query("INSERT INTO gallery (aty,text,image,kol,sena1,sena2,sena3,gram1,gram2,gram3,summa,gram,type,ids) VALUES('".$row["aty"]."','".$row["text"]."','".$row["image"]."','','','','','','','','".$row["summa"]."','".$row["gram"]."','$x','$i')");
                        $conn -> query("UPDATE tovar SET gallery = '1' WHERE type = '$x' AND id = '$i'");
                    } while ($row = mysqli_fetch_array($r));
                }
            }
        }
    }
?>