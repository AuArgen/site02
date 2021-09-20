<header>

    <a href="./" class="logo"><i class=""><img src="../../images/taun-logo.jpg" width="60" alt=""></i>TAUN</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a id="menuName1" href="../">Главная</a>
        <a id="menuName2" href="../category.php">Категория</a>
        <a id="menuName3" href="../products.php">Продукты</a>
        <a id="menuName4" href="../popular.php">Популярные</a>
        <a id="menuName5" href="../gallery.php">Галерея</a>
        <a id="menuName6" href="../reklama.php">Рек. - Под</a>
        <a id="menuName7" href="../otzyvy.php">Отзывы</a>
        <a id="menuName9" href="#order"><form action="" method="post"> <button type="submit" class="" name="exit"><i class="fas fa-sign-out-alt"></i></button></form></a>
    </nav>
    <?php
        if (isset($_POST["exit"])) {
            unset($_SESSION["log"]);
            unset($_SESSION["pass"]);
            header("Location:register.php");
        }
    ?>
</header>
