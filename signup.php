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
            echo "Successfully registered. ";
        else
            echo "Registration failed. ";
    }

    signup();

?>
<a href="home.php">Back to home.</a>
