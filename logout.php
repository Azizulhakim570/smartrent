<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logging Out</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="refresh" content="2;url=index.php">
</head>
<body class="auth-body">

<div class="auth-box">
    <h2>You have been logged out</h2>
    <p class="subtitle">See you again soon 👋</p>

    <a href="login.php">
        <button>Login Again</button>
    </a>
</div>

</body>

</body>
</html>