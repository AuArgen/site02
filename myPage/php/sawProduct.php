<?php
    include("./connect.php");
    $id = $_POST["n"];
    $r = $conn -> query("SELECT * FROM tovar WHERE type = '$id'");
    if (mysqli_num_rows($r)) {
        $row = mysqli_fetch_array($r);
        do {
            echo '
                <div class="box">
                    <span class="price">'.$row["summa"].'</span>
                    <img src=".'.$row["image"].'" alt="">
                    <h3>'.$row["aty"].'</h3>
                    <div class="row">
                    <a href="#" class="col btn btn-success"><img src="./img/pen.png" alt="T" style="width:20px;hieght:15px"/></a><a href="#" class="col btn btn-danger">X</a>
                    <div>
                </div>
            ';
        } while($row = mysqli_fetch_array($r));
    }
?>