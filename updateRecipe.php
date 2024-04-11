

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

    // Validate input fields are not empty
    if (empty($chefname) || empty($category) || empty($RecipeName) || empty($Ingredients) || empty($Direction)) {
        echo "All fields are required.";
    } else {
        // Check if an image is uploaded
        if ($_FILES['image_path']['size'] > 0) {
            $filename = $_FILES['image_path']['name'];
            $imagePath = "upload/" . $filename;

            // Ensure the upload directory exists
            if (!is_dir('upload/')) {
                mkdir('upload/', 0755, true);
            }

            // Attempt to move the uploaded file to your desired directory
            if (!move_uploaded_file($_FILES['image_path']['tmp_name'], $imagePath)) {
                echo "Failed to upload the image.";
                exit;
            }

            // Update the image path in the database
            $updateImagePathSql = "UPDATE recipoe SET image_path='$imagePath' WHERE RecipeName='$RecipeName'";
            $resultImagePath = mysqli_query($db, $updateImagePathSql);

            if (!$resultImagePath) {
                echo "Failed to update image path in the database.";
                exit;
            }
        }

        // SQL query to update data in the database
        $sql = "UPDATE recipoe SET chefname='$chefname', category='$category', Ingredients='$Ingredients', direction='$Direction' WHERE RecipeName='$RecipeName'";
        
        $result = mysqli_query($db, $sql);

        if($result) {
            echo "Recipe updated successfully.";
            header("Location: index.html"); // Redirect to index.html
            exit;
        } else {
            echo "Error: " . mysqli_error($db);
            // Redirect to addRecipe.html with error message in query string
            header("Location: addRecipe.html?error=updateFailed");
            exit;
        }
    }
}
?>


