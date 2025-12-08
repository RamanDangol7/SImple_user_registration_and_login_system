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
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Others
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