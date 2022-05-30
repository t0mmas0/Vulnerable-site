<?php
    session_start();
    session_unset();
    session_regenerate_id();
    echo '<h2> Logged out.</h2>';
    ?>
<a class="btn" href="index.php">Back to home.</a>