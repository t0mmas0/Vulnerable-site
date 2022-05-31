<?php
session_start();
if (!isset($_SESSION["username"]))
    $_SESSION["username"] = "Guest";

function addcontent(){
    if (isset($_POST["content"]) and isset($_GET["id"])){
        //Connect to db
        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);
        //Insert new content
        $store = $db->prepare("INSERT INTO CourseContent (courseID, content) VALUES (:id, :content);");
        $store->bindValue(":id", $_GET["id"], SQLITE3_INTEGER);
        $store->bindValue(":content", $_POST["content"], SQLITE3_TEXT);
        $query_result = $store->execute();
        echo "<script>alert('Content added!')</script>";
    }
}
addcontent();
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
            <a href="index.php"class="btn">Home</a>
            <a class="btn" href="courses.php">Courses</a>
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
            <a class="btn" href="signup.html">Signup</a>
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
        echo '<h2>You need to log in to access the course.</h2>
                <p>Please use the login button to log in</p>
            ';
        return;
    }

    //Connect to database
    $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);
    //Get course title
    $query_result = $db->query("SELECT * FROM Courses WHERE ID=" . $_GET["id"] . ";");
    //Expected only one or zero rows
    $row = $query_result->fetchArray();
    if (!$row){
        echo "This course doesn't exist!";
        return;
    }

    //Save course's administartor for later use
    $administrator = $row[4];

    //Show title and description of the course
    echo '
               <div class="card">
                    <div class="content">
                        <h3>' . $row[1] . '</h3>
                        <p>' . $row[2] . '</p>
                    </div>
               </div> ' ;

    //Show course content
    $query_result = $db->query("SELECT * FROM CourseContent WHERE courseID=" . $_GET["id"] . ";");
    //Each row is a new content to add to the course page
    $row = $query_result->fetchArray();
    while ($row){
        //If visibility is 0 (false), skip to next element
        if (!$row[3]){
            $row = $query_result->fetchArray();
            continue;
        }
        echo '
               <div class="card">
                    <div class="content">
                        ' . $row[2] . '
                    </div>
               </div> ' ;
        $row = $query_result->fetchArray();
    }

    //If user is an administrator of the course, show another section to add content
    if ($_SESSION["username"] == $administrator){
        echo '
                <div class="card">
                    <div class="content">
                        <form action="" method="post">
                            <label>New content to add <br>
                                <input type="text" name="content" style="width: 100%; height: 100px">
                            </label>
                            <input type="submit" value="Add">
                        </form>
                    </div>
                </div>
                    ';
    }
}

showContent();
?>



<footer id="footer">
    <div id="loginfo">
        Logged in as: <?php echo $_SESSION["username"]."."; ?>
        <a href="logout.php">Logout.</a>
    </div>
</footer>
</body>

</html>
