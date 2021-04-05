<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "mealplan";

    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    if (mysqli_connect_error()) {
        echo "Failed to connect to database: " . mysqli_connect_error();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create your meals</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/proj.css">

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

    <form class="insert-form" id="insert_form" method="POST" action="">
        <div class="container-fluid mt-3">
            <h2 class="text-center text-primary">BREAKFAST</h2>
            <div class="container">
                <table class="table table-bordered" id="breakfast_field">
                    <tr>
                        <th>Recipe Name</th>
                        <th>Servings</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="bMeal[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query = "SELECT recID, recName FROM recipe";
                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $bmeal = $_POST['bMeal'];
                                    $bserve = ($_POST['bServings']);

                                    foreach ($bmeal as $bkey => $bvalue) {
                                        $bcal = "SELECT calorie FROM recipe WHERE recID=$bvalue";
                                        $bcquery = mysqli_query($conn, $bcal);
                                        while($brow = mysqli_fetch_array($bcquery)) {
                                            $bsave = "INSERT INTO breakfast(recID, servings, calories) VALUES ('".$bvalue."', '".$bserve."','".$brow['calorie']."')";
                                            $bquery = mysqli_query($conn, $bsave);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="bServings" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="bMeal2[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query2 = "SELECT recID, recName FROM recipe";
                                $result2 = mysqli_query($conn, $query2);

                                while($row = mysqli_fetch_array($result2)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $bmeal2 = $_POST['bMeal2'];
                                    $bserve2 = ($_POST['bServings2']);

                                    foreach ($bmeal2 as $bkey2 => $bvalue2) {
                                        $bcal2 = "SELECT calorie FROM recipe WHERE recID=$bvalue2";
                                        $bcquery2 = mysqli_query($conn, $bcal2);
                                        while($brow2 = mysqli_fetch_array($bcquery2)) {
                                            $bsave2 = "INSERT INTO breakfast(recID, servings, calories) VALUES ('".$bvalue2."', '".$bserve2."','".$brow2['calorie']."')";
                                            $bquery2 = mysqli_query($conn, $bsave2);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="bServings2" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="bMeal3[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query3 = "SELECT recID, recName FROM recipe";
                                $result3 = mysqli_query($conn, $query3);

                                while($row = mysqli_fetch_array($result3)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $bmeal3 = $_POST['bMeal3'];
                                    $bserve3 = ($_POST['bServings3']);

                                    foreach ($bmeal3 as $bkey3 => $bvalue3) {
                                        $bcal3 = "SELECT calorie FROM recipe WHERE recID=$bvalue3";
                                        $bcquery3 = mysqli_query($conn, $bcal3);
                                        while($brow3 = mysqli_fetch_array($bcquery3)) {
                                            $bsave3 = "INSERT INTO breakfast(recID, servings, calories) VALUES ('".$bvalue3."', '".$bserve3."','".$brow3['calorie']."')";
                                            $bquery3 = mysqli_query($conn, $bsave3);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="bServings3" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="bMeal4[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query4 = "SELECT recID, recName FROM recipe";
                                $result4 = mysqli_query($conn, $query4);

                                while($row = mysqli_fetch_array($result4)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $bmeal4 = $_POST['bMeal4'];
                                    $bserve4 = ($_POST['bServings4']);

                                    foreach ($bmeal4 as $bkey4 => $bvalue4) {
                                        $bcal4 = "SELECT calorie FROM recipe WHERE recID=$bvalue4";
                                        $bcquery4 = mysqli_query($conn, $bcal4);
                                        while($brow4 = mysqli_fetch_array($bcquery4)) {
                                            $bsave4 = "INSERT INTO breakfast(recID, servings, calories) VALUES ('".$bvalue4."', '".$bserve4."','".$brow4['calorie']."')";
                                            $bquery4 = mysqli_query($conn, $bsave4);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="bServings4" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="bMeal5[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query5 = "SELECT recID, recName FROM recipe";
                                $result5 = mysqli_query($conn, $query5);

                                while($row = mysqli_fetch_array($result5)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $bmeal5 = $_POST['bMeal5'];
                                    $bserve5 = ($_POST['bServings5']);

                                    foreach ($bmeal5 as $bkey5 => $bvalue5) {
                                        $bcal5 = "SELECT calorie FROM recipe WHERE recID=$bvalue5";
                                        $bcquery5 = mysqli_query($conn, $bcal5);
                                        while($brow5 = mysqli_fetch_array($bcquery5)) {
                                            $bsave5 = "INSERT INTO breakfast(recID, servings, calories) VALUES ('".$bvalue5."', '".$bserve5."','".$brow5['calorie']."')";
                                            $bquery5 = mysqli_query($conn, $bsave5);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="bServings5" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="bMeal6[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query6 = "SELECT recID, recName FROM recipe";
                                $result6 = mysqli_query($conn, $query6);

                                while($row = mysqli_fetch_array($result6)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $bmeal6 = $_POST['bMeal6'];
                                    $bserve6 = ($_POST['bServings6']);

                                    foreach ($bmeal6 as $bkey6 => $bvalue6) {
                                        $bcal6 = "SELECT calorie FROM recipe WHERE recID=$bvalue6";
                                        $bcquery6 = mysqli_query($conn, $bcal6);
                                        while($brow6 = mysqli_fetch_array($bcquery6)) {
                                            $bsave6 = "INSERT INTO breakfast(recID, servings, calories) VALUES ('".$bvalue6."', '".$bserve6."','".$brow6['calorie']."')";
                                            $bquery6 = mysqli_query($conn, $bsave6);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="bServings6" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="bMeal7[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query7 = "SELECT recID, recName FROM recipe";
                                $result7 = mysqli_query($conn, $query7);

                                while($row = mysqli_fetch_array($result7)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $bmeal7 = $_POST['bMeal7'];
                                    $bserve7 = ($_POST['bServings7']);

                                    foreach ($bmeal7 as $bkey7 => $bvalue7) {
                                        $bcal7 = "SELECT calorie FROM recipe WHERE recID=$bvalue7";
                                        $bcquery7 = mysqli_query($conn, $bcal7);
                                        while($brow7 = mysqli_fetch_array($bcquery7)) {
                                            $bsave7 = "INSERT INTO breakfast(recID, servings, calories) VALUES ('".$bvalue7."', '".$bserve7."','".$brow7['calorie']."')";
                                            $bquery7 = mysqli_query($conn, $bsave7);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="bServings7" class="form-control" placeholder="Servings">
                        </td>
                    </tr>
                </table>
            </div>

            <h2 class="text-center text-warning">LUNCH</h2>
            <div class="container">
                <table class="table table-bordered" id="lunch_field">
                    <tr>
                        <th>Recipe Name</th>
                        <th>Servings</th>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="lMeal[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query = "SELECT recID, recName FROM recipe";
                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $lmeal = $_POST['lMeal'];
                                    $lserve = ($_POST['lServings']);

                                    foreach ($lmeal as $lkey => $lvalue) {
                                        $lcal = "SELECT calorie FROM recipe WHERE recID=$lvalue";
                                        $lcquery = mysqli_query($conn, $lcal);
                                        while($lrow = mysqli_fetch_array($lcquery)) {
                                            $lsave = "INSERT INTO lunch(recID, servings, calories) VALUES ('".$lvalue."', '".$lserve."','".$lrow['calorie']."')";
                                            $lquery = mysqli_query($conn, $lsave);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td>
                            <input type="number" name="lServings" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="lMeal2[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query2 = "SELECT recID, recName FROM recipe";
                                $result2 = mysqli_query($conn, $query2);

                                while($row = mysqli_fetch_array($result2)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $lmeal2 = $_POST['lMeal2'];
                                    $lserve2 = ($_POST['lServings2']);

                                    foreach ($lmeal2 as $lkey2 => $lvalue2) {
                                        $lcal2 = "SELECT calorie FROM recipe WHERE recID=$lvalue2";
                                        $lcquery2 = mysqli_query($conn, $lcal2);
                                        while($lrow2 = mysqli_fetch_array($lcquery2)) {
                                            $lsave2 = "INSERT INTO lunch(recID, servings, calories) VALUES ('".$lvalue2."', '".$lserve2."','".$lrow2['calorie']."')";
                                            $lquery2 = mysqli_query($conn, $lsave2);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td>
                            <input type="number" name="lServings2" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="lMeal3[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query3 = "SELECT recID, recName FROM recipe";
                                $result3 = mysqli_query($conn, $query3);

                                while($row = mysqli_fetch_array($result3)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $lmeal3 = $_POST['lMeal3'];
                                    $lserve3 = ($_POST['lServings3']);

                                    foreach ($lmeal3 as $lkey3 => $lvalue3) {
                                        $lcal3 = "SELECT calorie FROM recipe WHERE recID=$lvalue3";
                                        $lcquery3 = mysqli_query($conn, $lcal3);
                                        while($lrow3 = mysqli_fetch_array($lcquery3)) {
                                            $lsave3 = "INSERT INTO lunch(recID, servings, calories) VALUES ('".$lvalue3."', '".$lserve3."','".$lrow3['calorie']."')";
                                            $lquery3 = mysqli_query($conn, $lsave3);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td>
                            <input type="number" name="lServings3" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="lMeal4[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query4 = "SELECT recID, recName FROM recipe";
                                $result4 = mysqli_query($conn, $query4);

                                while($row = mysqli_fetch_array($result4)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $lmeal4 = $_POST['lMeal4'];
                                    $lserve4 = ($_POST['lServings4']);

                                    foreach ($lmeal4 as $lkey4 => $lvalue4) {
                                        $lcal4 = "SELECT calorie FROM recipe WHERE recID=$lvalue4";
                                        $lcquery4 = mysqli_query($conn, $lcal4);
                                        while($lrow4 = mysqli_fetch_array($lcquery4)) {
                                            $lsave4 = "INSERT INTO lunch(recID, servings, calories) VALUES ('".$lvalue4."', '".$lserve4."','".$lrow4['calorie']."')";
                                            $lquery4 = mysqli_query($conn, $lsave4);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td>
                            <input type="number" name="lServings4" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="lMeal5[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query5 = "SELECT recID, recName FROM recipe";
                                $result5 = mysqli_query($conn, $query5);

                                while($row = mysqli_fetch_array($result5)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $lmeal5 = $_POST['lMeal5'];
                                    $lserve5 = ($_POST['lServings5']);

                                    foreach ($lmeal5 as $lkey5 => $lvalue5) {
                                        $lcal5 = "SELECT calorie FROM recipe WHERE recID=$lvalue5";
                                        $lcquery5 = mysqli_query($conn, $lcal5);
                                        while($lrow5 = mysqli_fetch_array($lcquery5)) {
                                            $lsave5 = "INSERT INTO lunch(recID, servings, calories) VALUES ('".$lvalue5."', '".$lserve5."','".$lrow5['calorie']."')";
                                            $lquery5 = mysqli_query($conn, $lsave5);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td>
                            <input type="number" name="lServings5" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="lMeal6[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query6 = "SELECT recID, recName FROM recipe";
                                $result6 = mysqli_query($conn, $query6);

                                while($row = mysqli_fetch_array($result6)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $lmeal6 = $_POST['lMeal6'];
                                    $lserve6 = ($_POST['lServings6']);

                                    foreach ($lmeal6 as $lkey6 => $lvalue6) {
                                        $lcal6 = "SELECT calorie FROM recipe WHERE recID=$lvalue6";
                                        $lcquery6 = mysqli_query($conn, $lcal6);
                                        while($lrow6 = mysqli_fetch_array($lcquery6)) {
                                            $lsave6 = "INSERT INTO lunch(recID, servings, calories) VALUES ('".$lvalue6."', '".$lserve6."','".$lrow6['calorie']."')";
                                            $lquery6 = mysqli_query($conn, $lsave6);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td>
                            <input type="number" name="lServings6" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="lMeal7[]" required>
                                <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query7 = "SELECT recID, recName FROM recipe";
                                $result7 = mysqli_query($conn, $query7);

                                while($row = mysqli_fetch_array($result7)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $lmeal7 = $_POST['lMeal7'];
                                    $lserve7 = ($_POST['lServings7']);

                                    foreach ($lmeal7 as $lkey7 => $lvalue7) {
                                        $lcal7 = "SELECT calorie FROM recipe WHERE recID=$lvalue7";
                                        $lcquery7 = mysqli_query($conn, $lcal7);
                                        while($lrow7 = mysqli_fetch_array($lcquery7)) {
                                            $lsave7 = "INSERT INTO lunch(recID, servings, calories) VALUES ('".$lvalue7."', '".$lserve7."','".$lrow7['calorie']."')";
                                            $lquery7 = mysqli_query($conn, $lsave7);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>

                        <td>
                            <input type="number" name="lServings7" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                </table>
            </div>

            <h2 class="text-center text-info">DINNER</h2>
            <div class="container">
                <table class="table table-bordered" id="dinner_field">
                    <tr>
                        <th>Recipe Name</th>
                        <th>Servings</th>
                    </tr>
                    <tr>
                        <td>
                            <select class="form-control" name="dMeal[]" required>
                            <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query = "SELECT recID, recName FROM recipe";
                                $result = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $dmeal = $_POST['dMeal'];
                                    $dserve = ($_POST['dServings']);

                                    foreach ($dmeal as $dkey => $dvalue) {
                                        $dcal = "SELECT calorie FROM recipe WHERE recID=$dvalue";
                                        $dcquery = mysqli_query($conn, $dcal);
                                        while($drow = mysqli_fetch_array($dcquery)) {
                                            $dsave = "INSERT INTO dinner(recID, servings, calories) VALUES ('".$dvalue."', '".$dserve."','".$drow['calorie']."')";
                                            $dquery = mysqli_query($conn, $dsave);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="dServings" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="dMeal2[]" required>
                            <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query2 = "SELECT recID, recName FROM recipe";
                                $result2 = mysqli_query($conn, $query2);

                                while($row = mysqli_fetch_array($result2)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $dmeal2 = $_POST['dMeal2'];
                                    $dserve2 = ($_POST['dServings2']);

                                    foreach ($dmeal2 as $dkey2 => $dvalue2) {
                                        $dcal2 = "SELECT calorie FROM recipe WHERE recID=$dvalue2";
                                        $dcquery2 = mysqli_query($conn, $dcal2);
                                        while($drow2 = mysqli_fetch_array($dcquery2)) {
                                            $dsave2 = "INSERT INTO dinner(recID, servings, calories) VALUES ('".$dvalue2."', '".$dserve2."','".$drow2['calorie']."')";
                                            $dquery2 = mysqli_query($conn, $dsave2);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="dServings2" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="dMeal3[]" required>
                            <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query3 = "SELECT recID, recName FROM recipe";
                                $result3 = mysqli_query($conn, $query3);

                                while($row = mysqli_fetch_array($result3)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $dmeal3 = $_POST['dMeal3'];
                                    $dserve3 = ($_POST['dServings3']);

                                    foreach ($dmeal3 as $dkey3 => $dvalue3) {
                                        $dcal3 = "SELECT calorie FROM recipe WHERE recID=$dvalue3";
                                        $dcquery3 = mysqli_query($conn, $dcal3);
                                        while($drow3 = mysqli_fetch_array($dcquery3)) {
                                            $dsave3 = "INSERT INTO dinner(recID, servings, calories) VALUES ('".$dvalue3."', '".$dserve3."','".$drow3['calorie']."')";
                                            $dquery3 = mysqli_query($conn, $dsave3);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="dServings3" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="dMeal4[]" required>
                            <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query4 = "SELECT recID, recName FROM recipe";
                                $result4 = mysqli_query($conn, $query4);

                                while($row = mysqli_fetch_array($result4)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $dmeal4 = $_POST['dMeal4'];
                                    $dserve4 = ($_POST['dServings4']);

                                    foreach ($dmeal4 as $dkey4 => $dvalue4) {
                                        $dcal4 = "SELECT calorie FROM recipe WHERE recID=$dvalue4";
                                        $dcquery4 = mysqli_query($conn, $dcal4);
                                        while($drow4 = mysqli_fetch_array($dcquery4)) {
                                            $dsave4 = "INSERT INTO dinner(recID, servings, calories) VALUES ('".$dvalue4."', '".$dserve4."','".$drow4['calorie']."')";
                                            $dquery4 = mysqli_query($conn, $dsave4);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="dServings4" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="dMeal5[]" required>
                            <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query5 = "SELECT recID, recName FROM recipe";
                                $result5 = mysqli_query($conn, $query5);

                                while($row = mysqli_fetch_array($result5)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $dmeal5 = $_POST['dMeal5'];
                                    $dserve5 = ($_POST['dServings5']);

                                    foreach ($dmeal5 as $dkey5 => $dvalue5) {
                                        $dcal5 = "SELECT calorie FROM recipe WHERE recID=$dvalue5";
                                        $dcquery5 = mysqli_query($conn, $dcal5);
                                        while($drow5 = mysqli_fetch_array($dcquery5)) {
                                            $dsave5 = "INSERT INTO dinner(recID, servings, calories) VALUES ('".$dvalue5."', '".$dserve5."','".$drow5['calorie']."')";
                                            $dquery5 = mysqli_query($conn, $dsave5);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="dServings5" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="dMeal6[]" required>
                            <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query6 = "SELECT recID, recName FROM recipe";
                                $result6 = mysqli_query($conn, $query6);

                                while($row = mysqli_fetch_array($result6)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $dmeal6 = $_POST['dMeal6'];
                                    $dserve6 = ($_POST['dServings6']);

                                    foreach ($dmeal6 as $dkey6 => $dvalue6) {
                                        $dcal6 = "SELECT calorie FROM recipe WHERE recID=$dvalue6";
                                        $dcquery6 = mysqli_query($conn, $dcal6);
                                        while($drow6 = mysqli_fetch_array($dcquery6)) {
                                            $dsave6 = "INSERT INTO dinner(recID, servings, calories) VALUES ('".$dvalue6."', '".$dserve6."','".$drow6['calorie']."')";
                                            $dquery6 = mysqli_query($conn, $dsave6);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="dServings6" class="form-control" placeholder="Servings">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <select class="form-control" name="dMeal7[]" required>
                            <option class="form-control" selected="selected" disabled="disabled"> -- Select your meal -- </option>

                            <?php

                                $query7 = "SELECT recID, recName FROM recipe";
                                $result7 = mysqli_query($conn, $query7);

                                while($row = mysqli_fetch_array($result7)) {
                                    echo "<option class='form-control' id='brID' value='" . $row['recID'] . "'>".$row['recID'].". ".$row['recName']."</option>";
                                }

                                echo "</select>";
                                if (isset($_POST['saveBtn'])) {
                                    $dmeal7 = $_POST['dMeal7'];
                                    $dserve7 = ($_POST['dServings7']);

                                    foreach ($dmeal7 as $dkey7 => $dvalue7) {
                                        $dcal7 = "SELECT calorie FROM recipe WHERE recID=$dvalue7";
                                        $dcquery7 = mysqli_query($conn, $dcal7);
                                        while($drow7 = mysqli_fetch_array($dcquery7)) {
                                            $dsave7 = "INSERT INTO dinner(recID, servings, calories) VALUES ('".$dvalue7."', '".$dserve7."','".$drow7['calorie']."')";
                                            $dquery7 = mysqli_query($conn, $dsave7);
                                        }
                                    }
                                }
                            ?>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="dServings7" class="form-control" placeholder="Servings">
                        </td>
                    </tr>
                </table>
            </div>
            
            <div class="container mb-4 mt-5">
                <div class="row">
                    <div class="col text-center">
                        <input class="btn btn-success" type="submit" name="saveBtn" id="saveBtn" value="Save">
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>