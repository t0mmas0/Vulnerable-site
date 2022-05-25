<?php
session_start();
if (!isset($_SESSION["username"]))
    $_SESSION["username"] = "Guest";

if ($_SESSION["username"] == "Guest")
    die( "You need to log in to see the forum messages.");

function sendMessage(){
    if (isset($_POST["username"]) && isset($_POST["message"])){
        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);
        $query = $db->prepare("INSERT INTO Forum (username, content) VALUES (:user, :message)");
        $query->bindValue(":user", $_POST["username"], SQLITE3_TEXT);
        $query->bindValue(":message", $_POST["message"], SQLITE3_TEXT);
        $query_result = $query->execute();
    }
}
sendMessage();
?>
<!doctype html>
<html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Forum</title>
    </head>

    <body>
        <header>
            <div id="navbar">
                <div id="navleft">
                    <a href="home.php" style="margin-right: 1%">Home</a>
                    <a href="courses.php" style="margin-right: 1%">Courses</a>
                    <?php
                    if ($_SESSION["username"] == "administrator"){
                        echo '<a href="management.php" style="margin-right: 1%">Management</a>';
                    }
                    ?>
                    <?php
                    if ($_SESSION["username"] != "Guest"){
                        echo '<a href="forum.php" style="margin-right: 1%">Forum</a>';
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

        <div class="card" style="">
            <div class="content" style="overflow: scroll; height: 400px">
                <?php
                    function showMessages(){
                        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);
                        $query_result = $db->query("SELECT * FROM Forum");
                        $row = $query_result->fetchArray();
                        while($row){
                            echo "<p>&lt;". $row[1]. "&gt;: " . $row[2] ."</p>";
                            $row = $query_result->fetchArray();
                        }
                    }

                    showMessages();
                ?>
            </div>
            <form action="forum.php" method="post">
                <div class="content">
                    <label> Message:
                        <input type="text" name="message" style="width: 85%">
                    </label>
                    <input type="hidden" name="username" value= <?php echo "'". $_SESSION["username"] . "'"?>>
                    <input type="submit" value="Send">
                </div>
            </form>
        </div>

        <footer id="footer">
        <div id="loginfo">
            Logged in as: <?php echo $_SESSION["username"]."."; ?>
            <a href="logout.php">Logout.</a>
        </div>
    </footer>
    </body>

</html>