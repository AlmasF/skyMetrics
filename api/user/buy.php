<?php
    include "../../config/db.php";
    include "../../config/base_url.php";
    session_start();
    if(!isset($_SESSION["user_id"])) {
        header("Location: $BASE_URL/index.php?");
        exit();
    }

    if(isset($_GET["plan"]) && strlen($_GET["plan"]) >= 0){
        $plan = $_GET["plan"];
        $user_id = $_SESSION["user_id"];

        $prep = mysqli_prepare($con,
        "UPDATE users
        SET plan = ?
        WHERE id = $user_id");
        mysqli_stmt_bind_param($prep, "s", $plan);
        mysqli_stmt_execute($prep);

        header("Location: $BASE_URL/upgrade.php?result=buyed");
    } else {
        header("Location: $BASE_URL/main.php?error=plan_fail");
        exit();
    }
?>