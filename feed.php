<?php
 session_start();
 $con = mysqli_connect('localhost','root','');
 mysqli_select_db($con,'register');
 $fname= $_POST['fname'];
 $lname= $_POST['lname'];
 $email= $_POST['email'];
 $phone=$_POST['phone'];
 $type= $_POST['type'];

 $s= "SELECT * from feedback where fname='$fname' and lname='$lname'";

 $y="INSERT into feedback(fname,lname,email,phone,type) values('$fname','$lname','$email','$phone','$type' )";
 mysqli_query($con, $y);

echo "<script type='text/javascript'>alert('feedback sent successfully!')</script>"
?>
<meta http-equiv="refresh" content="0;URL=index.html" />