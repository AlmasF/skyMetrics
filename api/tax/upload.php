<?php
    include "../../config/db.php";
    include "../../config/base_url.php";

    session_start();
    $user_id = $_SESSION["user_id"];

    if(isset($_FILES["excel"]) && isset($_FILES["excel"]["name"]) 
    && strlen($_FILES["excel"]["name"])> 0) {
        $ext = end(explode(".", $_FILES["excel"]["name"]));
        $excel_name = time().".".$ext;
        move_uploaded_file($_FILES["excel"]["tmp_name"], "../../xls/$excel_name");

        $prep = mysqli_prepare($con, "INSERT INTO excels (path, user_id) VALUES (?, ?)");
        $path = "\\xls\\".$excel_name;
        mysqli_stmt_bind_param($prep, "si", $path, $user_id);
        mysqli_stmt_execute($prep);
        $myfile = fopen("path.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $excel_name);
        fclose($myfile);
        $command = escapeshellcmd('C:\xampp\htdocs\sky_metrics\bots\excel\main.py');
        $output = shell_exec($command);
        echo $output;
    } else {
        header("Location: $BASE_URL/tax-declaration.php?error=no_file");
    }
    header("Location: $BASE_URL/tax-download.php?success=true");
?>