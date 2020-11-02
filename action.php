<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if(!empty($fname) || !empty($lname) || !empty($email) || !empty($gender) || !empty($subject) || !empty($message))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dataform";

    //connection
    $conn = new mysqli($host , $dbUsername , $dbPassword , $dbname);

    if(mysqli_connect_error())
    {
        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
    }
    else
    {
        $SELECT = "SELECT email From register Where email = ? Limit 1";
        $INSERT = "INSERT Into register (fname , lname , email, gender , subject , message) values(?,?,?,?,?,?)";

        //prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("s",$email);
        $stmt->execute();
        $stmt ->bind_result($email);
        $stmt ->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0)
        {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param($fname,$lname,$email,$gender,$subject,$message);
            $stmt ->execute();
            echo "New record inserted Sucessfully";
        }
        else
        {
            echo "Somebody already registor using this email";
        }
        $stmt ->close();
        $conn ->close();
    }
}
else
{
    echo "All Filled are required";
    die();
}

?>