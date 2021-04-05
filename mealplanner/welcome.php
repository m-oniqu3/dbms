<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
        table.body{ font: 14px sans-serif; text-align: center; }
    </style>

<title>Table with database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 25px;
            text-align: center;
        }

        th {
            background-color: #4b0082;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
</head>




</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light">
            <a href="userhome.php" class="navbar-brand"> MealPlanner </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="userhome.php" class="nav-item nav-link active">Home</a>
                    <a href="recipeAdd.php" class="nav-item nav-link">Add Recipe</a>
                    <a href="meals.php" class="nav-item nav-link">Plan Weekly Meal</a>
                </div>
                <div class="navbar-nav ml-auto">
                    
                    <a href="#" class="text-info nav-item nav-link "> Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                    <a href="logout.php" class="nav-item nav-link text-danger">Sign Out</a>
                </div>
            </div>
        </nav>



        <div class="container mt-5">  
        <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
        </div>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "mealplan");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
       $name = ($_SESSION["username"]);
       //echo $name;
        $sql = "SELECT  username, password FROM users where username='{$name}'" ;
        $result = $conn->query($sql);
        if ( isset($result->num_rows) && $result->num_rows >0) {
            
        //if ($result->num_rows > 0) {
            // output data of each row
           //echo $name; 
           //echo $name;
            while ($row = $result->fetch_assoc()) {
                echo "</td><td>" . $row["username"] . "</td><td>"
                    . $row["password"] . "</td></tr>";
                    
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
   
    <!--call GetSalary('John');-->    

    <!--DELIMITER //
 CREATE PROCEDURE GetSalary(IN personName varchar(5))
 BEGIN
 SELECT person_name, salary FROM works where person_name=personName;
END //
DELIMITER ;
    -->
        
    
</body>
</html>