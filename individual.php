<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>individual recipe</title>
    <link rel="stylesheet" href="asset/css/grouprecipe.css">
</head>
<body>

    <header>
         
        <div class="navigation">

            <button class="menu"><a href="index.html">Home</a></button>
            <button> <a  href="login.php">Sign in</a></button>
            
            <button><a href="about.php">About</a></button>
            
           
            
            
            <div class="search-container">
                <input type="search" id="searchInput" placeholder="Search...">
                <!-- <ul id="searchList">
                  <li>Item 1</li>
                  <li>Item 2</li>
                  <li>Item 3</li>
                  <li>Item 4</li>
                  <li>Item 5</li>
                </ul> -->
              </div>
</header>
<ul class="recipes" id="dynamic-list"></ul>

<div class="recipe">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['recipe_id'])) {
    $recipe_id = $_GET['recipe_id'];
    $sql = "SELECT * FROM recipoe WHERE id = $recipe_id";
    $result = mysqli_query($db, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Output the recipe details as needed
        echo '<h2>Chef Name: ' . $row["chefname"] . '</h2>';
        echo '<p>Category: ' . $row["Category"] . '</p>';
        echo '<p>Recipe Name: ' . $row["RecipeName"] . '</p>';
        echo '<p>Ingredients: ' . $row["Ingredients"] . '</p>';
        echo '<p>Directions: ' . $row["Direction"] . '</p>';
        echo '<img src="' . $row["image_path"] . '" alt="" width="100%" height="200px" />';
    } else {
        echo "Recipe not found.";
    }
} else {
    echo "Invalid request.";
}
?>
</div>






     <script>
        var items = [
            { 
                imageSrc: "asset/img/rt.jpg", 
                title: "Jollof rice", 
                ingredient: [ 

  


                    ' 2 cups long-grain parboiled rice',
                    '1 can (400g) of chopped tomatoes or tomato puree',
                    '1 medium onion, finely chopped',
                    '2-3 cloves of garlic, minced',
                    '1 green bell pepper, chopped',
                    '1/2 teaspoon cumin',
                    '2 tablespoons tomato paste',
                    '2 cups chicken or vegetable broth',
                    ' teaspoon paprika',
                    '3 tablespoons vegetable oil',
                    '1 teaspoon dried thyme'
                ],
                description: [

   
   




                        ' Heat vegetable oil in a large skillet and sauté onions until translucent, then add minced garlic, bell peppers, and Scotch bonnet peppers, cooking until softened.',
                        ' Stir in chopped tomatoes or tomato puree, along with tomato paste, and add paprika, thyme, curry powder, dried thyme, salt, and pepper, cooking until the sauce thickens.',
                        'Rinse parboiled rice and add it to the skillet, coating well with the tomato sauce.',
                        'Pour in chicken or vegetable broth, bring to a boil, then reduce heat, cover, and simmer for 20-25 minutes until rice is cooked and liquid is absorbed, stirring occasionally.',
                        ' Optionally, add cooked protein and mixed vegetables during the last 5-10 minutes of cooking, stirring to incorporate.',
                        '  Serve the Jollof rice hot as a main dish or side dish, fluffing with a fork before serving. Enjoy your flavorful meal! '
                ]
            },
            { 
                imageSrc: "asset/img/pddyam.jpg", 
                title: "pounded yam ", 
                ingredient: [ 
    
                    'Yam tubers(Typically white yam)',
                    'Water',
                   
                ],
                description: [
   
'Peel and cut yam into chunks, then cook in boiling water until soft, typically 15-20 minutes.',
' Drain the cooked yam and transfer it to a mortar and pestle or yam pounding machine',
'Pound the yam until it becomes smooth and stretchy, using a pestle or following machine instructions.',
'Shape the pounded yam into smooth balls or mounds using a spatula or spoon.',
' Serve the pounded yam hot alongside your preferred soup or stew.',
'  Enjoy your delicious pounded yam meal! Adjust yam quantity and water according to preference and serving size. '
]
            },

            { 
                imageSrc: "asset/img/R.jpeg", 
                title: "Amala", 
                ingredient: [ 

    
    
                    'Yam flour (also known as elubo)',
                    'Water',
                    
                    
                ],
                description: [
   
'Boil water in a pot, then gradually add yam flour while stirring continuously.',
'Stir vigorously to prevent lumps from forming and achieve a smooth texture.',
' Continue cooking and stirring over medium heat until the mixture thickens and forms a smooth, stretchy dough-like consistency.',
'This typically takes about 5-10 minutes of cooking.',
' Once ready, remove from heat and shape the Amala into smooth balls or mounds.',
' Serve hot alongside your favorite Nigerian soup or stew and enjoy this delicious and traditional dish. Adjust water and flour proportions to achieve desired consistency.'
]
            }

        ];

        function generateListItems() {
    var listContainer = document.getElementById("dynamic-list");

   
    items.forEach(function(item) {
        var listItem = document.createElement("li");
        listItem.className='recipe'
        var image = document.createElement("img");
        var itemDetails = document.createElement("div");
        var title = document.createElement("h3");
        var ingredientList = document.createElement("ul");
        var descriptionList = document.createElement("ul");

        image.src = item.imageSrc;
        image.alt = item.title;

        title.textContent = item.title;

        
        item.ingredient.forEach(function(ingredient) {
            var ingredientItem = document.createElement("li");
            ingredientItem.textContent = ingredient;
            ingredientList.appendChild(ingredientItem);
        });

        
item.description.forEach(function(step) {
    var stepItem = document.createElement("li");
    stepItem.textContent = step;
    descriptionList.appendChild(stepItem);
});


      
        

        itemDetails.appendChild(title);

        var ingredientText = document.createElement("p");
        ingredientText.textContent = "Ingredients:";
        itemDetails.appendChild(ingredientText);
        itemDetails.appendChild(ingredientList);

        
        var descriptionText = document.createElement("p");
        descriptionText.textContent = "Description:";
        itemDetails.appendChild(descriptionText);
        itemDetails.appendChild(descriptionList);

        listItem.appendChild(image);
        listItem.appendChild(itemDetails);

        listContainer.appendChild(listItem);
    });
}


       
        generateListItems();
    </script> 
</body>
</html>
