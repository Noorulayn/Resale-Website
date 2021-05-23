<?php


session_start();

$con = mysqli_connect('localhost', 'root','');

mysqli_select_db($con, 'register');

$category = false;
if(isset($_POST['category'])){
    $category = $_POST['category'];
}
$adtitle= false;
if(isset($_POST['adtitle'])){
    $adtitle = $_POST['adtitle'];
}
$addiscription = false;
if(isset($_POST['addiscription'])){
    $addiscription = $_POST['addiscription'];
}
$name = $_POST['name'];
$mobileno = $_POST['mobileno'];
$email = $_POST['email'];

$s = "SELECT * from postad where name = '$name'";

$ad = "INSERT into postad(category,adtitle,addiscription,name,mobileno,email) values('$category','$adtitle','$addiscription','$name','$mobileno','$email')";
mysqli_query($con, $ad);

echo "<script type='text/javascript'>alert('Sent for approval successfully!')</script>"
?>
<meta http-equiv="refresh" content="0;URL=index.html" />