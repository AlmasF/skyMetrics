<header>
    <?php
        include "config/db.php";
        if(isset($_SESSION["user_id"])) {
    ?>
        <a href="main.php">
            <img src="img/header/logo.svg" alt="" class="logo">
        </a>
        <div class="search">
            <span>
                <img src="img/header/burger.svg" alt="" id="search-menu--img">
                <div class="dropdown hide" id="dropdown-search">
                    <div class="dropdown-menu" id="dropdown-menu">
                        <h3>Categories</h3>
                        <p>Налоги</p>
                        <p class="selected">Внутренние процессы</p>
                        <p>Боты</p>
                    </div>
                    <div class="dropdown-categories hide">
                        <h3>
                            Налоги
                        </h3>
                        <div class="grid">
                            <div>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                            </div>
                            <div>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-categories">
                        <h3>
                            Внутренние процессы
                        </h3>
                        <div class="grid">
                            <div>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                            </div>
                            <div>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-categories hide">
                        <h3>
                            Боты
                        </h3>
                        <div class="grid">
                            <div>
                                <h4>Конструкция</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                            </div>
                            <div>
                                <h4>Construction</h4>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                                <a href="">
                                    <p>Subcategory</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </span>
            <form class="search-input">
                <input type="text" name="" id="">
                <button>
                    <img src="img/header/search.svg" alt="">
                </button>
            </form>
            <a href="">
                <img src="img/header/bookmark.svg" alt="">
            </a>
        </div>
        <div class="user">
            <span class="user-desc">
                <span>
                    Hello,
                    <p class="bold"><?=$_SESSION["first_name"]?></p>
                </span>
                <span>
                    <?php
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
                    <p class="blue"><?=$row["title"]?> plan, осталось 3 бота</p>
                    <a href="upgrade.php">
                        <p class="underline">Upgrade now</p>
                    </a>
                </span>
            </span>
            <div class="user-avatar" id="user-avatar">
                <img src="img/header/person.svg" alt="" id="user-avatar--img">
                <div class="triangle" id="user-triangle">
                </div>
                <div class="dropdown" id="user-avatar--dropdown">
                    <div class="name">
                        <img src="img/header/person.svg" alt="">
                        <p><?=$_SESSION["first_name"]?></p>
                    </div>
                    <div class="plan">
                        <h4>
                            <?=$row["title"]?> plan
                        </h4>
                        <p>
                            Осталось три бота 
                            <a href="upgrade.php">
                                Обновить план
                            </a>
                        </p>
                    </div>
                    <div class="settings">
                        <a href="">
                            <span>
                                <img src="img/header/settings.svg" alt="">
                                <p>Настройки</p>
                            </span>
                        </a>
                        <a href="api/user/signout.php">
                            <span>
                                <img src="img/header/logout.svg" alt="">
                                <p>Log Out</p>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
        } else {
    ?>
        <a href="index.php">
            <img src="img/header/logo.svg" alt="" class="logo">
        </a>
    
        <div class="nav">
            <a href="main.php">
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
        <div class="sign">
            <a href="sign-in.php">
                <p>Логин</p>
            </a>
            <a href="sign-up.php">
                <button>
                    Регистрация
                </button>
            </a>
        </div>
    <?php
        }
    ?>
    <script src="js/header.js"></script>
</header>