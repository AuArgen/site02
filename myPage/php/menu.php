<header>

    <a href="./" class="logo"><i class=""><img src="../../images/taun-logo.jpg" width="60" alt=""></i>TAUN</a>

    <div id="menu-bar" class="fas fa-bars"></div>

    <nav class="navbar">
        <a href="../">Главная</a>
        <a href="../category.php">Категория</a>
        <a href="../products.php">Продукты</a>
        <a href="#popular">popular</a>
        <a href="#gallery">gallery</a>
        <a href="#review">review</a>
        <a href="#order">order</a>
        <a href="#order"><form action="" method="post"> <button type="submit" class="" name="exit"><i class="fas fa-sign-out-alt"></i></button></form></a>
    </nav>
    <?php
        if (isset($_POST["exit"])) {
            unset($_SESSION["log"]);
            unset($_SESSION["pass"]);
            header("Location:register.php");
        }
    ?>
</header>
