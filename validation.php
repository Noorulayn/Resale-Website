<?php

session_start();


$con= mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'register');

$user = $_POST['user'];
$password = $_POST['password'];

$s = "SELECT * from abc where user = '$user' && password = '$password'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if ($num == 1) {
$_SESSION['username'] = $user;
header('location:index.html');

}else{
header('location:login.html');

}



?> 