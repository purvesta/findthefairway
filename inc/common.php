<?php

error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);


session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

function printHead() {
    echo
    '
    <head>
        <title>FindTheFairway</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    ' . printActivePage() . ' </head>';
}


function printHeader() {
    if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] == true)){
        echo 'Hello, ' . $_SESSION['fname'];
        echo
        '
        <header style="white-space: nowrap;">
            <h1 align="center">FindTheFairway</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="schedule.php">Schedule Tee Time</a></li>
                    <li><a href="manage.php">Manage Tee Times</a></li>
                    <li><a href="account.php">Account Settings</a></li>
                    <li><a href="loginAction.php?a=logout">Logout</a></li>
                </ul>
            </nav>
        </header>
        ';
    }
    else {
        echo
        '
        <header style="white-space: nowrap;">
            <h1 align="center">FindTheFairway</h1>
            <nav>
                <ul class="notLoggedIn">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </header>
        ';
    }
}

function printFooter() {
    echo
    '
    <footer>
            &copy Tanner Purves
    </footer>
    ';
}

function printActivePage() {
    echo
    '
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
        $(function(){
            $(\'a\').each(function(){
                if ($(this).prop(\'href\') == window.location.href) {
                    $(this).addClass(\'active\');
                    $(this).parents(\'li\').addClass(\'active\');
                }
            });
        });
    </script>
    ';
}
