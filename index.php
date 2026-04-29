<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>SmartRent</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


<nav>
    <div class="logo"><a href="index.php" id="logo1">SmartRent</a></div>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
    </ul>
</nav>


<section class="hero">
    <div class="hero-content">
        <h1>Find Your Dream Rental</h1>
        <p>Rooms, Houses & Parking — All in One Place</p>
        <a href="login.php" class="hero-btn">Get Started</a>
    </div>
</section>


<section class="properties">
    <h2>Available Properties</h2>

    <div class="card-container">
        <?php
        $result = $conn->query("SELECT * FROM properties");

        while($row = $result->fetch_assoc()){
        ?>
            <div class="card">
                <div class="card-body">
                    <h3><?php echo $row['title']; ?></h3>
                    <p><b>Location:</b> <?php echo $row['location']; ?></p>
                    <p class="price">
                        ৳ <?php echo $row['price']; ?>
                        <?php 
                        if(stripos($row['title'], 'room') !== false || stripos($row['title'], 'parking') !== false){
                            echo "/month";
                        }
                        ?>
                    </p>
                    <a href="login.php" class="btn">Book Now</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>


<footer>
    <p>© 2026 SmartRent. All rights reserved.</p>
</footer>

</body>
</html>