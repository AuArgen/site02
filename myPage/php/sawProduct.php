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
          echo '<li><div class="alert alert-danger text-center" role="alert"> <i class="fas fa-user position-relative" style="font-size:50px;"><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:20px;">'.$n.'
             </span><input type="hidden" value = "'.$n.'" id = "kolegtor"/></i></div></li>';
          if ($n) {
            $row = mysqli_fetch_array($r);
            do {
              echo'
                <a href= "./php/sms.php?id='.$row["id"].'"><li><div class="alert alert-success" role="alert">
                  <div class="row p-2">
                    <div class="col-4">'.$row["aty"].'</div>
                    <div class="col-2">'.$row["tel"].'</div>
                    <div class="col-3">'.$row["adres"].'</div>
                    <div class="col-1"><span class="badge bg-primary text-light">'.$row["kol"].'</span></div>
                    <div class="col-2">'.$row["date"].'</div>
                  </div>
                </div></li></a>
              ';
            } while ($row = mysqli_fetch_array($r));
          }
    }
    if ($x == 5) {
        $vybor = $_POST["vybor"];
        $r = $conn -> query("SELECT * FROM klient WHERE reading = ''");
        $n = mysqli_num_rows($r);
        echo '<input type="hidden" value="'.$n.'" id = "vybor">';
        $r = $conn -> query("SELECT * FROM klient WHERE reading = '' ORDER BY id DESC LIMIT $vybor,10");
          $n = mysqli_num_rows($r);
          if ($n) {
            $row = mysqli_fetch_array($r);
            do {
              echo'
                <li style="margin-top:0px"><a href= "./php/sms.php?id='.$row["id"].'"><div class="alert alert-success" role="alert">
                  <div class="row p-2">
                    <div class="col-4">'.$row["aty"].'</div>
                    <div class="col-2">'.$row["tel"].'</div>
                    <div class="col-3">'.$row["adres"].'</div>
                    <div class="col-1"><span class="badge bg-primary text-light"></span></div>
                    <div class="col-2">'.$row["date"].'</div>
                  </div>
                </div></a></li>
              ';
            } while ($row = mysqli_fetch_array($r));
          }
    }
?>