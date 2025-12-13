<?php 
require_once( "../Database/database.php");
session_start();

if($_SERVER['REQUEST_METHOD'] =="POST"){

        if(!empty($_POST["logout"])){
            $conn->close();
            header("Location: ../logout.php");
            exit();
        }
        
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
        <h3>Welcome <?php echo $_SESSION['firstname'];?></h3>
        <label>
            <input type ="submit" name="logout" value="logout">
        </label>
    </form>
    </div>
</body>
</html>