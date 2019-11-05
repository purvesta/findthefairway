<?php
include_once('inc/common.php');

if(($_SESSION['loggedIn'])) {
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

    <div id="content" align="left" class="manageContent">
        <h2 align="center">Manage</h2>
        <div align="center">Select Tee Times to remove</div>
        <form id="manage">
            <input type="checkbox" name="teeTime1" value="1">Tee Time 1<br>
            <input type="checkbox" name="teeTime2" value="2">Tee Time 2<br>
            <input type="checkbox" name="teeTime3" value="3">Tee Time 2<br>
            <input type="submit" id="manage-submit" class="loginButton" name="submit" value="Delete Tee Times">
        </form>
    </div>
    <?php
    printFooter();
    ?>
    </body>
    </html>
    <?php
}
else{
    header('Location: login.php');
}