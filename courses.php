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
    <link rel="stylesheet" href="courses.css">
    <title>Courses</title>
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
<div id="grid">

    <?php
    //Apriamo il db
    $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);

    //Leggiamo il numero di corsi
    $query_result = $db->query("SELECT * FROM Courses;");
    $row = $query_result->fetchArray();

    while ($row) {
        /** @noinspection CssUnknownTarget */
        echo '<div class="grid-card">
                                <div class="image-div" style="background-image:url(\''. $row[3] .' \') ;"> </div>
                                <h3><a class="course-link" href="course.php?id='. $row[0] .'">' . $row[1] .'</a></h3>
                                <p>' . $row[2] .'</p> </div>';
        $row = $query_result->fetchArray();
    }
    ?>
</div>
<footer id="footer">
    <div id="loginfo">
        Logged in as: <?php echo $_SESSION["username"]."."; ?>
        <a href="logout.php">Logout.</a>
    </div>
</footer>
</body>
</html>