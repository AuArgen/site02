<?php
    include("./connect.php");
    $id = $_POST["n"];
    $x = $_POST["x"];
    if ($x == 1) {
        if ($id == 6) {
            $r = $conn -> query("SELECT * FROM tovar_pizza");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Размер</th>
                        <th class="text-center">Редактор</th>
                        <th class="text-center">Удалить</th>
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
                            <td><img src=".'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$s.'</td>
                            <td class="text-center"><a href = "./php/updateProduct.php?id='.$row["id"].'&type='.$id.'"><button class="btn btn-success"><img src="./img/pen.png" alt="t" width="30"></button></a></td>
                            <td class="text-center"><button class="btn btn-danger" style="font-size:20px" onclick="deletes('.$id.','.$row["id"].')">X</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"> </td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }else {
            $r = $conn -> query("SELECT * FROM tovar WHERE type = '$id'");
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Грамм</th>
                        <th class="text-center">Редактор</th>
                        <th class="text-center">Удалить</th>
                    </tr>
                ';
                $count = 0;
                do {
                    $count++;
                    echo '
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$row["aty"].'</td>
                            <td><img src=".'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$row["summa"].'</td>
                            <td class="text-center">'.$row["gram"].'</td>
                            <td class="text-center"><a href = "./php/updateProduct.php?id='.$row["id"].'&type='.$id.'"><button class="btn btn-success"><img src="./img/pen.png" alt="t" width="30"></button></a></td>
                            <td class="text-center"><button class="btn btn-danger" style="font-size:20px" onclick="deletes('.$id.','.$row["id"].')">X</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
    }
    if ($x == 2) {
        $r = $conn -> query ("SELECT * FROM popular WHERE type = '$id'");
        if ($id == 6) {
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Размер</th>
                        <th class="text-center">Удалить</th>
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
                            <td><img src=".'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$s.'</td>
                            <td class="text-center"><button class="btn btn-danger" style="font-size:20px" onclick="deletes('.$row["id"].','.$row["ids"].')">X</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
        else {
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Грамм</th>
                        <th class="text-center">Удалить</th>
                    </tr>
                ';
                $count = 0;
                do {
                    $count++;
                    echo '
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$row["aty"].'</td>
                            <td><img src=".'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$row["summa"].'</td>
                            <td class="text-center">'.$row["gram"].'</td>
                            <td class="text-center"><button class="btn btn-danger" style="font-size:20px" onclick="deletes('.$row["id"].','.$row["ids"].')">X</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
    }
    if ($x == 3) {
        $r = $conn -> query ("SELECT * FROM gallery WHERE type = '$id'");
        if ($id == 6) {
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Размер</th>
                        <th class="text-center">Удалить</th>
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
                            <td><img src=".'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$s.'</td>
                            <td class="text-center"><button class="btn btn-danger" style="font-size:20px" onclick="deletes('.$row["id"].','.$row["ids"].')">X</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
        else {
            if (mysqli_num_rows($r)) {
                $row = mysqli_fetch_array($r);
                echo'
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Картинка</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Грамм</th>
                        <th class="text-center">Удалить</th>
                    </tr>
                ';
                $count = 0;
                do {
                    $count++;
                    echo '
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$row["aty"].'</td>
                            <td><img src=".'.$row["image"].'" alt="img" width="100"/></td>
                            <td class="text-center">'.$row["summa"].'</td>
                            <td class="text-center">'.$row["gram"].'</td>
                            <td class="text-center"><button class="btn btn-danger" style="font-size:20px" onclick="deletes('.$row["id"].','.$row["ids"].')">X</button><input type="hidden" id="files'.$row["id"].'" value = "'.$row["image"].'"></td>
                        </tr>
                    ';
                } while($row = mysqli_fetch_array($r));
            }
        }
    }
    if ($x == 4) {
        $r = $conn -> query("SELECT * FROM klient WHERE reading = '1' ORDER BY id DESC");
          $n = mysqli_num_rows($r);
          echo '<input type="hidden" value = "'.$n.'" id = "kolegtor"/>';
          if ($n) {
            $row = mysqli_fetch_array($r);
            do {
             echo'
                <a href= "./php/sms.php?id='.$row["id"].'">
                  <div class="row p-2" style="border-bottom:1px solid gray; color:black; ">
                    <div class="col-4" style="font-size:18px">Заказ №  '.$n--.' <span style="color:red;font-weight: bold;">Не обработан</span></div>
                  </div>
                </a>
              ';
            } while ($row = mysqli_fetch_array($r));
          }
    }
    if ($x == 5) {
        $vybor = $_POST["vybor"];
        $r = $conn -> query("SELECT * FROM klient");
        $nn = mysqli_num_rows($r) - $vybor;
        $r = $conn -> query("SELECT * FROM klient WHERE reading = ''");
        $n = mysqli_num_rows($r);
        echo '<input type="hidden" value="'.$n.'" id = "vybor">';
        $r = $conn -> query("SELECT * FROM klient WHERE reading = '' ORDER BY id DESC LIMIT $vybor,10");
          $n = mysqli_num_rows($r);
          if ($n) {
            $row = mysqli_fetch_array($r);
            do {
              echo'
                <a href= "./php/sms.php?id='.$row["id"].'">
                  <div class="row p-2" style="border-bottom:1px solid gray; color:black; ">
                    <div class="col-4" style="font-size:18px">Заказ №  '.$nn--.' <span style="color:green;font-weight: bold;">Обработан</span></div>
                  </div>
                </a>
              ';
            } while ($row = mysqli_fetch_array($r));
          }
    }
    if ($x == 6) {
        $r = $conn -> query("SELECT * FROM klient WHERE reading = '1' ORDER BY id DESC");
        echo mysqli_num_rows($r);
    }
    if ($x == 7) {
        $r = $conn -> query("SELECT * FROM otzyv WHERE ifElse = '' ORDER BY id DESC"); 
        $n = mysqli_num_rows($r);
          if ($n) {
            $row = mysqli_fetch_array($r);
            echo'
                <div class="btn btn-primary" style="font-size:20px; width:100%">
                    Новвые
                </div>
            ';
            do {
              echo'
                <li style="margin-top:0px"><div class="alert alert-success">
                  <div class="row p-2">
                    <div class="col-1">'.$n--.'</div>
                    <div class="col-2">'.$row["aty"].'</div>
                    <div class="col-7">'.$row["text"].'...</div>
                    <div class="col-1"><button class="btn btn-success" onclick="adds('.$row["id"].')" style="font-size:18px;">+</button></div>
                    <div class="col-1"><button class="btn btn-danger" onclick="deletes('.$row["id"].',2)" style="font-size:18px;">&times;</button></div>
                  </div>
                </div></li>
              ';
            } while ($row = mysqli_fetch_array($r));
          }
    }
    if ($x == 8) {
        $r = $conn -> query("SELECT * FROM otzyv WHERE ifElse = '1' ORDER BY id DESC"); 
        $n = mysqli_num_rows($r);
          if ($n) {
            $row = mysqli_fetch_array($r);
            echo '
                <div class="btn btn-warning" style="font-size:20px; width:100%">
                    Добавленные
                </div>
                </br>
            ';
            do {
              echo'
                <li style="margin-top:0px"><div class="alert alert-success">
                  <div class="row p-2">
                    <div class="col-1">'.$n--.'</div>
                    <div class="col-3">'.$row["aty"].'</div>
                    <div class="col-7">'.$row["text"].'...</div>
                    <div class="col-1"><button class="btn btn-danger" onclick="deletes('.$row["id"].',1)" style="font-size:18px;">&times;</button></div>
                  </div>
                </div></li>
              ';
            } while ($row = mysqli_fetch_array($r));
          }
    }
    if ($x == 9) {
        $r = $conn -> query("SELECT * FROM otzyv WHERE ifElse = '' ORDER BY id DESC");
        echo mysqli_num_rows($r);
    }
    if ($x == 10) {
        $r = $conn -> query("SELECT * FROM klient ORDER BY id DESC");
        echo "<div class='text-center col-6' style='border-bottom:1px solid gray;'>Заказы:</div><div style='border-bottom:1px solid gray' class='col-6 text-center'> ",mysqli_num_rows($r),"</div> ";
        $r = $conn -> query("SELECT * FROM tovar");
        $hg = mysqli_num_rows($r);
        $r = $conn -> query("SELECT * FROM tovar_pizza ORDER BY id DESC");
        echo "<div class='text-center col-6' style='border-bottom:1px solid gray;'>Товары:</div><div style='border-bottom:1px solid gray' class='col-6 text-center'> ",(mysqli_num_rows($r)+$hg),"</div> ";
        $r = $conn -> query("SELECT * FROM otzyv ORDER BY id DESC");
        echo "<div class='text-center col-6' style='border-bottom:1px solid gray;'>Отзывы:</div><div style='border-bottom:1px solid gray' class='col-6 text-center'> ",mysqli_num_rows($r),"</div> ";
    }
?>