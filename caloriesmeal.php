<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Search Recipe</title>
    <link rel="stylesheet" href="proj.css">
</head>

<body>

    <div class="container col-lg-5 mx-auto">
        <form class="main-form " method="POST" action="http://localhost/mealplanner/caloriesresults.php">

            <br>
            <br>
            <p class="lead text-center"> Create a random meal with your prefered calories requirements.</p>
            <!-- Calorie 1 -->
            <div class="">
                <label class="">Calorie Value One</label>
                <div class="">
                    <input type="number" class="form-control" id="cal1" name="cal1" placeholder="Enter your calorie value ">
                </div>
            </div> <br> <br>
            <!-- Calorie 2 -->
            <div class="">
                <label class="">Calorie Value Two</label>
                <div class="">
                    <input type="number" class="form-control" id="cal2" name="cal2" placeholder="Enter your calorie value ">
                </div>
            </div>
            <br>
            <div class="mt-3">
                <div class="">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>



        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>