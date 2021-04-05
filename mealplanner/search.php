<?php

    $name = $_POST['uname'];

    $host="localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "mealplan";

    //create the connection

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname );


        $sql= "CALL search('$name')";
        if($result=mysqli_query($conn, $sql)){
            while($row=mysqli_fetch_assoc($result)){
                echo $row['username'];
            }
        } 
        
       
?>