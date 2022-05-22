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
    <title>Home</title>
</head>
<body>
<header>
    <div id="navbar">
        <div id="navleft">
            <a href="home.php" style="margin-right: 1%">Home</a>
            <a href="courses.php" style="margin-right: 1%">Courses</a>
            <?php
            if ($_SESSION["username"] == "administrator"){
                echo '<a href="management.php">Management</a>';
            }
            ?>
        </div>
        <div id="navcentre">
            <h4>Simple Moodle Improved</h4></div>
        <div id="navright">
            <a href="login.html" style="margin-right: 1%">Login</a>
            <a href="signup.html">Signup</a>
        </div>
    </div>
</header>
<div class="card">
    <div class="content">
        <p>Use this panel to add or remove a course from the course database</p>
        <p>Add course</p>
        <form action="add-course.php" method="post">
            <label>
                Course name:
                <input name="course-name" type="text">
            </label>
            <br>
            <label>
                Course description:
                <input name="course-description" type="text">
            </label>
            <br>
            <input type="submit" value="Submit">
        </form>
        <br><br>
        <p>Remove course</p>
        <form action="remove-course.php" method="post">
            <label>
                Course name:
                <input name="course-name" type="">
            </label>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
<footer id="footer">
    <div id="loginfo">
        Logged in as: <?php echo $_SESSION["username"]."."; ?>
        <a href="logout.php">Logout.</a>
    </div>
</footer>
</body>
</html>
