<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap 4 Navbar with Logo Image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a href="userhome.php" class="navbar-brand"> MealPlanner </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="http://localhost/mealplanner/userhome.php" class="nav-item nav-link active text-primary">Home</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a href="http://localhost/mealplanner/register.php" class="nav-item nav-link">Sign Up</a>
                    <a href="http://localhost/mealplanner/login.php" class="nav-item nav-link">Login</a>
                </div>
            </div>
        </nav>
    </div>
    <div> <img src="images\meal2.jpeg" width="100%" height="100%" style="position:absolute;
    z-index:0; ">
        <div class="container-fluid h-100 p-5" id="container">
            <div class="row ml-5 pl-5 justify-content-start ">
                <div class="col-12 col-lg-4">
                    <h1 class="display-4 "> Planning Made Easy</h1>
                    <h4> Welcome to MealPlanner</h4><br>
                    <lead> A step in the right direction to a healthy lifestyle. Use this app to plan your meals weekly. No
                        more skipping meals because you're missing ingredients. Review your meals for the week and the
                        grocery list automatically updates.</lead>
                    <br> <br>
                    <h4>Start Planning</h4><br>
                    <button type="button" class="btn btn-light btn-lg mr-3 "><a href="http://localhost/mealplanner/register.php">Sign Up</a></button>
                    <button type="button" class="btn btn-light btn-lg"> <a href="http://localhost/mealplanner/login.php">Login</a></button>
                </div>
            </div>
        </div>
    </diV>
</body>
</html>