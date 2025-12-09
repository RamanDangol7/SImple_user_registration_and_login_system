<?php 
//connecting database
    require_once("Database/database.php");

    if($_SERVER["REQUEST_METHOD"]=="POST"){
            //sanitizing
        $firstname  = triM($_POST['firstname']);
        $lastname   = trim( $_POST['lastname']);
        $gender     =$_POST['gender'];
        $phone      = trim( $_POST['number']);
        $email      = trim( $_POST['email']);
        $username   = trim( $_POST['username']);
        $password   = $_POST['password'];
        $hashpw     = password_hash($password, PASSWORD_DEFAULT);

        //Valildation
        if(empty($firstname) || empty($lastname) || empty($gender) || empty($phone) || 
            empty($email) || empty($username) || empty($password)){
                
                echo "All fileds should be filled.";
                exit();
            }
            //email
        if(!filter_var($email,FILTER_SANITIZE_EMAIL)){
            echo "Enter the valid email.";
            exit();
        }
        
        //number
         if(!preg_match("/^[0-9]{10}$/", $phone)){
        echo "Invalid phone number.";
        exit();
         }
        //checking the username exist or not

        $check = $conn->prepare("SELECT * FROM users WHERE username=?");
        $check->bind_param("s",$username);
        $check->execute();
        $result = $check->get_result();

        if($result->num_rows > 0){
            echo "username already exists";
           exit();
        }
        
        else{

            //prepared_statement(Insertion)
            $stmt = $conn->prepare("INSERT into users(first_name, last_name, gender, phone, email, username, password)
                                                    VALUES(?,?,?,?,?,?,?) ");
            $stmt->bind_param("sssssss",
            $firstname,
            $lastname,
            $gender,
            $phone,
            $email,
            $username,
            $hashpw);
            
            if($stmt->execute()){
                header("Location: index.php");
                exit();
            }
        $stmt->close();
        $check->close();
        $conn->close();
        }
            
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <label>
            First name
            <input type="text" name="firstname">
        </label>
        <label>
            Last name
            <input type="text" name="lastname">
        </label>
        <label>
            Gender
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female
            <input type="radio" name="gender" value="Other">Other
        </label>
        <label>
            Mobile number
            <input type="text" name="number">
        </label>
        <label>
            Email
            <input type="email" name="email">
        </label>
         <label>
            Username
            <input type="text" name="username">
        </label>
        <label>
            Password
            <input type="password" name="password">
        </label>
        <label>
            <input type="submit" name="signup" value="Sign up">
        </label>
    </form>
    </div>
</body>
</html>