<?php 
//Session start
    require_once("Database/database.php");
    session_start();

    if($_SERVER['REQUEST_METHOD']=='POST'){

            if(!empty($_POST['username']) && !empty($_POST['password'])){
                $username=trim($_POST['username']);
                $password=trim($_POST['password']);

                //Checking the username.

                $check = $conn->prepare("SELECT * FROM users WHERE username=?");
                $check->bind_param("s",$username);
                $check->execute();
                $result = $check->get_result();

                if($result->num_rows ==1){
                    $user = $result->fetch_assoc();
                    $verify_pw = $user["password"];

                    //verifying the pw.
                    if(password_verify($password,$verify_pw)){
                     $_SESSION["username"]= $user["username"];
                     $_SESSION["firstname"]=$user["first_name"];
                     $_SESSION["id"]=$user["id"];
                     $check->close();
                     $conn->close();
                     header("Location: Dashboard/Dashboard.php");
                     exit();

                    

                }
                else{
                    //incoreect pw.
                    $check->close();
                    $conn->close();
                    header("Location:index.php");
                    exit();
                }
            }
            else{
                //username not found
                $check->close();
                $conn->close();
                header("Location:index.php");
               exit();
            }  
    }
    else{
        //all field should be filled.
        header("Location:index.php");
        exit();
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
        <form id ="login_form" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method = "POST">
    <label>
       Username  
       <input type = "text" name="username" id ="username">
    </label>
    <label> 
        Password  
        <input type ="password" name = "password" id ="password">
    </label>

    <label>
    <input id ="submit" type ="submit" name ="login" value="login">
    </label>

         <p>Don't have an account? <a href="Registration.php"> Sign up</a></p>
</form>
    </div>
    <script>
        const form = document.getElementById("login_form");
        const username = document.getElementById("username");
        const password = document.getElementById("password");

        form.addEventListener("submit",(event) =>{
                if(username.value === ""|| password.value ===""){
                    alert("Please input all filed.");
                    event.preventDefault();
                }
        });
    </script>
</body>
</html>