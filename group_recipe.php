<?php

include ('connection.php');
session_start();

$sql = "SELECT * FROM recipoe";
$result = mysqli_query($db, $sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>group recipe</title>
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
<div class="recipes">


    <?php
    if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        
echo '<a class="recipe" href="individual.php?recipe_id=' . $row["id"] . '">';


        echo '<img class="main-logo" src="' . $row["image_path"] . '" alt="" width="100%" height="200px" />';

echo "<h2>Chef Name: " . $row["chefname"] . "</h2>";
echo "<p>Category: " . $row["Category"] . "</p>";
echo "<p>Recipe Name: " . $row["RecipeName"] . "</p>";
echo "<p>Ingredients: " . $row["Ingredients"] . "</p>";
echo "<p>Directions: " . $row["Direction"] . "</p>";
echo "</a>";

    }
} else {
    echo "<p>No chef recipes added yet.</p>";
}

?>

</div>



    <script>
        var items = [
            { 
                imageSrc: "asset/img/jollof1.jpg", 
                title: "Jollof rice and chicken", 
                ingredient: [ 
                    'cup long-grain white rice',
                    'chicken breasts',
                    '1 small onion, chopped',
                    '2 cloves garlic, minced',
                    '1 teaspoon paprika',
                    '1/2 teaspoon cumin',
                    'Salt and pepper to taste',
                    'Chopped fresh parsley or cilantro for garnish (optional)'
                ],
                description: [

   
                        'Cook diced chicken breasts until browned and cooked through, then set aside.',
                        'Sauté chopped onion until translucent, then add minced garlic and cook until fragrant.',
                        'Add paprika, cumin, and uncooked rice to skillet, stirring to coat.',
                        'Pour in chicken broth, bring to a boil, then simmer covered until rice is cooked.',
                        ' Combine cooked chicken with rice, stirring to combine and heat through.',
                        '  Season with salt and pepper, garnish with parsley or cilantro, and serve hot. '
                ]
            },
            { 
                imageSrc: "asset/img/pyam.jpg", 
                title: "pounded yam and Efo", 
                ingredient: [ 
    
                    'Yam tubers(Typically white yam)',
                    'Water',
                    'Egusi (melon) seeds',
                    'Palm oil',
                    'Assorted meats (such as beef, chicken, or fish)',
                    'Stockfish and/or dried fish',
                    'Ground crayfish',
                    'Seasonings (such as bouillon cubes, salt, and pepper)',
                    'Optional ingredients: locust beans (iru), dried shrimp, and other spices according to personal preference ',
                    ' Fresh tomatoes or tomato paste'
                ],
                description: [


   
'Peel and boil yam until soft, then pound until smooth, shaping into balls or mounds for serving',
'Sauté onions in palm oil until translucent, then add ground egusi and tomatoes, cooking until oil separates.',
'Gradually incorporate meat stock or water while stirring to achieve desired consistency.',
'Add assorted meats, stockfish, and dried fish, seasoning with ground crayfish, bouillon cubes, salt, and pepper.',
' Simmer the soup covered until meats are tender and flavors are well combined.',
'  Lastly, add chopped vegetables such as bitter leaf or spinach, simmering until cooked through, then serve hot alongside the pounded yam. '
]
            },

            { 
                imageSrc: "asset/img/amala.jpg", 
                title: "Amala and Ewedu", 
                ingredient: [ 


    
                    'Ewedu leaves (also known as jute leaves or molokhia)',
                    'WGround crayfish',
                    'Palm oil or any preferred cooking oil',
                    'Fresh or dried fish (optional)',
                    'Seasonings (such as bouillon cubes, salt, and pepper)',
                    'Locust beans (iru) - optional',
                    'Onions',
                    'Ground pepper (usually scotch bonnet or habanero pepper)',
                    'Salt ',
                    
                ],
                description: [


  
   
'Prepare Amala dough by mixing yam flour with water until a smooth paste-like consistency is achieved, then cook over medium heat until thickened.',
'Form the cooked Amala into small balls or mounds.',
'Wash and boil ewedu leaves until tender, then blend until smooth.',
'Add assorted meats, stockfish, and dried fish, seasoning with ground crayfish, bouillon cubes, salt, and pepper.',
' Sauté onions in palm oil, then add the blended ewedu leaves and season with ground crayfish, pepper, salt, and optional locust beans.',
' Simmer the Ewedu soup until heated through, then serve hot alongside the prepared Amala dough. Enjoy your delicious Nigerian meal! Adjust seasoning according to taste preferences. '
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
