<?php
session_start();
include 'config.php';

$success = "";
$error = "";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($check->num_rows > 0){
        $error = "Email already exists!";
    } else {
        $conn->query("INSERT INTO users (username,email,password)
        VALUES ('$username','$email','$password')");

        
        $_SESSION['user'] = $email;

        
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - SmartRent</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="auth-body">

<div class="auth-box">

    <h2>Create Account</h2>
    <p class="subtitle">Join SmartRent today</p>

    <?php if($success) echo "<p class='success'>$success</p>"; ?>
    <?php if($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="register">Register</button>
    </form>

    <div class="switch">
        Already have an account?
        <a href="login.php">Login</a>
    </div>

</div>

</body>
</html>