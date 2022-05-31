<?php
session_start();
if (!isset($_SESSION["username"]))
    $_SESSION["username"] = "Guest";
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>S.I.M.</title>
</head>
<body>
<header>
    <div id="navbar">
        <div id="navleft">
            <a class="btn" href="index.php" style="margin-right: 1%">Home</a>
            <a class="btn" href="courses.php" style="margin-right: 1%">Courses</a>
            <?php
            if ($_SESSION["username"] == "administrator"){
                echo '<a class="btn" href="management.php" style="margin-right: 1%">Management</a>';
                echo '<a class="btn" href="find.php" style="margin-right: 1%">Finder</a>';
            }
            ?>
            <?php
            if ($_SESSION["username"] != "Guest"){
                echo '<a class="btn" href="forum.php" style="margin-right: 1%">Forum</a>';
            }
            ?>
        </div>
        <div id="navcentre">
            <h2 class="title">Simple Improved Moodle</h2></div>
        <div id="navright">
            <a class="btn" href="login.html" style="margin-right: 1%">Login</a>
            <a class="btn" href="signup.php">Signup</a>
        </div>
    </div>
</header>
<div class="content">
    <h3 class="article">
        Welcome to the home page of SecureClass a revolutionary software to manage all your lessons with security.
    </h3>
    <p class="article">
        Enjoy the experience!
    </p>
</div>
<footer id="footer">
    <div id="loginfo">
        Logged in as: <?php echo $_SESSION["username"]."."; ?>
        <?php if ($_SESSION["username"] != "Guest") {
            echo "<a href='logout.php'>Logout.</a>";
        }?>
    </div>
</footer>
</body>
</html>