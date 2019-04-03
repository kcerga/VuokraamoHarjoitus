<?php
/*
	Saves a new car to database and saves the img into image folder.
    Receives info from uusiauto.php

*/

//Setting variables to the information received from the form
$auto=$_POST['autonimi'];
$reknro=$_POST['reknro'];
$vuosi=$_POST['vuosi'];
$kuvaus=$_POST['kuvaus'];
$hinta=$_POST['hinta'];

$kuva=basename($_FILES["kuva"]["name"]);
//Saving an image
    $target_dir = "../img/"; //Location where it will be saved
    $target_file = $target_dir . basename($_FILES["kuva"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
session_start();
    $_SESSION['imgMsg'] = '';
    // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["kuva"]["tmp_name"]);
        if($check !== false) {
            header('location:uusiauto.php');
            $uploadOk = 1;
        } 
        else {
            header('location:uusiauto.php');
                $_SESSION['imgMsg'] = 'Tarkista kuvatiedosto!';
            $uploadOk = 0;
        }
    }
    // Check file size
    if ($_FILES["kuva"]["size"] > 500000) {
        header('location:uusiauto.php');
                $_SESSION['imgMsg'] = 'Kuvatiedosto on liian suuri!';
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        header('location:uusiauto.php');
                $_SESSION['imgMsg'] = 'Kuvatiedoston tulee olla JPG, JPEG, PNG tai GIF muodossa';
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	header('location:uusiauto.php');
			$_SESSION['imgMsg'] = 'Tiedoston lataus epäonnistui';
    
// if everything is ok, tries to upload file
} 
else {
    if (move_uploaded_file($_FILES["kuva"]["tmp_name"], $target_file)) {	
	
			
		//Saves car info to database
		include('../db.php');
		$sql="INSERT INTO auto(autonimi,reknro,vuosiluku,kuvaus,kuva, pvmhinta) 
			  VALUES('$auto','$reknro', '$vuosi', '$kuvaus','$kuva',$hinta)";
		$conn->query($sql);
		header('location:uusiauto.php');
        $_SESSION['imgMsg'] = 'Uusi auto lisätty onnistuneesti!';
    } else {
        	header('location:uusiauto.php');
			$_SESSION['imgMsg'] = 'Jokin meni pieleen!';
    }
}
?>