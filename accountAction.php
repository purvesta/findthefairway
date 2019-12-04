<?php
require_once('inc/common.php');
require_once('inc/Validation.php');

if(array_key_exists('a', $_GET) && ($_GET['a'] == 'update')){
    // Do login validation
    $validation = new Validation();

    if(!($validation->validate($_POST['txtFirstname'], 'txtFirstname'))){
        $_SESSION['err'] = 'Invalid First Name entry.';
        header('Location: account.php');
        die();
    }
    if(!($validation->validate($_POST['txtLastname'], 'txtLastname'))){
        $_SESSION['err'] = 'Invalid Last Name entry.';
        header('Location: account.php');
        die();
    }
    if(!($validation->validate($_POST['txtPhonenumber'], 'txtPhonenumber'))){
        $_SESSION['err'] = 'Invalid Phone # entry.';
        header('Location: account.php');
        die();
    }

    if(updateAccount(strtolower($_POST['txtFirstname']), strtolower($_POST['txtLastname']), $_POST['txtPhonenumber'])){
        $_SESSION['err'] = 'Account updated successfully.';
        $_SESSION['fname'] = $_POST['txtFirstname'];
        $_SESSION['lname'] = $_POST['txtLastname'];
        $_SESSION['phone'] = $_POST['txtPhonenumber'];
        header('Location: account.php');
        die();
    }
    else{
        $_SESSION['err'] = 'Account could not be updated.';
        header('Location: account.php');
        die();
    }
}
else{
    header('Location: account.php');
    die();
}


function updateAccount($fname, $lname, $phone){
    $conn = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'bdedb0104703bc', 'fc12bbf3', 'heroku_b23ba24edddfeb3');
    if ($conn->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $conn->connect_error;
    }

    $stmt = $conn->prepare("UPDATE users SET `fname`=?, `lname`=?, `phone`=? WHERE id=?");

    $fname = $conn->real_escape_string($fname);
    $lname = $conn->real_escape_string($lname);
    $phone = $conn->real_escape_string(preg_replace("/\D/", "", $phone));

    $stmt->bind_param('sssd', $fname, $lname, $phone, $_SESSION['id']);

    $stmt->execute();

    if($stmt->affected_rows > 0){
        $stmt->close();
        $conn->close();

        return true;
    }
    else{
        $stmt->close();
        $conn->close();

        return false;
    }
}
