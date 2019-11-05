<?php
require_once('inc/Validation.php');
require_once('inc/common.php');

if(array_key_exists('a', $_GET) && ($_GET['a'] == 'login')){
    // Do login validation
    $validation = new Validation();

    if(!($validation->validate($_POST['txtLUsername'], 'username'))){
        header('Location: login.php');
    }
    if(!($validation->validate($_POST['txtLPassword'], 'password'))){
        header('Location: login.php');
    }

    if(authenticate($_POST['txtLUsername'], $_POST['txtLPassword'])){
        header('Location: index.php');
    }
    else{
        header('Location: login.php');
    }

}
else if(array_key_exists('a', $_GET) && ($_GET['a'] == 'register')){
    // Do register validation
    $validation = new Validation();

    if(!($validation->validate($_POST['txtFirstname'], 'firstName'))){
        header('Location: login.php');
    }
    if(!($validation->validate($_POST['txtLastname'], 'lastName'))){
        header('Location: login.php');
    }
    if(!($validation->validate($_POST['txtPhonenumber'], 'phone'))){
        header('Location: login.php');
    }
    if(!($validation->validate($_POST['txtUsername'], 'username'))){
        header('Location: login.php');
    }
    if(!($validation->validate($_POST['txtPassword'], 'password'))){
        header('Location: login.php');
    }
    if(!($validation->validate($_POST['txtReEnterPass'], 'password'))){
        header('Location: login.php');
    }
    if($_POST['txtPassword'] != $_POST['txtReEnterPass']){
        header('Location: login.php');
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
    }
    else{
        header('Location: login.php');
    }

}
else if(array_key_exists('a', $_GET) && ($_GET['a'] == 'logout')){
    $_SESSION['loggedIn'] = false;
    header('Location: index.php');
}
else{
    header('Location: login.php');
}


function createAccount($fname, $lname, $phone, $uname, $pass){
    $conn = new mysqli('localhost', 'root', 'root', 'ftf');
    if ($conn->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conn->connect_error;
    }

    $stmt = $conn->prepare("INSERT INTO users (`fname`, `lname`, `phone`, `uname`, `pass`) VALUES (?, ?, ?, ?, ?)");

    $fname = $conn->real_escape_string($fname);
    $lname = $conn->real_escape_string($lname);
    $phone = $conn->real_escape_string($phone);
    $uname = $conn->real_escape_string($uname);
    $hash_pass = md5($pass);

//die();
    $stmt->bind_param('sssss', $fname, $lname, $phone, $uname, $hash_pass);

    $stmt->execute();
    $stmt->close();
    $conn->close();

}


function authenticate($uname, $pass){
    $conn = new mysqli('localhost', 'root', 'root', 'ftf');
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

        $fname = ucfirst($assoc['fname']);
        $lname = ucfirst($assoc['lname']);
        $phone = $assoc['phone'];

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