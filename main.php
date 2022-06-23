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
        <div class="main-slider">
            <div class="slider-item">
                <span class="desc">
                    <h2>
                        SkyMetrics лучшее решение для вашего бизнеса
                    </h2>
                    <p>
                        Топ 15 скачиваемых ботов
                    </p>
                </span>
                <img src="img/main-slider/slide-1.jpg" alt="Первый слайд">
            </div>
            <div class="slider-item">
                <span class="desc">
                    <h2>
                        Слайд 2
                    </h2>
                    <p>
                        Топ 15 скачиваемых ботов
                    </p>
                </span>
                <img src="img/main-slider/slide-2.jpg" alt="Первый слайд">
            </div>
            <div class="slider-item">
                <span class="desc">
                    <h2>
                        Слайд 3
                    </h2>
                    <p>
                        Топ 15 скачиваемых ботов
                    </p>
                </span>
                <img src="img/main-slider/slide-3.jpg" alt="Первый слайд">
            </div>
            <a class="prev" onclick="minusSlide()">&#10094;</a>
            <a class="next" onclick="plusSlide()">&#10095;</a>
            <div class="main-slider-dots">
                <span class="slider-dots_item" onclick="currentSlide(1)"></span>
                <span class="slider-dots_item" onclick="currentSlide(2)"></span>
                <span class="slider-dots_item" onclick="currentSlide(3)"></span>
            </div>
        </div>
        <div class="popular">
            <div class="title">
                <h2>Популярные боты</h2>
                <a href="">
                    <p>Посмотреть Все</p>
                    <img src="img/bots/arrow.svg" alt="">
                </a>
            </div>
            <div class="popular-slider">
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <a href="">
                            <button>Подробнее</button>
                        </a>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <button>Подробнее</button>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <button>Подробнее</button>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <button>Подробнее</button>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <button>Подробнее</button>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
            </div>
        </div>
        <div class="bots-categories">
            <h2>
                Категории ботов
            </h2>
            <div>
                <a href="">
                    <div class="bots-category">
                        <span>
                            <img src="img/bots-categories/case.svg" alt="">
                            <h3>
                                Налоги
                            </h3>
                        </span>
                    </div>
                </a>
                <a href="">
                    <div class="bots-category">
                        <span>
                            <img src="img/bots-categories/case.svg" alt="">
                            <h3>
                                Таблица
                            </h3>
                        </span>
                    </div>
                </a>
                <a href="">
                    <div class="bots-category">
                        <span>
                            <img src="img/bots-categories/case.svg" alt="">
                            <h3>
                                Налоги
                            </h3>
                        </span>
                    </div>
                </a>
                <a href="">
                    <div class="bots-category">
                        <span>
                            <img src="img/bots-categories/case.svg" alt="">
                            <h3>
                                Налоги
                            </h3>
                        </span>
                    </div>
                </a>
                <a href="">
                    <div class="bots-category">
                        <span>
                            <img src="img/bots-categories/case.svg" alt="">
                            <h3>
                                Налоги
                            </h3>
                        </span>
                    </div>
                </a>
                <a href="">
                    <div class="bots-category">
                        <span>
                            <img src="img/bots-categories/case.svg" alt="">
                            <h3>
                                Налоги
                            </h3>
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="popular">
            <div class="title">
                <h2>Последние загруженные боты</h2>
                <a href="">
                    <p>Посмотреть Все</p>
                    <img src="img/bots/arrow.svg" alt="">
                </a>
            </div>
            <div class="popular-slider">
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>News Scrapper</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                    <!-- https://newspaper-demo.herokuapp.com/ -->
                        <a href="news-scrapper.php" target="_blank">
                            <button>Подробнее</button>
                        </a>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Tax Declaration</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Calculate Taxes</p>
                    <span>
                        <a href="tax-declaration.php" target="_blank">
                            <button>Подробнее</button>
                        </a>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <button>Подробнее</button>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <button>Подробнее</button>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
                </div>
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <span>
                        <button>Подробнее</button>
                        <img src="img/header/bookmark.svg" alt="">
                    </span>
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