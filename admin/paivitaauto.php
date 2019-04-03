<?php
/*
	Päivittää auton kuvauksen, hinnan yms

*/
$autoID=$_POST['autoID'];
$kuvaus=$_POST['kuvaus'];
$hinta=$_POST['hinta'];
include('../db.php');
$sql="UPDATE auto SET kuvaus='$kuvaus',pvmhinta='$hinta', WHERE autoID=$autoID";
$conn->query($sql);
header("location:muokkaauto.php?autoID=$autoID&paivitys=ok");
?>