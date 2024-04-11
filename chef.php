<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker home</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Dosis:wght@200..800&family=Nanum+Gothic+Coding&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="asset/css/chef.css">
    </link>
</head>

<body>
    <div class="home">
        <div class="home_one">
            <!-- <img src="images/budget-logo 1.png" alt=""> -->
           


            <p class="welcome_name">Welcome, chef
                <?php echo $_SESSION['username']; ?>!
            </p>

            <div class="das">


                <div class="dash">
                    
                    <p><a href="index.html">Home</a></p>

                </div>

                <div class="dash">

                    
                    <p><a href="addRecipe.html">Add Recipe</a></p>


                </div>
                <div class="dash">

                   
                <p><a href="editRecipe.html">Edit Recipe</a></p>

                </div>
                <div class="dash">

                    
                    <p><a href="deleteRecipe.html">Delete Recipe</a></p>
                </div>





            </div>


        </div>
        

    </div>

    </div>



    




</body>

</html>