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
                <a href="courses.php">Courses</a>
            </div>
            <div id="navcentre">
                <h4>Simple Moodle Improved</h4></div>
            <div id="navright">
                <a href="login.html" style="margin-right: 1%">Login</a>
                <a href="signup.html">Signup</a>
            </div>
        </div>
    </header>

    <?php

    function showContent(){
        if (!isset($_GET["id"])){
            echo "You need to select a course from the course list!" ;
            return;
        }
        if ($_SESSION["username"] == "Guest"){
            echo "You need to log in to access the course.";
            return;
        }

        //Connect to database
        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);
        //Get course title
        $query_result = $db->query("SELECT * FROM COURSES WHERE ID=" . $_GET["id"] . ";");
        //Expected only one or zero rows
        $row = $query_result->fetchArray();
        if (!$row){
            echo "This course doesn't exist!";
            return;
        }

        echo '
               <div class="card">
                    <div class="content">
                        <h3>' . $row[1] . '</h3>
                        <p>' . $row[2] . '</p>
                    </div>
               </div> ' ;

        //TODO Implement content database and retrieve data
    }

    showContent();
    ?>

    <div class="card">
        <div class="content">
            pippero
        </div>
    </div>

    <div class="card">
        <div class="content">
            pippero
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
