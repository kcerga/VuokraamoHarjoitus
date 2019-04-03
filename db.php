<?php
/*
	file:	db.php
	desc:	Luo tietokantayhteyden MySQL-palvelimelle vuokraamokantaan
	date:	19.02.2018
	auth:	Wilma C
*/
$palvelin='localhost';
$tietokanta='autovuokrausliike';
$dbtunnus='root';
$dbsalasana='';

//mysqli-objektilla yhteys
$conn=new mysqli($palvelin,$dbtunnus,$dbsalasana,$tietokanta);
if($conn->connect_error){
	die('Tietokantayhteys ei onnistu.'.$conn->connect_error);
}
//ääkköset käyttöön tietokannan käsittelyssä
mysqli_set_charset($conn,"utf8");
?>