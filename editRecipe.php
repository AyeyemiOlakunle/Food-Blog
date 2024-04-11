

<html>
    <body>

        <?php
            include('connection.php');
          
            $RecipeName = $_POST['RecipeName'];
            $sql = "SELECT * FROM recipoe WHERE RecipeName='$RecipeName'";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                
                $chefname = $row["chefname"];
                $category = ""; // Assuming category is not retrieved for editing
                $RecipeName = $row["RecipeName"];
                $Ingredients = $row["Ingredients"];
                $Direction = $row["Direction"];
                $imagePath = $row["image_path"];

                echo "
                <form method='post' action='updateRecipe.php'>
                    <input type='hidden' name='RecipeName' value='$RecipeName'/>
                    <label>Chef Name:</label>
                    <input type='text' name='chefname' value='$chefname'/><br><br>
                    <img class='main-logo' src='$imagePath' alt='' width='300px' height='200px' /><br><br>
                    <input type='file' name='image_path'/><br><br>
                    <label>Recipe Name:</label>
                    <input type='text' name='RecipeName' value='$RecipeName'/><br><br>
                    <label>Ingredients:</label><br>
                    <textarea name='Ingredients' rows='5' cols='100'>$Ingredients</textarea><br><br>
                    <label>Directions:</label><br>
                    <textarea name='Direction' rows='10' cols='100'>$Direction</textarea><br><br>
                    <input type='submit' name='submit' value='Submit'/>
                    <input type='button' value='Reset'/>
                </form>";
            } else {
                echo "Recipe Not Found";
            }

            $db->close();
        ?>

    </body>
</html>


