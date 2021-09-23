<?php

$username = $_POST['username'];
$firstname = $_POST['first name'];
$lastname = $_POST['last name'];
$email = $_POST['email'];
$password = $_POST['password'];


require_once 'dbh.inc.php';

if(emptyInputSIignup() !==false) {
    echo "you missed name";
}