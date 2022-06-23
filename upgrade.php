<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "common/head.php";
        if(!isset($_SESSION["user_id"])) {
            header("Location: $BASE_URL/index.php?error=access_forbidden");
            exit();
        }
    ?>
    <title>
        SkyMetrics - UserName
    </title>
</head>
<body>
    <nav>
        <div class="desc">
            <a href="">
                <p>Главная</p>
            </a>
            <a href="">
                <p>Боты</p>
            </a>
            <a href="">
                <p>FAQ</p>
            </a>
            <a href="">
                <p>Помощь</p>
            </a>
        </div>
        <div class="lang">
            <p>Язык</p>
            <img src="img/signup/flag.svg" alt="">
            <img src="img/nav/arrow.svg" alt="">
        </div>
    </nav>
    <?php
        include "common/header.php";
    ?>
    <div class="container">
        <div class="price">
            <?php
                if(isset($_GET["result"]) && $_GET["result"] == 'buyed'){
                    
                    $user_id = $_SESSION["user_id"];
                    $prep = mysqli_prepare($con,
                    "SELECT title
                    FROM 
                    plans p
                    RIGHT OUTER JOIN
                    users u
                    ON p.id = u.plan
                    WHERE u.id = ?");
                    mysqli_stmt_bind_param($prep, "s", $user_id);
                    mysqli_stmt_execute($prep);
                    $query = mysqli_stmt_get_result($prep);
                    
                    $row = mysqli_fetch_assoc($query);
                    
            ?>
                <h2>
                    Вы купили <?=$row["title"]?> тариф!
                </h2>
            <?php
                } else {
            ?>
                <h2>
                    Наши простые <br> и доступные ценовые планы
                </h2>
            <?php
                }
            ?>
            <div class="prices">
                <div class="prices-item">
                    <h3 class="starter">Starter</h3>
                    <p class="number">15 000тг</p>
                    <p class="month">В месяц</p>
                    <span class="line"></span>
                    <div class="list">
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>1 бот автоматизации</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>Выгрузка отчетов</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>1 доступ</p>
                        </span>
                        <span>
                            <img src="img/price/no.svg" alt=""><p>Консультация менеджеров</p>
                        </span>
                        <span>
                            <img src="img/price/no.svg" alt=""><p>Безграничная загрузка</p>
                        </span>
                    </div>
                    <a href="card-payment.php?plan=2">
                        <button>Купить</button>
                    </a>
                </div>
                <div class="prices-item best">
                    <h3 class="basic">Basic</h3>
                    <p class="number">25 000тг</p>
                    <p class="month">В месяц</p>
                    <span class="line"></span>
                    <div class="list">
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>3 бот автоматизации</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>Выгрузка отчетов</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>1 доступ</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>Консультация менеджеров</p>
                        </span>
                        <span>
                            <img src="img/price/no.svg" alt=""><p>Безграничная загрузка</p>
                        </span>
                    </div>
                    <a href="card-payment.php?plan=3">
                        <button>Купить</button>
                    </a>
                    <span class="popular">POPULAR</span>
                </div>
                <div class="prices-item">
                    <h3 class="premium">Premium</h3>
                    <p class="number">35 000тг</p>
                    <p class="month">В месяц</p>
                    <span class="line"></span>
                    <div class="list">
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>5 бот автоматизации</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>Выгрузка отчетов</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>1 доступ</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>Консультация менеджеров</p>
                        </span>
                        <span>
                            <img src="img/price/ok.svg" alt=""><p>Безграничная загрузка</p>
                        </span>
                    </div>
                    <a href="card-payment.php?plan=4">
                        <button>Купить</button>
                    </a>
                </div>
            </div>
        </div>
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-3.4.0.js"></script>
    <script type="text/javascript" src="js/slick-1.8.1/slick/slick.min.js"></script>
    <script src="js/mainSlider.js"></script>
    <script src="js/sliderPopular.js"></script>
</body>
</html>