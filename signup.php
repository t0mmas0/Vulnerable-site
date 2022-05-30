<?php

function signup(){
    //Otteniamo le variabili
    $username = $_POST["username"];
    $password = $_POST["password"];

    //Apriamo di db
    $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);

    //Controlliamo che il nome utente non sia già inserito
    $query = $db->prepare("SELECT count() FROM Users WHERE Username = :username");
    $query->bindValue(":username", $username, SQLITE3_TEXT);
    $result = $query->execute();
    $row = $result->fetchArray();
    if ($row[0] > 0){
        echo "Username already taken. ";
        return;
    }

    //Registriamo l'utente
    $query = $db->prepare("INSERT INTO Users VALUES (:username, :password)");
    $query->bindValue(":username", $username, SQLITE3_TEXT);
    $query->bindValue(":password", $password, SQLITE3_TEXT);
    $result = $query->execute();
    if ($result)
        echo '<h2 style="padding: 10px">Successfully registered.</h2>';
    else
        echo '<h2 style="padding: 10px"> Registration failed.</h2>';
}
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>S.I.M.</title>
</head>
<header>
    <div id="navbar">
        <div id="navleft">
            <a class="btn" href="index.php" style="margin-right: 1%">Home</a>
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
signup();
?>
<div style="width: 115px; text-align: center; padding-left: 10px">
    <a class="btn" href="index.php">Back to Home</a>
</div>
