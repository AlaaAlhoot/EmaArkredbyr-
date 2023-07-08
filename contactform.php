<?php
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $mailTo = "Baraa.programmer@gmail.com";
    $headers = "From : " . $email;
    $txt = "You have email from :" . $fname . ".\n\n" . $message;
    mail($mailTo, $message, $txt, $headers);
    header("Location: index.php?mailsend");
}