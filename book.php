<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

$message = "";
$error = "";

if(isset($_GET['id'])){
    $property_id = (int)$_GET['id'];

    
    $user_email = $_SESSION['email'];

    $user = $conn->query("SELECT id FROM users WHERE email='$user_email'");
    $user_data = $user->fetch_assoc();

    if($user_data){
        $user_id = $user_data['id'];

        $conn->query("INSERT INTO bookings (user_id, property_id)
        VALUES ($user_id, $property_id)");

        $message = "Booking successful!";
    } else {
        $error = "User not found!";
    }
} else {
    $error = "Invalid property!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking - SmartRent</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="auth-body">

<div class="auth-box">

    <?php if($message){ ?>
        <h2>Success 🎉</h2>
        <p class="success"><?php echo $message; ?></p>
    <?php } ?>

    <?php if($error){ ?>
        <h2>Error</h2>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <br>

    <a href="dashboard.php">
        <button>Back to Dashboard</button>
    </a>

</div>

</body>
</html>