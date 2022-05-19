<html lang="en">
    <body>
        <p>Great you chose:<?php echo $_GET["animal"]; ?></p>
        <br>
        <p>Here you are a nice <?php echo $_GET["animal"]; ?>: </p>
        <br>
        <img src="images/<?php echo $_GET["animal"]; ?>.jpg" alt="<?php echo $_GET["animal"]; ?> image.">
    </body>
</html>