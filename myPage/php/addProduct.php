<?php
    if ($_POST["x"] == 1) {
        echo '
            <form action="" class="form-control p-5 fs-3" style="font-size:20px">
                <input style="font-size:18px" required type="name" name="name" id="name" class="form-control fs-3" placeholder="Имя продукты"></input>
                <br><textarea style="font-size:18px" name="text" id="text" cols="30" rows="10" class="form-control fs-3" placeholder="Введите текст если нужно ..."></textarea>
                <br> <input style="font-size:18px" required type="name" name="name" id="sena" class="form-control fs-3" placeholder="Стоимость... пример 150р. или 150сом"></input>
                <br> <input style="font-size:18px" required type="name" name="name" id="gram" class="form-control fs-3" placeholder="Граммы... пример 150г"></input>
                <br><label style="font-size:18px" required for="file" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для фона </label> <div id="1"></div> <input type="file" name="file_img" id="file" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,1)">
                <br><p class="text-center"><button style="font-size:18px" type="button" name = "save" id="btn" class = "btn btn-success" value="" onclick = "saves(2)">Сохранить</button></p>
                <input type = "text" id="g1" value="" style="visibility:hidden">
            </form>
        ';
    } else {
          echo '
            <form action="" class="form-control p-5 fs-3" style="font-size:20px">
                <input style="font-size:18px" required type="name" name="name" id="name" class="form-control fs-3" placeholder="Имя продукты"></input>
                <br><textarea style="font-size:18px" name="text" id="text" cols="30" rows="10" class="form-control fs-3" placeholder="Введите текст если нужно ..."></textarea>
                <br><select name="kol" id="kol" style="font-size:18px" class="form-select" onchange = "select()"> 
                    <option value="0">Выберте количество размеры для добавление варианты</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                <div class="select_kol"></div>
                <br><label style="font-size:18px" required for="file" class="" style= "cursor:pointer"><i class="fa fa-picture-o" aria-hidden="true"></i> Выберите картинки для фона </label> <div id="1"></div> <input type="file" name="file_img" id="file" class="form-control" style="visibility:hidden" onchange = "getImagePreview(event,1)">
                <br><p class="text-center"><button style="font-size:18px" type="button" name = "save" id="btn" class = "btn btn-success" value="" onclick = "saves(3)">Сохранить</button></p>
                <input type = "text" id="g1" value="" style="visibility:hidden">
            </form>
        ';
    }
?>
