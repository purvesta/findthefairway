<?php

function printHeader() {
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>
    ';
}

function printFooter() {
    echo
    '
    <footer>
            &copy Tanner Purves
    </footer>
    ';
}