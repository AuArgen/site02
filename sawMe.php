<?php
    include("./myPage/php/connect.php");
    $x = $_POST["x"];
        $r = $conn -> query("SELECT * FROM type WHERE id = '$x'");
        $name;
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            do {
                $name = $row["aty"];
            } while ($row = mysqli_fetch_array($r));
        }
    if ($x == 6) {
        $r = $conn -> query("SELECT * FROM tovar_pizza");
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            echo '
                <h1 class="heading" id = "product"><span>'.$name.'</span></h1>
                <div class="box-container">
            ';
            do {
                $s = '<div style="display:flex;flex-wrap:wrap; gap:2px; justify-content:center">';
                for($i = 1; $i <= $row["kol"]; $i++) {
                    $sena = $row['sena'.$i];
                    $gram = $row['gram'.$i];
                    $id = $row['id'];
                    $s = $s."<button class='btn' onclick = size('$sena','$gram',$id) style='padding:2px;'>$gram</button>";
                }
                $s = $s.'</div>';
                $img = $row["image"];
                $aty = $row["aty"];
                $text = $row["text"];
                $id = $row["id"];
                $sena = $row["sena1"];
                $gram = $row["gram1"];
                 echo "
                        <div class='box'>
                            <img src='$img'>
                            <h3>$aty</h3>
                            <h4 style='font-size:16px;'>$text</h4>
                            $s<br>
                            <span class='price price$id' style='position:relative; padding:3px;top:0px; left:0px'>$sena - $gram </span>
                            <p class='psize size$id' ><button class='btn' onclick = save('$sena','$gram',$id)>Добавить <i class='fa fa-cart-plus' aria-hidden='true'></i></button></p>
                            <input type='hidden' class='aty$id' value='$aty'>
                            <input type='hidden' class='type$id' value='6'>
                            <input type='hidden' class='img$id' value='$img'>
                        </div>";
            } while ($row = mysqli_fetch_array($r));
            echo '</div>';
        }

    } else {
        $r = $conn -> query("SELECT * FROM tovar WHERE type = '$x' ORDER BY id DESC ");
        if (mysqli_num_rows($r)) {
            $row = mysqli_fetch_array($r);
            echo '
                <h1 class="heading" id = "product"><span>'.$name.'</span></h1>
                <div class="box-container">
            ';
            do {
                $img = $row["image"];
                $aty = $row["aty"];
                $text = $row["text"];
                $id = $row["id"];
                $sena = $row["summa"];
                $gram = $row["gram"];
                 echo "
                        <div class='box'>
                            <span class='price'> $sena - $gram</span>
                            <img src='$img'>
                            <h3>$aty</h3>
                            <p>$text</p>
                            <button class='btn' onclick = save('$sena','$gram',$id)>Добавить <i class='fa fa-cart-plus' aria-hidden='true'></i></button>
                            <input type='hidden' class='aty$id' value='$aty'>
                            <input type='hidden' class='type$id' value='$x'>
                            <input type='hidden' class='img$id' value='$img'>
                        </div>";
            } while ($row = mysqli_fetch_array($r));
            echo '</div>';
        }
    }
    
?>