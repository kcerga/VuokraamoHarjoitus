<?php

/****

    Shows all the rental car reservations in a table

***/

include('header.php');
session_start(); 
if(!isset($_SESSION['userID'])) header('location:kirjaudu.php');
include('../db.php');

//SQL query to find the information needed
$sql = "SELECT concat(autonimi,' ',reknro) as auto, asiakas.asiakasID,concat(enimi,' ',snimi) as nimi, varauspvm, aloituspvm, paattymispvm, hinta, varausID
		FROM asiakas
		INNER JOIN varaus
		ON asiakas.asiakasID=varaus.asiakasID
		INNER JOIN auto
		ON auto.autoID=varaus.autoID
        GROUP BY varaus.varausID
		ORDER BY varaus.varauspvm DESC;";
$tulos=$conn->query($sql);
?>
            <div id="line1">
                <h2 style="text-align:center; padding-top:10px;"><b>Autovaraukset</b></h2>
               <a href="admin.php"><button class="napit btn btn-primary">Palaa etusivulle</button></a>
                <a class=" napit btn btn-primary" href="autot.php">Vuokraamon autot</a>
            </div>

<!-- Table to show the information -->
<?php
echo '<table class="table table-hover varaustable">';
echo '<tr><th>ID</th><th>Tilattu</th><th>Auto</th><th>Asiakas</th><th>Aloituspvm</th><th>Päättymispvm</th><th>Hinta</th></tr>';
while($rivi=$tulos->fetch_assoc()){
	echo '<tr>';
	echo '<td>'.$rivi['varausID'].'</td>';
	echo '<td>'.$rivi['varauspvm'].'</td>';
	echo '<td>'.$rivi['auto'].'</td>';
	echo '<td>'.$rivi['nimi'].'</td>';
	echo '<td>'.$rivi['aloituspvm'].'</td>';
	echo '<td>'.$rivi['paattymispvm'].'</td>';
    echo '<td>'.$rivi['hinta'].'</td>';
	echo '</tr>';
}
echo '</table>';
$conn->close();
?>
<?php
include('footer.php');
?>