<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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
        table.body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>

    <title>Table with database</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
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
        <a href="#" class="navbar-brand">
            MealPlanner
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="http://localhost/mealplanner/welcome.php" class="nav-item nav-link">Home</a>
                <a href="http://localhost/mealplanner/recipeAdd.php" class="nav-item nav-link">Add Recipe</a>
                <a href="http://localhost/mealplanner/meals.php" class="nav-item nav-link active text-primary">Plan Weekly Meal</a>
                <a href="http://localhost/mealplanner/viewmeals.php" class="nav-item nav-link">View Your Meals</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link">Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                <a href="http://localhost/mealplanner/logout.php" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </nav>


    <!--Breakfast-->
    <div class="row mt-4 mx-auto col-lg-10 ">
        <div class="container mb-5 col-lg-4 mt-5">
            <table>
                <tr>

                    <th>Breakfast Meals </th>
                </tr>



                <?php
                $conn = mysqli_connect("localhost", "root", "", "mealplan");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $name = ($_SESSION["username"]);
                //echo $name;
                //$sql = "SELECT recID, mealID FROM breakfast where uName='{$name}'" ;
                $sql = "SELECT DISTINCT recipe.recName FROM breakfast JOIN recipe ON breakfast.recID=recipe.recID WHERE breakfast.uName='{$name}'";
                $result = $conn->query($sql);
                if (isset($result->num_rows) && $result->num_rows > 0) {

                    //if ($result->num_rows > 0) {
                    // output data of each row
                    //echo $name; 
                    //echo $name;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["recName"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </table>
        </div>

        <!--Lunch Table-->

        <div class="container mb-5 col-lg-4 mt-5">
            <table>
                <tr>
                    <th>Lunch Meals </th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "mealplan");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $name = ($_SESSION["username"]);
                $sql1 = "SELECT DISTINCT recipe.recName FROM lunch JOIN recipe ON lunch.recID=recipe.recID WHERE lunch.uName='{$name}' ";
                $result1 = $conn->query($sql1);
                if (isset($result1->num_rows) && $result1->num_rows > 0) {

                    while ($row = $result1->fetch_assoc()) {
                        echo "<tr> <td>" . $row["recName"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </table>
        </div>


        <!--Dinner Table-->

        <div class="container mb-5 col-lg-4 mt-5">
            <table>
                <tr>
                    <th>Dinner Meals </th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "mealplan");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $name = ($_SESSION["username"]);
                $sql1 = "SELECT DISTINCT recipe.recName FROM dinner JOIN recipe ON dinner.recID=recipe.recID WHERE dinner.uName='{$name}' ";
                $result1 = $conn->query($sql1);
                if (isset($result1->num_rows) && $result1->num_rows > 0) {

                    while ($row = $result1->fetch_assoc()) {
                        echo "<tr> <td>" . $row["recName"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </table>
        </div>

    </div>

    <!-Shopping List-->

        <div class="container mb-5 col-lg-4 mt-5">
            <table>
                <tr>

                    <th>All Breakfast Ingredients </th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "mealplan");
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $name = ($_SESSION["username"]);
                $sql4 = "SELECT DISTINCT ingredients.ingrName FROM recipe JOIN ingredients JOIN recIngredient JOIN breakfast ON recipe.recID=breakfast.recID AND recipe.reciD=recIngredient.recID AND ingredients.ingriD=recIngredient.ingredientID WHERE breakfast.uName='{$name}'";


                //"SELECT DISTINCT recipe.recName FROM dinner JOIN recipe ON dinner.recID=recipe.recID WHERE dinner.uName='{$name}' ";
                $result4 = $conn->query($sql4);
                if (isset($result4->num_rows) && $result4->num_rows > 0) {

                    while ($row = $result4->fetch_assoc()) {
                        echo "<tr><td>" . $row["ingrName"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </table>
        </div>



</body>

</html>