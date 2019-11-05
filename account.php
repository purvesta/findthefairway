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

    <div id="content" align="center" class="accountContent">
        <h2 align="center">Account</h2>
        <form id="account" method="post" action="accountAction.php?a=update">
            <label for="txtFirstname">First Name:</label>
            <input type="text" name="txtFirstname" placeholder="First Name" value="<?php echo $_SESSION['fname']; ?>"/>
            <br>
            <label for="txtLastname">Last Name:</label>
            <input type="text" name="txtLastname" placeholder="Last Name" value="<?php echo $_SESSION['lname']; ?>"/>
            <br>
            <label for="txtPhonenumber">Phone #:</label>
            <input type="text" name="txtPhonenumber" placeholder="Phone #" value="<?php echo $_SESSION['phone']; ?>"/>
            <br>
            <input type="submit" id="account-submit" class="loginButton" name="submit" value="Update">
        </form>
    </div>
    <?php
    printFooter();
    ?>
    </body>
    </html>
    <?php
    echo $_SESSION['err'];
    $_SESSION['err'] = '';
}
else{
    header('Location: login.php');
}