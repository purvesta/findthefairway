<?php
include_once('inc/common.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindTheFairway</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
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
            <form id="account">
                <label for="txtFirstname">First Name:</label>
                <input type="text" name="txtFirstname" placeholder="First Name"/>
                <br>
                <label for="txtLastname">Last Name:</label>
                <input type="text" name="txtLastname" placeholder="Last Name"/>
                <br>
                <label for="txtPhonenumber">Phone #:</label>
                <input type="text" name="txtPhonenumber" placeholder="Phone #"/>
                <br>
                <input type="submit" id="account-submit" class="loginButton" name="submit" value="Update">
            </form>
        </div>
<?php
        printFooter();
?>
    </body>
</html>
