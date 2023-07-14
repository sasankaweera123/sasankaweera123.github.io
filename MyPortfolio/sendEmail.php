<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $to = 'sajewsasanka1@gmail.com'; // Replace with your email address
    $subject = "Contact Form Submission: $subject";
    $headers = "From: $name <$email>";
    
    // Compose the email body
    $email_body = "Name: $name\n\nEmail: $email\n\nMessage:\n$message";
    
    // Send the email
    if(mail($to, $subject, $email_body, $headers)){
        echo 'Thank you for your submission!';
    } else{
        echo 'An error occurred while sending the email.';
    }
}
?>