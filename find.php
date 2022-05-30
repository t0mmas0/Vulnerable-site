<?php
session_start();
if (!isset($_SESSION["username"]))
    $_SESSION["username"] = "Guest";

if ($_SESSION["username"] != "administrator")
    die("You cannot use this resource.");


function findUser(){
    if (isset($_POST["username"])){
        //Connect to db
        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);

        //Search for user
        $result = $db->query('SELECT Username FROM Users where Username LIKE ' ."'%" . $_POST["username"] . "%';");

        $row = $result->fetchArray();

        while ($row){
            echo $row[0] . "<br>";
            $row = $result->fetchArray();
        }

    }
}

findUser();

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
        <p>Use this panel to search if a user exists.</p>
        <p>Search user</p>
        <form action="find.php" method="post">
            <label>
                Username:
                <input name="username" type="text">
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
