<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chefname = mysqli_real_escape_string($db, $_POST['chefname']);
    $category = 'category'; // You had this hardcoded, adjust as necessary
    $RecipeName = mysqli_real_escape_string($db, $_POST['RecipeName']);
    $Ingredients = mysqli_real_escape_string($db, $_POST['Ingredients']);
    $Direction = mysqli_real_escape_string($db, $_POST['Direction']);
    $filename = $_FILES['image_path']['name'];
    $imagePath = "upload/" . $filename; // Removed the real_escape_string for file path, it's unnecessary here

    // Ensure the upload directory exists
    if (!is_dir('upload/')) {
        mkdir('upload/', 0755, true);
    }

    // Validate input fields are not empty
    if (empty($chefname) || empty($category) || empty($RecipeName) || empty($Ingredients) || empty($Direction)) {
        echo "All fields are required.";
    } else {
        // Attempt to move the uploaded file to your desired directory
        if (move_uploaded_file($_FILES['image_path']['tmp_name'], $imagePath)) {
            // SQL query to insert data into the database
            $sql = "INSERT INTO recipoe (chefname, category, RecipeName, Ingredients, direction, image_path) VALUES ('$chefname', '$category', '$RecipeName', '$Ingredients', '$Direction', '$imagePath')";
            $result = mysqli_query($db, $sql);

            if($result) {
                echo "Recipe added successfully.";
                header("Location: index.html"); // Redirect to index.html
                exit;
            } else {
                echo "Error: " . mysqli_error($db);
                // Redirect to addRecipe.html with error message in query string
                header("Location: addRecipe.html?error=uploadFailed");
                exit;
            }
        } else {
            echo "Failed to upload the image.";
            // Redirect to addRecipe.html with error message in query string
            header("Location: addRecipe.html?error=uploadFailed");
            exit;
        }
    }
}
?>