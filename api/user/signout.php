<?php
    include "../../config/base_url.php";
    session_start();
    session_destroy();
    header("Location: $BASE_URL/sign-in.php");
?>