<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "common/head.php";
        if(isset($_SESSION["user_id"])) {
            header("Location: $BASE_URL/main.php?error=from_index");
            exit();
        }
    ?>
    <title>SkyMetrics</title>
</head>
<body>
    <?php
        include "common/header.php";
    ?>
    <div class="container">
        <div class="main">
            <div class="main-begin">
                <div class="main-begin--desc">
                    <h1>
                        <span class="underline">
                            <span>SkyMetrics</span>
                            <img src="img/main/underline.svg" alt="" srcset="">
                        </span>
                        лучшее <br> решение для вашего <br> бизнеса
                    </h1>
                    <p>
                        SkyMetrics это сервис для автоматизации налоговых, <br> внешних процесов предприятий и малых бизнесов
                    </p>
                    <button>
                        Начать
                    </button>    
                </div>
                <div class="main-begin--images">
                    <img class="main-image" src="img/main/computer.png" alt="">
                    <img class="main-rectangle" src="img/main/rectangle.svg" alt="">    
                </div>
            </div>
            <div class="main-achieve">
                <div class="main-achieve--item">
                    <p>+35</p>
                    <p>Ботов для автоматизации <br> налоговых процессов</p>
                </div>
                <div class="main-achieve--item">
                    <p>+20</p>
                    <p>Предприятий успешно <br> протестировали сервис</p>
                </div>
            </div>
        </div>
        <div class="opportunity">
            <h2>Ценные возможности</h2>
            <div class="opportunities">
                <div class="opportunities-item">
                    <img src="img/opportunities/head.svg" alt="">
                    <p class="title">Анализ отчетов</p>
                    <p>Содержит ключевые данные статистики отчетов или налогового кабинета, данные обновляются ежедневно</p>
                </div>
                <div class="opportunities-item">
                    <img src="img/opportunities/graph.svg" alt="">
                    <p class="title">Выгрузка отчета в Excel</p>
                    <p>Можно выгружать данные в виде готовых графиков или числовых данных, которыми легко поделиться с заказчиком</p>
                </div>
                <div class="opportunities-item">
                    <img src="img/opportunities/case.svg" alt="">
                    <p class="title">Удобный интерфейс</p>
                    <p>SkyMetrics представляет гибкий сервис с большой библиотекой ботов и скраперов с удобным интерфейсом</p>
                </div>
            </div>
        </div>
        <div class="faster">
            <img src="img/faster/team.jpg" alt="">
            <div class="faster-desc">
                <h2>
                    SkyMetrics делает <br> вашу работу быстрее
                </h2>
                <p>
                    SkyMetrics это сервис для оптимизации и автоматизации налоговых процесов предприятий и малых бизнесов
                </p>
                <button>
                    Начать
                </button>
            </div>
        </div>
        <div class="price">
            <h2>
                Наши простые <br> и доступные ценовые планы
            </h2>
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
                    <button>Начать</button>
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
                    <button>Начать</button>
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
                            <img src="" alt=""><p>Безграничная загрузка</p>
                        </span>
                    </div>
                    <button>Начать</button>
                </div>
            </div>
        </div>
        <div class="bots">
            <div class="bots-title">
                <h2>Библиотека ботов</h2>
                <a href="">
                    <p>Посмотреть Все</p>
                    <img src="img/bots/arrow.svg" alt="">
                </a>
            </div>
            <div class="bots-grid">
                <div class="bots-grid--item">
                    <span class="desc">
                        <img src="img/bots/avatar.svg" alt="">
                        <span>
                            <h4>Bot_Name</h4>
                            <p>Category</p>
                        </span>
                    </span>
                    <p>Scrapping news from different sources</p>
                    <button>Подробнее</button>
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
                    <button>Подробнее</button>
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
                    <button>Подробнее</button>
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
                    <button>Подробнее</button>
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
                    <button>Подробнее</button>
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
                    <button>Подробнее</button>
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
                    <button>Подробнее</button>
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
                    <button>Подробнее</button>
                </div>
            </div>
        </div>
        <div class="email">
            <h2>Есть ли у вас проект нуждающийся <br> в автоматизации процессов?</h2>
            <p>Оставьте свою почту, наш менеджер в скором времени свяжется с вами</p>
            <form action="api/mail/send.php">
                <input type="email" placeholder="Введите адрес электронной почты" name="email" id="email">
                <button type="submit">Начать</button>
            </form>
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
</body>
</html>