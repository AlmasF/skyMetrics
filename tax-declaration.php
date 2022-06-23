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
    <title>Tax Declaration</title>
</head>
<body>
    <?php
        include "common/header.php";
    ?>
    <h2 class="taxes">
        Tax Declaration
    </h2>
    <div class="upload">
        <form action="api/tax/upload.php" method="POST" enctype="multipart/form-data">
            <div class="button button-yellow input-file">
                <input type="file" name="excel">	
                Загрузить Excel файл
            </div>
            <button type="submit" class="button-submit">Добавить</button>
        </form>
    </div>
</body>
</html>