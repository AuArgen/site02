<?php
    if (isset ($_POST["analize"])) {
        $_SESSION["log"] = $_POST["log"];
        $_SESSION["pass"] = $_POST["pass"];
        if ($_SESSION["log"] == "a" && $_SESSION["pass"] == "a") {
            header('Location:./');
        } else {
            echo"
                <script>
                    alert('Логин или пароль неправильный!!!');
                </script>
            ";
        }
    }
?>