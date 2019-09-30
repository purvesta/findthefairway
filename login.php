<?php
include_once('inc/common.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FindTheFairway</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
<?php
        printHeader();
?>

        <div id="content" align="center">
            <h2 align="center">Login</h2>
            <form id="login">
                <label for="txtUsername">Username:</label>
                <input type="text" name="txtUsername" placeholder="Username"/>
                <br>
                <label for="txtPassword">Password:</label>
                <input type="text" name="txtPassword" placeholder="Password"/>
                <br>
                <input type="submit" id="login-submit" class="loginButton" name="submit" value="Login">
            </form>

            <h2 align="center" class="clearBoth">Register</h2>
            <form id="register">
                <label for="txtFirstname">First Name:</label>
                <input type="text" name="txtFirstname" placeholder="First Name"/>
                <br>
                <label for="txtLastname">Last Name:</label>
                <input type="text" name="txtLastname" placeholder="Last Name"/>
                <br>
                <label for="txtPhonenumber">Phone #:</label>
                <input type="text" name="txtPhonenumber" placeholder="Phone #:"/>
                <br>
                <label for="txtUsername">Username:</label>
                <input type="text" name="txtUsername" placeholder="Username"/>
                <br>
                <label for="txtPassword">Password:</label>
                <input type="text" name="txtPassword" placeholder="Password"/>
                <br>
                <label for="txtReEnterPass">Re-enter Password:</label>
                <input type="text" name="txtReEnterPass" placeholder="Re-enter Password"/>
                <br>
                <input type="submit" id="register-submit" class="loginButton" name="submit" value="Register">
            </form>
        </div>
<?php
        printFooter();
?>
    </body>
</html>
