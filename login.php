<?php
function login(){
    session_start();
    //Otteniamo le variabili
    $username = $_POST["username"];
    $password = $_POST["password"];

    //Apriamo di db
    $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);

    //Controlliamo che il nome utente e la password corrispondano
    $query = $db->prepare('SELECT * FROM Users WHERE Username = :username AND Password = :password ');
    $query->bindValue(":username", $username, SQLITE3_TEXT);
    $query->bindValue(":password", $password, SQLITE3_TEXT);
    $result = $query->execute();
    $row = $result->fetchArray();
    if (!$row){
        echo '<h2 style="padding: 10px">Incorrect login credentials.</h2> ';
        return;
    }

    //Siamo loggati. Impostiamo la sessione corrente come distrutta
    $_SESSION["destroyed"] = time();
    //Rigeneriamo id sessione
    session_regenerate_id();
    //Un-settiamo la distruzione di questa sessione
    unset($_SESSION["destroyed"]);

    //Impostiamo variabili di sessione
    $_SESSION["username"] = $username;
    echo '<h2 style="padding: 10px"> Succesfully logged in.</h2> ';
}

?>
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
        </div>
        <div id="navcentre">
            <h2 class="title">Simple Improved Moodle</h2></div>
        <div id="navright">
            <a class="btn" href="login.html" style="margin-right: 1%">Login</a>
            <a class="btn" href="signup.html">Signup</a>
        </div>
    </div>
</header>

<?php login();?>
<div style="width: 115px; text-align: center; padding-left: 10px">
    <a class="btn" href="index.php">Back to Home</a>
</div>
</body>

