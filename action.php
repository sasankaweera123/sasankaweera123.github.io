<?php

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $conn = new mysqli('localhost','root', '','dataform');
    if($conn->connect_error)
    {
        die('Connection Failed : '.$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into form(fname,lname,email,gender,subject,message) values(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$fname,$lname,$email,$gender,$subject,$message);
        $stmt->execute();
        echo "Message Sent....";
        $stmt->close();
        $conn->close();

    }
?>