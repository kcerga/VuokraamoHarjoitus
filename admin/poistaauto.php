
<?php

//Poistaa auton tietokannasta

//Ei poista auton kuvaa kansiosta!!! Joten tämä voi aiheuttaa ongelmia


include('../db.php');
session_start();
$_SESSION['deletemessage'] = '';

$autoID=$_GET['autoID'];
$sql="DELETE FROM auto WHERE autoID=$autoID";
$conn->query($sql);

$_SESSION['deletemessage'] = 'Auto poistettu onnistuneesti';
header("location:autot.php?poisto=ok");


 
?> 

