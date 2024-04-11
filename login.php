<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
  <link rel="stylesheet" href="asset/css/login.css">
  
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
<!-- Login Form -->
<form action="login_process.php" method="post" >
  <h1>Miles-5 Kitchen Chronicle</h1>
      <input type="email" name= "email" placeholder ="Email"   id="email" >
      <input type="password" name= "password" placeholder = "Password"  id="password">
      <button>Login</button>
      <div class="register">
        <p >New user? click <a href="signup.php">Register</a>  to sign up as a chef</p>
      </div>
      
</form>
  
</div>



</body>
</html>
