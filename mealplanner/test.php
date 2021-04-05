<?php 

session_start();
header('location:signup.php');
$firstname = $_POST['first'];
$lastname = $_POST['last'];
$username= $_POST['username'];
$password=$_POST['password'];


if (!empty($firstname) || !empty($lastname) || !empty($username) || !empty($password)) {

    $host="localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "mealplan";

    //create the connection

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname );

    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        $SELECT = "SELECT username From account Where username = ? Limit 1";
        $INSERT = "INSERT Into account (uname, fname, lname, pass) values(?, ?, ?, ?)";

        //Make statement 
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssss", $username, $firstname, $lastname, $password);
        $stmt->execute();
        echo "Your information has been sucessfully added. Thank you for registering";
        } else {
            echo "Your username is not unique. Please use a different email";
            }
            $stmt->close();
            $conn->close();
            }
        } else {
            echo "You must enter data into all fields";
            die();
        }
?> 