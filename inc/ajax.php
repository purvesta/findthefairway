<?php

require_once('Validation.php');


if(array_key_exists('value', $_POST) && array_key_exists('name', $_POST)) {

    $value = $_POST['value'];
    $name = $_POST['name'];
    $validation = new validation();

    if ($validation->validate($value, $name)) {
        echo json_encode($value);
    } else {
        echo json_encode('invalid');
    }
}