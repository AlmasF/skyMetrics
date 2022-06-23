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
    <title>Регистрация</title>
</head>
<body>
    <?php
        include "common/header.php";
    ?>
    <div class="signin">
        <img src="img/signup/signup.jpg" alt="">
        <form action="api/user/signup.php" method="POST">
            <h1>
                Регистрация
            </h1>
            <div class="grid">
                <div class="grid-item">
                    <label for="first_name">Имя <p class="red">*</p></label>
                    <input type="text" name="first_name" id="first_name" placeholder="Имя">
                </div>
                <div class="grid-item">
                    <label for="last_name">Фамилия <p class="red">*</p></label>
                    <input type="text" name="last_name" id="last_name" placeholder="Фамилия">
                </div>
                <div class="grid-item">
                    <label for="email">email <p class="red">*</p></label>
                    <input type="text" name="email" id="email" placeholder="email@examle.com">
                </div>
                <div class="grid-item">
                    <label for="city">Город *</label>
                    <select name="city" id="city">
                        <option value="almaty">Алматы</option>
                        <option value="nur-sultan">Нур-Султан</option>
                        <option value="aktobe" selected>Актобе</option>
                    </select>
                </div>
                <form>
                <div class="grid-item phone-item">
                    <label for="phone">Мобильный телефон *</label>
                    <span class="phone">
                        <img src="img/signup/flag.svg" alt="">
                        <p>+7</p>
                    </span>
                    <input type="tel" name="phone" id="phone" maxlength="10">
                </div>
                <div class="grid-item">
                    <label for="company">Название предприятия *</label>
                    <input type="text" name="company" id="company" placeholder="Apple">
                </div>
                <div class="grid-item password">
                    <label for="password1">Пароль *</label>
                    <input class="dots" type="password" name="password1" id="password1" placeholder="****************" maxlength="32">
                    <span class="eye">
                        <img src="img/signup/eye.svg" alt="">
                    </span>
                </div>
                <div class="grid-item password">
                    <label for="password2">Подтвердите пароль *</label>
                    <input class="dots" type="password" name="password2" id="password2" placeholder="****************" maxlength="32">
                    <span class="eye">
                        <img src="img/signup/eye.svg" alt="">
                    </span>
                </div>
                <?php
                    if(isset($_GET["error"])) {
                        switch($_GET["error"]) {
                            case 1:
                                echo '<p class="red">Такой Email или Телефон уже существуют в базе</p>';
                                break;
                            case 2:
                                echo '<p class="red">Пароли не совпадают</p>';
                                break;
                            case 3:
                                echo '<p class="red">Заполните все поля</p>';
                                break;
                        }
                    }
                ?>
            </div>
            <button type="submit">Регистрация</button>
            <span class="signin-help">
                <p>Уже есть аккаунт?</p>
                <a href="sign-in.php">Войти в систему</a>
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
    <script src="js/signUp.js"></script>
</body>
</html>