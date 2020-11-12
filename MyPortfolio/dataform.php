<?php
            $hostname ="localhost";
            $username ="root";
            $password ="";
            $dbname ="dataform";
            
            $con = new mysqli($hostname,$username,$password,$dbname);

            if($con->connect_error)
            {
                die("Connection Falid !".$con->connect_error);
            }
            else
            {
                //echo ("Connection Successfull"."<br>");
            }

            if(isset($_POST['submit']))
            {
                
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $gender = $_POST['gender'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $data = "INSERT INTO form(fname,lname,email,gender,subject,message) VALUES('$fname','$lname','$email','$gender','$subject','$message')";

                if(mysqli_query($con,$data))
                {
                //echo "Contact Saved" . "<br>"."Thank You";
                }
                else
                {
                    echo "Error ".$data."</br>".mysqli_error($con);
                }
            }
            mysqli_close($con);
            
    ?>