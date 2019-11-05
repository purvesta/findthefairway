<?php
include_once('inc/common.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindTheFairway</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
<?php
        printActivePage();
?>
    </head>
    <body>
<?php
        printHeader();
?>

        <div id="content">
            <p id="info">
                Welcome to FindTheFairway!!<br>

                This website is dedicated to getting you tee times at your favorite courses around the world, all in one place.
                We (will) use golf course APIs to get available tee time information as well as put you down in the books for
                your next round out at your favorite course.

                Get started by creating an account and having a look at the available golf courses we currently have.

                You'll be on the links shooting your lowest round before you know it!
            </p>

            <div id="get-started-button" align="center">
                <form action="login.php">
                    <input id="get-started" type="submit" value="Get Started!" />
                </form>
            </div>
        </div>
<?php
        printFooter();
?>
    </body>
</html>
