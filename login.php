<?php
include_once('inc/common.php');
include_once('inc/ajax.php');

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

    <script type="text/javascript">
        $(document).ready(function(){
            
            var firstName       = $('#fname');
            var lastName        = $('#lname');
            var userName        = $('#uname');
            var password        = $('#pass');
            var confirmPassword = $('#repass');
            var phone           = $('#phone');
        
            firstName.blur(function(){checkInputs(firstName.val(), 'txtFirstname');});
                
            lastName.blur(function(){checkInputs(lastName.val(), 'txtLastname');});
            
            userName.blur(function(){checkInputs(userName.val(), 'txtUsername');});
            
            password.blur(function(){checkInputs(password.val(), 'txtPassword');});
            
            confirmPassword.blur(function(){checkPasswords(password.val(), confirmPassword.val());});
            
            phone.blur(function(){checkInputs(phone.val(), 'txtPhonenumber');});
            
        });
                
        function checkPasswords(password, confirmPassword){
            if(password != '' && confirmPassword == ''){
                checkInputs(password, 'password', 'input');
            }
            else if(password == '' && confirmPassword != ''){
                $('#txtPasswordValid').html('Passwords do not match!!');
                $('#confirmPasswordLabel').html('Passwords do not match!!');
            }
            else if(password == '' && confirmPassword == ''){
                $('#txtPasswordValid').html('You need to put in a password!');
                $('#txtReEnterPassValid').html('You need to put in a password!');
            }
            else if(password != '' && confirmPassword != ''){
                if(password === confirmPassword){
                    $('#txtPasswordValid').html('Passwords Match');
                    $('#txtReEnterPassValid').html('Passwords Match');
                }
                else{
                    $('#txtPasswordValid').html('Passwords do not match!!');
                    $('#txtReEnterPassValid').html('Passwords do not match!!');
                }
            }
        }
        
        function checkInputs(value, name){
            
            console.log('in checkInputs()');
        
            //make ajax call
            
            var stuff = {
                'value' : value, 
                'name' : name,
            };
            
            
            $.ajax({
                url: "inc/ajax.php",
                type: 'POST',
                data: stuff,
                dataType: 'json',
                beforeSend: function(){
                    console.log(value+' '+name);
                },
                success: function(data){
                    console.log('Ajax returned successful');
                    if(data === 'duplicate'){
                        document.write('Sorry buddy, you already signed up for an account!');
                    }
                    else if(data === 'invalid'){
                        $('#' + name + 'Valid').html('invalid');
                        console.log(name + ' is invalid...');
                    }
                    else{
                        $('#' + name + 'Valid').html('valid');
                        console.log(name + ' is valid...');
                    }
                    
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Error Message: '+textStatus);
                    alert('HTTP Error: '+errorThrown);
                },
                statusCode: {
                    404: function(){
                        console.log( "page not found" );
                    }
                }
            });
        }
    </script>


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
            <input id="fname" type="text" name="txtFirstname" placeholder="First Name" value="<?php echo $_POST['txtFirstname']; ?>"/>
            <div id="txtFirstnameValid"></div>
            <br>
            <label for="txtLastname">Last Name:</label>
            <input id="lname" type="text" name="txtLastname" placeholder="Last Name" value="<?php echo $_POST['txtLastname']; ?>"/>
            <div id="txtLastnameValid"></div>
            <br>
            <label for="txtPhonenumber">Phone #:</label>
            <input id="phone" type="text" name="txtPhonenumber" placeholder="Phone #:" value="<?php echo $_POST['txtPhonenumber']; ?>"/>
            <div id="txtPhonenumberValid"></div>
            <br>
            <label for="txtUsername">Username:</label>
            <input id="uname" type="text" name="txtUsername" placeholder="Username" value="<?php echo $_POST['txtUsername']; ?>"/>
            <div id="txtUsernameValid"></div>
            <br>
            <label for="txtPassword">Password:</label>
            <input id="pass" type="password" name="txtPassword" placeholder="Password" value="<?php echo $_POST['txtPassword']; ?>"/>
            <div id="txtPasswordValid"></div>
            <br>
            <label for="txtReEnterPass">Re-enter Password:</label>
            <input id="repass" type="password" name="txtReEnterPass" placeholder="Re-enter Password" value="<?php echo $_POST['txtReEnterPass']; ?>"/>
            <div id="txtReEnterPassValid"></div>
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
