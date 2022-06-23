<?php
    ob_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/SMTP.php';
    require '../../PHPMailer/src/PHPMailer.php';

    include "../../config/db.php";
    include "../../config/base_url.php";

    session_start();
    $mail = new PHPMailer(true);
    
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPDebug  = 2;
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->SMTPSecure = "tls"; //Secure conection
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Username   = 'alisamla202216@gmail.com';                     //SMTP username
    $mail->Password   = 'arqrqlyfxqoqvvub';                               //SMTP password
    $mail->Priority   = 1;
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    
    $mail->setFrom('alisamla@gmail.com', 'Mailer');
    //email для отправки
    $mail->addAddress(''); //добавить почту для получения
    $mail->addReplyTo('info@example.com', 'Information');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Оставили заявку!';
    $mail->Body    = 'Здравствуйте. Email клиента: '.$_GET["email"];
    $mail->AltBody = 'Оставили заявку';

    $mail->send();

    header("Location: $BASE_URL/main.php");
?>