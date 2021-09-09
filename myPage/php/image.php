<?php
     if ($_FILES["file"]["name"] != '') {
        $test = explode(".",$_FILES["file"]["name"]);
        $e = end($test);
        $name = "IMG-".date("Y-m-d-H-i-s").''.rand(1,1000).'k.'.$e;
        $l = '../../img/'.$name;
        move_uploaded_file($_FILES["file"]["tmp_name"],$l);
        $l = './img/'.$name;
        echo $l;
     }
?>