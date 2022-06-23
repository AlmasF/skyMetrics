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
    <title>Tax Download</title>
</head>
<body>
    <?php
        include "common/header.php";
    ?>
    <h2 class="taxes">
        Скачайте файл Excel
    </h2>
    <div class="download">
        <a href="api/tax/Result.xlsx">
            Скачать
        </a>
    </div>
</body>
</html>