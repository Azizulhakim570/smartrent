<?php
session_start();
include 'config.php';

$error = "";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");

    if($result && $result->num_rows > 0){
        $row = $result->fetch_assoc();

        $_SESSION['user'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - SmartRent</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="auth-body">

<div class="auth-box">
    <h2>Welcome Back</h2>
    <p class="subtitle">Login to your account</p>

    <?php if($error) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">Login</button>
    </form>

    <div class="switch">
        Don't have an account? <a href="register.php">Register</a>
    </div>
</div>

</body>
</html>