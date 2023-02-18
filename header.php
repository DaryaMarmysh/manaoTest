
<header>
    <p class="name"><?php echo isset($_SESSION['userName'])?'Hello '. $_SESSION["userName"]:''; ?></p>
    <?php
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = explode('/', $url[0]);
    $url = $url[count($url) - 1];

    if (!isset($_SESSION['userName'])) {
        if ($url !== 'login.php') {
            echo ' <form action="login.php" method="post" class="reg">
                <input class="header-btn" type="submit" value="Войти">
            </form>';
        }
        if ($url == 'login.php') {
            echo ' <form action="index.php" method="post" class="reg">
                <input class="header-btn" type="submit" value="Зарегистрироваться">
            </form>';
        }
    } else {
        echo ' <form id="exitForm" onSubmit ="return false" class="reg">
        <input type="hidden" name="exit_form" value="exit">
        <input class="header-btn" type="submit" value="Выйти" id="exit_btn">
    </form>';
    }
    ?>
</header>