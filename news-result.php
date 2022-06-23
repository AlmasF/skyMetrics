<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "common/head.php";
        include 'config/base_url.php';
        include 'simplehtmldom_1_9_1/simple_html_dom.php';

        if(!isset($_SESSION["user_id"])) {
            header("Location: $BASE_URL/index.php?error=access_forbidden");
            exit();
        }
        //echo gettype($html);
        // header('Location: '.$get_url);
    ?>
    <title>News Result</title>
</head>
<body>
    <?php
        include "common/header.php";
        $news_paper = 'https://newspaper-demo.herokuapp.com/articles/show?url_to_clean=';
        $url = $_GET["url"];
        $get_url = $news_paper.$url;
        $html = file_get_html($get_url);
    ?>
    <h2 class="taxes">
        Результат парсинга
    </h2>
    <?php
        $end = count($html->find('tbody'));
        for($i = 0; $i < $end; $i++){
    ?>
        <table id="article">
    <?php
            echo $html->find('tbody')[$i];
        }
    ?>
        </table>
    <a href="#" onclick="download_table_as_csv('article');">
        <button class="blue margin">
            Скачать CSV
        </button>
    </a>

    <script src="js/tableToCSV.js"></script>
</body>
</html>