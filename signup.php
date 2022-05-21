<?php

    function signup(){
        //Otteniamo le variabili
        $username = $_POST["username"];
        $password = $_POST["password"];

        //Apriamo di db
        $db = new SQLite3("SecureDB.sqlite", SQLITE3_OPEN_READWRITE);

        //Controlliamo che il nome utente non sia già inserito
        $result = $db->query("SELECT count() FROM Users WHERE Username = '" . $username . "'");
        $row = $result->fetchArray();
        if ($row[0] > 0){
            echo "Username already taken. ";
            return;
        }

        //Registriamo l'utente
        $insert_query = "INSERT INTO Users VALUES ('". $_POST["username"] ."','". $_POST["password"]."')" ;
        $result = $db->exec($insert_query);
        if ($result)
            echo "Successfully registered. ";
        else
            echo "Registration failed. ";
    }

    signup();

?>
<a href="home.php">Back to home.</a>
