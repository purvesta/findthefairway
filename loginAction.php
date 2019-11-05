<?php
require_once('inc/common.php');
require_once('inc/Validation.php');


if(array_key_exists('a', $_GET) && ($_GET['a'] == 'login')){
    // Do login validation
    $validation = new Validation();

    if(!($validation->validate($_POST['txtLUsername'], 'username'))){
        $_SESSION['err'] = 'Invalid First Name entry.';
        header('Location: login.php');
    }
    if(!($validation->validate($_POST['txtLPassword'], 'password'))){
        $_SESSION['err'] = 'Invalid Last Name entry.';
        header('Location: login.php');
    }

    if(authenticate($_POST['txtLUsername'], $_POST['txtLPassword'])){
        header('Location: index.php');
    }
    else{
        $_SESSION['err'] = 'Username or Password is incorrect.';
        header('Location: login.php');
    }

}
else if(array_key_exists('a', $_GET) && ($_GET['a'] == 'register')){
    // Do register validation
    $validation = new Validation();

    if(!($validation->validate($_POST['txtFirstname'], 'firstName'))){
        $_SESSION['err'] = 'Invalid First Name entry.';
        header('Location: login.php');
        die();
    }
    if(!($validation->validate($_POST['txtLastname'], 'lastName'))){
        $_SESSION['err'] = 'Invalid Last Name entry.';
        header('Location: login.php');
        die();
    }
    if(!($validation->validate($_POST['txtPhonenumber'], 'phone'))){
        $_SESSION['err'] = 'Invalid Phone # entry.';
        header('Location: login.php');
        die();
    }
    if(!($validation->validate($_POST['txtUsername'], 'username'))){
        $_SESSION['err'] = 'Invalid Username entry.';
        header('Location: login.php');
        die();
    }
    if(!($validation->validate($_POST['txtPassword'], 'password'))){
        $_SESSION['err'] = 'Invalid Password entry.';
        header('Location: login.php');
        die();
    }
    if(!($validation->validate($_POST['txtReEnterPass'], 'password'))){
        $_SESSION['err'] = 'Invalid Re-enter Password entry.';
        header('Location: login.php');
        die();
    }
    if($_POST['txtPassword'] != $_POST['txtReEnterPass']){
        $_SESSION['err'] = 'Passwords did not match.';
        header('Location: login.php');
        die();
    }

    createAccount(
        strtolower($_POST['txtFirstname']),
        strtolower($_POST['txtLastname']),
        $_POST['txtPhonenumber'],
        $_POST['txtUsername'],
        $_POST['txtPassword']
    );

    if(authenticate($_POST['txtUsername'], $_POST['txtPassword'])){
        header('Location: index.php');
        die();
    }
    else{
        $_SESSION['err'] = 'Account creation failed.';
        header('Location: login.php');
        die();
    }

}
elseif(array_key_exists('a', $_GET) && ($_GET['a'] == 'logout')){
    $_SESSION['loggedIn'] = false;
    header('Location: index.php');
    die();
}
else{
    header('Location: login.php');
    die();
}


function createAccount($fname, $lname, $phone, $uname, $pass){
    $conn = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'bdedb0104703bc', 'fc12bbf3', 'heroku_b23ba24edddfeb3');
    if ($conn->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conn->connect_error;
    }

    $stmt = $conn->prepare("INSERT INTO users (`fname`, `lname`, `phone`, `uname`, `pass`) VALUES (?, ?, ?, ?, ?)");

    $fname = $conn->real_escape_string($fname);
    $lname = $conn->real_escape_string($lname);
    $phone = $conn->real_escape_string(preg_replace("/\D/", "", $phone));
    $uname = $conn->real_escape_string($uname);
    $hash_pass = md5($pass);

    $stmt->bind_param('sssss', $fname, $lname, $phone, $uname, $hash_pass);

    $stmt->execute();
    $stmt->close();
    $conn->close();

}


function authenticate($uname, $pass){
    $conn = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'bdedb0104703bc', 'fc12bbf3', 'heroku_b23ba24edddfeb3');
    if ($conn->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conn->connect_error;
    }

    $stmt = $conn->prepare('SELECT * FROM users WHERE uname=? AND pass=?');

    $uname = $conn->real_escape_string($uname);
    $hash_pass = md5($pass);

    $stmt->bind_param('ss', $uname, $hash_pass);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['loggedIn'] = true;

        $assoc = $result->fetch_assoc();

        $id = $assoc['id'];
        $fname = ucfirst($assoc['fname']);
        $lname = ucfirst($assoc['lname']);
        $phone = $assoc['phone'];

        $_SESSION['id'] = $id;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['phone'] = $phone;

        $stmt->close();
        $conn->close();

        return true;

    } else {
        $stmt->close();
        $conn->close();

        return false;
    }
}