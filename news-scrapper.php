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
    <title>News Scrapper</title>
</head>
<body>
    <?php
        include "common/header.php";
    ?>
    <h2 class="taxes">
        News Scrapper
    </h2>
    <form action="news-result.php" method="get" class="taxes">
        <input type="text" placeholder="Вставьте URL статьи" name="url">
        <button type="submit" class="blue">Извлечь</button>
    </form>
</body>
</html>