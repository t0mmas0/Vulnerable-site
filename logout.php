<?php
    session_start();
    session_unset();
    session_regenerate_id();
    echo "Logged out."; ?> <a href="home.php">Back to home.</a>