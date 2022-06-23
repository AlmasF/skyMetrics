<?php
    include "../../config/db.php";
    include "../../config/base_url.php";

    if(isset($_POST["email"], $_POST["password1"]) &&
    strlen($_POST["email"]) > 0 && 
    strlen($_POST["password1"]) > 0) {
        $email = $_POST["email"];
        $pass = $_POST["password1"];
        $hash = sha1($pass);

        $prep = mysqli_prepare($con, "SELECT id, first_name FROM users WHERE email=? AND password=?");
        mysqli_stmt_bind_param($prep, "ss", $email, $hash);
        mysqli_stmt_execute($prep);
        $query = mysqli_stmt_get_result($prep);
        if(mysqli_num_rows($query) != 1) {
            header("Location: $BASE_URL/sign-in.php?error=1&hash=$hash&email=$email");
            exit();
        }

        $row = mysqli_fetch_assoc($query);

        session_start();
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["first_name"] = $row["first_name"];

        header("Location: $BASE_URL/main.php?name=".$row["first_name"]);

    } else {
        header("Location: $BASE_URL/sign-in.php?error=2");
    }

?>