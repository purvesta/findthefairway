<?php
include_once('inc/common.php');
if(!($_SESSION['loggedIn'])) {
    ?>
    <!DOCTYPE html>
    <html>
<?php
    printHead();
?>
    <body>
    <?php
    printHeader();


    ?>

    <div id="content" align="center" class="loginContent">
        <h2 align="center">Login</h2>
        <form id="login" method="post" action="loginAction.php?a=login">
            <label for="txtLUsername">Username:</label>
            <input type="text" name="txtLUsername" placeholder="Username"
                   value="<?php echo $_POST['txtLUsername']; ?>"/>
            <br>
            <label for="txtLPassword">Password:</label>
            <input type="password" name="txtLPassword" placeholder="Password"
                   value="<?php echo $_POST['txtLPassword']; ?>"/>
            <br>
            <input type="submit" id="login-submit" class="loginButton" name="submit1" value="Login">
        </form>

        <h2 align="center" class="clearBoth">Register</h2>
        <form id="register" method="post" action="loginAction.php?a=register">
            <label for="txtFirstname">First Name:</label>
            <input type="text" name="txtFirstname" placeholder="First Name"
                   value="<?php echo $_POST['txtFirstname']; ?>"/>
            <br>
            <label for="txtLastname">Last Name:</label>
            <input type="text" name="txtLastname" placeholder="Last Name" value="<?php echo $_POST['txtLastname']; ?>"/>
            <br>
            <label for="txtPhonenumber">Phone #:</label>
            <input type="text" name="txtPhonenumber" placeholder="Phone #:"
                   value="<?php echo $_POST['txtPhonenumber']; ?>"/>
            <br>
            <label for="txtUsername">Username:</label>
            <input type="text" name="txtUsername" placeholder="Username" value="<?php echo $_POST['txtUsername']; ?>"/>
            <br>
            <label for="txtPassword">Password:</label>
            <input type="password" name="txtPassword" placeholder="Password" value="<?php echo $_POST['txtPassword']; ?>"/>
            <br>
            <label for="txtReEnterPass">Re-enter Password:</label>
            <input type="password" name="txtReEnterPass" placeholder="Re-enter Password"
                   value="<?php echo $_POST['txtReEnterPass']; ?>"/>
            <br>
            <input type="submit" id="register-submit" class="loginButton" name="submit2" value="Register">
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
    echo 'You\'re already logged in!';
}
