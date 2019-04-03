<?php

/**

Saves customer into the database

Page is missing if submit is set or not, for some reason it kept failing :(

**/



include('db.php');
$viesti = '';
$enimi = $_POST['enimi'];
$snimi = $_POST['snimi'];
$katuosoite = $_POST['katuosoite'];
$postinro = $_POST['postinro'];
$postitmpk = $_POST['postitmpk'];
$puhnro = $_POST['puhnro'];

$autoID = $_POST['autoID'];
$email = $_POST['email'];


//This was supposed to check if there is already a similar person in the db, however I could not make it function

/*** $ifemail = "SELECT email, enimi, snimi, asiakasID FROM asiakas WHERE email = '$email' AND WHERE enimi = '$enimi' AND WHERE snimi = '$snimi';";
$tulos = $conn->query($ifemail);
if($tulos->num_rows > 0){
    $row = $tulos->fetch_object();
    $asiakasID = $row['asiakasID'];
    $conn->close();
    header('location:vuokraaauto.php?autoID='.$autoID.'&asiakasID='.$asiakasID,'');
}
else { ****/



$sql = "INSERT INTO asiakas (enimi, snimi, katuosoite, postitmpk, postinro, puhnro, email) VALUES ('$enimi', '$snimi', '$katuosoite', '$postitmpk', '$postinro', '$puhnro', '$email')";
$conn->query($sql);


//Gets customer ID
$asiakasID=mysqli_insert_id($conn);


header('location:vuokraaauto.php?autoID='.$autoID.'&asiakasID='.$asiakasID.'');
$conn->close();

?>