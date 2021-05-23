<?php
$category = $_POST['category'];
$adtitle = $_POST['adtitle'];
$addes = $_POST['addes'];
$name = $_POST['name'];
$mobile = $_POST['phone'];
$email = $_POST['email'];
if (!empty($category) || !empty($adtitle) || !empty($addes)  || !empty($name) || !empty($mobile) || !empty($email)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "register";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From ad Where email = ? Limit 1";
     $INSERT = "INSERT Into ad (category, adtitle, addes,name, phone) values(?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssis", $category, $adtitle, $addes,$name, $phone, $email);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>