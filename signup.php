<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Miles-5 kitchen Chronickle registration form</title>
    <link rel="stylesheet" href="asset/css/signup.css">
    <!-- <link rel="stylesheet" href="asset/css/about.css"> -->
</head>
<body>

    <header>
        <!-- <div class="container1"> -->
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
    <form action = "signup_process.php " method="post">
        
        <h1>A SIGN UP TO BECOME A CHEF</h1>
       
        <input type="name" name="username" placeholder ="username"  id="username" >
        
        <input type="email" name="email" placeholder ="Email"   id="email" >

        <input type="password" name="password" placeholder = "Password"  id="password">
    
        <input type="password" name="password_confirmation" placeholder = "confirm Password"  id="confirm password">
        
        

        <button>Register</button>

        <div class="register">
            <p >New user? click <a href="Login.php">Login</a>  to sign up as a chef</p>
          </div>

    </form>
    
</body>
</html>