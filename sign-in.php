<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "common/head.php";
        if(isset($_SESSION["user_id"])) {
            header("Location: $BASE_URL/main.php?error=access_forbidden");
            exit();
        }
    ?>
    <title>Авторизация</title>
</head>
<body>
    <?php
        include "common/header.php";
    ?>
    <div class="signin">
        <img src="img/signin/signin.jpg" alt="">
        <form action="api/user/signin.php" method="POST">
            <h1>
                Авторизация
            </h1>
            <label for="email">Логин или email <p class="red">*</p></label>
            <input type="email" name="email" id="email" placeholder="&#9993; email@examle.com" required>
            <div class="grid-item password">
                <label for="password1">Пароль <p class="red">*</p></label>
                <input class="dots" type="password" name="password1" id="password1" placeholder="****************" maxlength="32" required>
                <span class="eye">
                    <img src="img/signup/eye.svg" alt="">
                </span>
            </div>
            <?php
                if(isset($_GET["error"])) {
                    switch($_GET["error"]) {
                        case 1:
                            echo '<p class="red">Неверное имя пользователя или пароль</p>';
                            break;
                        case 2:
                            echo '<p class="red">Заполните все поля</p>';
                            break;
                    }
                }
            ?>
            <span class="signin-options">
                <input type="checkbox" name="remember" id="remember" hidden>
                <label for="remember">
                    <span class="checkbox">
                        &#10004;
                    </span>
                    Запомнить меня
                </label>
                <a href="">
                    <p>Забыли пароль?</p>
                </a>
            </span>
            <button type="submit">Авторизоваться</button>
            <span class="signin-help">
                <p>Нет аккаунта?</p>
                <a href="sign-up.php">Регистрация</a>
            </span>
        </form>
    </div>
    <footer>
        <div class="desc">
            <div class="about">
                <img src="img/footer/logo.svg" alt="">
                <p>SkyMetrics - сервис для автоматизации <br> налоговых, внешних процесов предприятий <br> и малых бизнесов</p>
            </div>
            <div class="nav">
                <a href="">
                    <p>Главная</p>
                </a>
                <a href="">
                    <p>Цена</p>
                </a>
                <a href="">
                    <p>Вопрос-Ответ</p>
                </a>
                <a href="">
                    <p>Блог</p>
                </a>
            </div>
            <div class="social">
                <h3>Follow Us</h3>
                <span>
                    <a href="">
                        <img src="img/footer/instagram.svg" alt="">
                    </a>
                    <a href="">
                        <img src="img/footer/linkdin.svg" alt="">
                    </a>
                    <a href="">
                        <img src="img/footer/facebook.svg" alt="">
                    </a>
                    <a href="">
                        <img src="img/footer/twitter.svg" alt="">
                    </a>
                </span>
            </div>
        </div>
        <p class="copyright">
            © 2022 SkyMetrics All Rights Reserved.
        </p>
    </footer>

    <script src="js/signIn.js"></script>
</body>
</html>