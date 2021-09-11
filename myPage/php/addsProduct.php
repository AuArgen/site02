<?php
    include ("./connect.php");
    $x = $_POST["x"];
    $n = $_POST["n"];
    if ($x == 1) {
        if ($n == 6) {
            $r = $conn -> query ("SELECT * FROM tovar_pizza WHERE popular = ''");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Размер</th>
                        <th class="text-center">Добавить</th>
                    </tr>
                ';
                $count = 0;
                do {
                    $count++;
                    $s = "";
                    for ($i = 1; $i <= $row["kol"]; $i++) {
                        $s = $s.'<p>'.$row["sena".$i].' -> '.$row["gram".$i].'</p>';
                    }
                    echo '
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$row["aty"].'</td>
                            <td><img src="../.'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$s.'</td>
                            <td class="text-center"><button class="btn btn-success" style="font-size:20px" onclick="adds('.$row["id"].')">+</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
        else {
            $r = $conn -> query ("SELECT * FROM tovar WHERE type = '$n' AND popular = ''");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Грамм</th>
                        <th class="text-center">Добавить</th>
                    </tr>
                ';
                $count = 0;
                do {
                    $count++;
                    echo '
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$row["aty"].'</td>
                            <td><img src="../.'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$row["summa"].'</td>
                            <td class="text-center">'.$row["gram"].'</td>
                            <td class="text-center"><button class="btn btn-success" style="font-size:20px" onclick="adds('.$row["id"].')">+</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }

    } else {
        if ($n == 6) {
            $r = $conn -> query ("SELECT * FROM tovar_pizza WHERE gallery = ''");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Размер</th>
                        <th class="text-center">Добавить</th>
                    </tr>
                ';
                $count = 0;
                do {
                    $count++;
                    $s = "";
                    for ($i = 1; $i <= $row["kol"]; $i++) {
                        $s = $s.'<p>'.$row["sena".$i].' -> '.$row["gram".$i].'</p>';
                    }
                    echo '
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$row["aty"].'</td>
                            <td><img src="../.'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$s.'</td>
                            <td class="text-center"><button class="btn btn-success" style="font-size:20px" onclick="adds('.$row["id"].')">+</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
        else {
            $r = $conn -> query ("SELECT * FROM tovar WHERE type = '$n' AND gallery = ''");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Грамм</th>
                        <th class="text-center">Добавить</th>
                    </tr>
                ';
                $count = 0;
                do {
                    $count++;
                    echo '
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$row["aty"].'</td>
                            <td><img src="../.'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$row["summa"].'</td>
                            <td class="text-center">'.$row["gram"].'</td>
                            <td class="text-center"><button class="btn btn-success" style="font-size:20px" onclick="adds('.$row["id"].')">+</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
    }
?>