<?php
    function login(){
        session_start();
        //Otteniamo le variabili
        $username = $_POST["username"];
        $password = $_POST["password"];

        //Apriamo di db
        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);

        //Controlliamo che il nome utente e la password corrispondano
        $result = $db->query("SELECT * FROM Users WHERE Username = '" . $username . "' AND Password = '" . $password . "';");
        $row = $result->fetchArray();
        if (!$row){
            echo "Incorrect login credentials. ";
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
        echo "Succesfully logged in. ";
    }

    login();

?>
<a href="home.php">Back to home.</a>
