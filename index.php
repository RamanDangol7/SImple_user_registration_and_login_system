<?php 

    if($_SERVER['REQUEST_METHOD']=='POST'){
            if(!empty($_POST['username']) && (!empty($_POST['password']))){
                $username=$_POST['username'];
                $password=$_POST['password'];

            }
            else{
                echo "Enter username or password";
            }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href ="style.css">
</head>
<body>
    <div class="container">
        <h3> Welcome To Our Webiste</h3>
        <form action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
    <label>
       Username  
       <input type = "text" name="username">
    </label>
    <label> 
        Password  
        <input type ="password" name = "password">
    </label>

    <label>
    <input type ="submit" name ="login" value="login">
    </label>

         <p>Don't have an account? <a href="Registration.php"> Sign up</a></p>
</form>
    </div>

</body>
</html>
