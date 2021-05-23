<?php

if (isset ($_POST['submit'])) {
    $file = $_FILES['fileselect[]'];

    $fileName = $_FILES['fileselect[]']['name'];
    $fileTmpName = $_FILES['fileselect[]']['tmp_name'];
    $fileSize = $_FILES['fileselect[]']['size'];
    $fileError = $_FILES['fileselect[]']['error'];
    $fileType = $_FILES['fileselect[]']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png','pdf');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0){
            if ($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: index.html?uploadsuccess");
            }
            else{
                echo "your file is too big!";
            }
        }
        else{
           echo "There was an error uploading your file!";
        }
    }
    else {
    echo "You cannot upload files of this type!";
    }
}

?>