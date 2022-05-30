<?php
session_start();
if (!isset($_SESSION["username"]))
    $_SESSION["username"] = "Guest";

if ($_SESSION["username"] != "administrator")
    die("You cannot use this resource.");


function addCourse(){
    if (isset($_POST["course-name"]) and isset($_POST["course-description"])){
        //Connect to db
        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);
        //Insert new content
        $store = $db->prepare("INSERT INTO Courses (name, description, administator) VALUES (:name, :description, :administrator);");
        $store->bindValue(":name", $_POST["course-name"], SQLITE3_TEXT);
        $store->bindValue(":description", $_POST["course-description"], SQLITE3_TEXT);
        $store->bindValue(":administrator", "teacher", SQLITE3_TEXT);
        $store->execute();
        echo "<script>alert('Content added!')</script>";
    }
}
addCourse();

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
            <a class="btn" href="index.php" style="margin-right: 1%">Home</a>
            <a class="btn" href="courses.php" style="margin-right: 1%">Courses</a>
            <?php
            if ($_SESSION["username"] == "administrator"){
                echo '<a class="btn" href="management.php" style="margin-right: 1%">Management</a>';
            }
            ?>
            <?php
            if ($_SESSION["username"] != "Guest"){
                echo '<a class="btn" href="forum.php" style="margin-right: 1%">Forum</a>';
            }
            ?>
        </div>
        <div id="navcentre">
            <h4>Simple Moodle Improved</h4></div>
        <div id="navright">
            <a class="btn" href="login.html" style="margin-right: 1%">Login</a>
            <a class="btn" href="signup.html">Signup</a>
        </div>
    </div>
</header>
<div class="card">
    <div class="content">
        <p>Use this panel to add a course from the course database</p>
        <p>Add course</p>
        <form action="management.php" method="post">
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
            <input class="btn" type="submit" value="Submit">
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
