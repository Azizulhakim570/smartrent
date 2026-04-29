<?php
session_start();
include 'config.php';

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - SmartRent</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


<nav>
    <div class="logo"><a href="index.php" id="logo1">SmartRent</a></div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</nav>


<section class="hero">
    <div class="hero-content">
        <h1>Welcome, <?php echo $_SESSION['user']; ?></h1>
        <p>Find and book your perfect place</p>
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

                    
                    <a href="book.php?id=<?php echo $row['id']; ?>&type=rent" class="btn">Rent</a>
                    <a href="book.php?id=<?php echo $row['id']; ?>&type=buy" class="btn">Buy</a>
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