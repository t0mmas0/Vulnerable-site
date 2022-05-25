<?php
    session_start();
    if (!isset($_SESSION["username"]))
        $_SESSION["username"] = "Guest";
?>
<!doctype html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Home</title>
    </head>
    <body>
        <header>
            <div id="navbar">
                <div id="navleft">
                    <a href="home.php" style="margin-right: 1%">Home</a>
                    <a href="courses.php" style="margin-right: 1%">Courses</a>
                    <?php
                        if ($_SESSION["username"] == "administrator"){
                            echo '<a href="management.php">Management</a>';
                        }
                    ?>
                </div>
                <div id="navcentre">
                    <h4>Simple Moodle Improved</h4></div>
                <div id="navright">
                    <a href="login.html" style="margin-right: 1%">Login</a>
                    <a href="signup.html">Signup</a>
                </div>
            </div>
        </header>
        <div class="card">
            <div class="content">
                <p class="article">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed metus tortor, egestas ut dui id, suscipit rhoncus ante. Curabitur facilisis viverra blandit. Ut convallis dui id elit imperdiet, id dapibus ex consectetur. Curabitur in mi sed justo ultrices auctor. Quisque sagittis augue quis leo vestibulum suscipit. Phasellus vel augue eleifend, pulvinar turpis ut, venenatis velit. Morbi commodo leo sed nunc sagittis auctor sed nec tellus. Sed a congue sapien, at tincidunt erat. Vestibulum felis neque, placerat sit amet bibendum id, bibendum ut tortor. Pellentesque risus libero, venenatis eu pellentesque lobortis, lacinia mollis augue. Maecenas a ligula eu mi finibus fringilla. Vivamus sollicitudin lectus pharetra, aliquam nisi vitae, commodo nunc. Aenean venenatis tellus quam, ut facilisis augue ultrices sed.
                </p>
                <p class="article">
                    Integer ut diam risus. Maecenas varius justo vel ante semper, vitae blandit lacus placerat. Ut pellentesque rhoncus nibh ac interdum. Sed non felis in nulla sodales consectetur at id urna. Nunc eget hendrerit arcu. Aenean efficitur augue a dui pulvinar, ullamcorper imperdiet nisl maximus. Nam suscipit diam quis varius tempor. Phasellus vitae mi justo. Nulla posuere ligula iaculis, consequat nunc ut, lacinia leo. Nulla faucibus orci at nulla malesuada iaculis. Sed ullamcorper nulla a diam placerat, quis viverra elit dignissim. Mauris sed nibh commodo tellus pharetra rutrum sit amet a enim. Vestibulum risus enim, bibendum quis ultricies sed, sagittis ullamcorper ante. Fusce gravida diam orci, vel mattis massa convallis volutpat. Donec vestibulum ipsum id tortor luctus ultrices. Maecenas ut sapien laoreet, commodo nisi quis, semper arcu.
                </p>
                <p class="article">
                    Vivamus in velit ac neque fringilla commodo at in est. Nam eros massa, aliquet sit amet libero sit amet, congue commodo erat. Vestibulum vestibulum dolor sem, in euismod quam placerat id. Suspendisse id urna pellentesque, aliquam enim sed, lobortis nibh. Maecenas lacinia at lacus et feugiat. Etiam dapibus arcu non quam ultrices, ut dignissim magna accumsan. Nulla sem justo, dictum id justo tincidunt, tristique rutrum magna. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce nec gravida justo. In sit amet luctus ex. Fusce tempus sapien id est tempor volutpat. Vivamus eros tortor, facilisis ut viverra ac, sollicitudin sed neque. Pellentesque et nibh id risus tincidunt commodo. Maecenas dapibus, sapien quis iaculis tincidunt, quam libero sollicitudin metus, non mattis orci massa id augue.
                </p>
                <p class="article">
                    Vivamus hendrerit eu justo vitae venenatis. Integer mattis id sapien et vestibulum. Cras iaculis, nisl non scelerisque convallis, est leo vulputate elit, vitae congue leo nunc sed odio. Integer in tristique lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum commodo mattis justo at vulputate. Sed non lacus sem. Nulla at eros tempus, feugiat est nec, ullamcorper ex. Nunc leo mi, interdum vel dignissim ac, malesuada facilisis elit.
                </p>
                <p class="article" style="margin-bottom: 0">
                    Vestibulum sit amet felis at libero congue vehicula eu in magna. Morbi venenatis et felis sed posuere. Morbi ut turpis sodales, hendrerit risus ac, vehicula ipsum. Morbi mollis dapibus est sed facilisis. Nullam tempus interdum felis ut convallis. Maecenas vel velit consequat, porta odio a, molestie libero. Nulla augue quam, aliquam vehicula luctus quis, congue sit amet massa. Nulla iaculis tortor eu tincidunt tincidunt. Sed urna leo, elementum non semper in, pretium varius eros. Mauris id feugiat mi. Nunc fermentum fermentum ipsum, volutpat porttitor risus pulvinar ac. In id ligula a enim dictum elementum ut et sapien. Praesent vitae nunc a arcu luctus consequat. Pellentesque id bibendum risus, et faucibus orci.
                </p>
            </div>
        </div>
        <footer id="footer">
            <div id="loginfo">
                Logged in as: <?php echo $_SESSION["username"]."."; ?>
                <?php if ($_SESSION["username"] != "Guest") {
                    echo "<a href='logout.php'>Logout.</a>";
                }?>
            </div>
        </footer>
    </body>
</html>