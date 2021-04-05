<?php

$message = "wrong answer";
/* Attempt to connect to MySQL database */
$conn = mysqli_connect('localhost','root','','mealplan');



$username= $_POST['username'];
$password=$_POST['password'];

/*$exist = "SELECT uname, pass FROM account WHERE uname = '$username' && pass='$password' ";

$result = mysqli_query($conn, $exist);

$user = mysqli_num_rows($result);

if ($user ==1) {
    header('location:welcome.php');
}
else{
    header('location:http://localhost/loginform.php');
}
*/
session_start();

    if(isset($_POST['Login'])) {
        if(empty($username) || empty($password))
        {
            header("location: http://mealplanner/loginform.php?Empty= Fields cannot be left empty");
        }

        else {
            $query = "SELECT uname, pass FROM account WHERE uname = '$username' && pass='$password' ";

            $result=mysqli_query($conn,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['User']=$username;
                header("location: welcomeuser.php");
            }
            else{
                header("location: loginform.php?Invalid= Please enter correct username and password");
            }

        }
    }

    else {
        echo "not working";
        
    }
die();

?>