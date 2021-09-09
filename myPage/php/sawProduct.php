<?php
    include("./connect.php");
    $id = $_POST["n"];
    $r = $conn -> query("SELECT * FROM tovar WHERE type = '$id'");
    if (mysqli_num_rows($r)) {
        $row = mysqli_fetch_array($r);
        echo'
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Название</th>
                <th class="text-center">Текс</th>
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
                    <td>'.substr($row["text"],0,50).'</td>
                    <td class="text-center">'.$row["summa"].'</td>
                    <td class="text-center">'.$row["gram"].'</td>
                    <td class="text-center"><a href = "./php/updateProduct.php?id='.$row["id"].'&type='.$id.'"><button class="btn btn-success"><img src="./img/pen.png" alt="t" width="30"></button></a></td>
                    <td class="text-center"><button class="btn btn-danger" style="font-size:20px">X</button></td>
                </tr>
            ';
        } while($row = mysqli_fetch_array($r));
    }
?>