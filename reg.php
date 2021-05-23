<?php
 session_start();
 $con = mysqli_connect('localhost','root','');
 mysqli_select_db($con,'register');
 
 $user = $_POST['user'];
 $password= $_POST['password']; 
 $confirmpass= $_POST['confirmpass'];


 $s= "SELECT * from abc where user='$user'";
$result= mysqli_query($con, $s);
$num= mysqli_num_rows($result);
if ($num==1){

	header('location:register.html');

}
else{
	if($_POST["password"]!==$_POST['confirmpass']){
	header('location:register.html');


	}

	else{
	$reg= "INSERT into abc(user,password,confirmpass) values('$user','$password','$confirmpass')";
	mysqli_query($con, $reg);
	header('location:index.html');

}
}


?>

