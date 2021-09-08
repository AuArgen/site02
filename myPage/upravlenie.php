<?php
    session_start();
    if ($_SESSION["log"] == "a" || $_SESSION["pass"] == "a") {
        header("Location:./");
    }
?>