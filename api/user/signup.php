<?php
    include "../../config/db.php";
    include "../../config/base_url.php";

    if(isset($_POST["first_name"], 
            $_POST["last_name"], 
            $_POST["email"],
            $_POST["city"],
            $_POST["phone"], 
            $_POST["company"], 
            $_POST["password1"],
            $_POST["password2"]) && 
        strlen($_POST["first_name"]) > 0 && 
        strlen($_POST["last_name"]) > 0 && 
        strlen($_POST["email"]) > 0 && 
        strlen($_POST["city"]) > 0 &&
        strlen($_POST["phone"]) > 0 && 
        strlen($_POST["company"]) > 0 && 
        strlen($_POST["password1"]) > 0 &&
        strlen($_POST["password2"]) > 0
      ) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["email"];
            $city = $_POST["city"];
            $phone = $_POST["phone"];
            $company = $_POST["company"];
            $password1 = $_POST["password1"];
            $password2 = $_POST["password2"];


            $prep = mysqli_prepare($con, "SELECT id FROM users WHERE email=? OR phone=?");
            mysqli_stmt_bind_param($prep, "ss", $email, $phone);
            mysqli_stmt_execute($prep);
            $query = mysqli_stmt_get_result($prep);

            if(mysqli_num_rows($query) > 0) {
                header("Location: $BASE_URL/sign-up.php?error=1");
                exit();
            }

            if($password1 != $password2) {
                header("Location: $BASE_URL/sign-up.php?error=2");
                exit();
            }


            $hash = sha1($password1);
            $prep1 = mysqli_prepare($con,
            "INSERT INTO users
            (first_name, last_name, email, city, phone, company, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($prep1, "sssssss", $first_name, $last_name, $email, $city, $phone, $company, $hash);
            mysqli_stmt_execute($prep1);

            header("Location: $BASE_URL/sign-in.php?success=true");

        } else {

            header("Location: $BASE_URL/sign-up.php?error=3");

        }

?>      