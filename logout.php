<html>
<head>
    <title>Logged Out</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
session_start();
session_unset();
session_regenerate_id();
echo '<h2 style="padding: 10px"> Logged out.</h2>';
?>
<a class="btn" href="index.php">Back to home.</a>
</body>
</html>

