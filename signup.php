<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="style.css" rel="stylesheet">
    <title>S.I.M. SignUp</title>
</head>
<body>
<header>
    <div id="navbar">
        <div id="navleft">
            <a class="btn" href="index.php" style="margin-right: 1%">Home</a>
            <a class="btn" href="courses.php" style="margin-right: 1%">Courses</a>

        </div>
        <div id="navcentre">
            <h2 class="title">Simple Improved Moodle</h2></div>
        <div id="navright">
            <a class="btn" href="login.html" style="margin-right: 1%">Login</a>
            <a class="btn" href="signup.html">Signup</a>
        </div>
    </div>
</header>
        <div class="text">
            <form action="signedup.php" method="post">
                <h4>Use this webpage to register to moodle.</h4><br>
                <label>
                    Username
                    <input name="username" type="text">
                </label><br><br>
                <label>
                    Password
                    <input name="password" type="password">
                </label><br><br>
                <?php
                    if ($_SESSION["username"] == "administrator"){
                      echo '
                        <label>
                            Is Teacher
                            <input name="teacher" type="checkbox">
                        </label><br><br>
                        ';
                    }
                ?>
                <input class="btn" type="submit" value="Submit"><br>
            </form>
        </div>
</body>
</html>