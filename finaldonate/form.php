<?php
    $author = $_POST['author'];
    $email = $_POST['email'];
    $text = $_POST['text'];
    $from = 'From: www.finaldonate.com'; 
    $to = 'liliankirito@gmail.com';
    $subject = 'Email Inquiry';

    $body = "From: $author\n E-Mail: $email\n Message:\n $text";

if ($_POST['submit']) {
    if (mail ($to, $subject, $body, $from)) { 
        echo '<p>Thank you for your email!</p>';
    } else { 
        echo '<p>An error occurred. Please try sending your message again.</p>'; 
    }
}
?>
