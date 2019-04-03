<?php

include('header.php');
include('db.php');

$viesti = $_GET['varaus'];
$varausID = $_GET['varausID'];

?>
<?php

 if($viesti = 'ok') {
    $notice = 'Varaus onnistui!';
    //SQL query to find the information needed
$sql = "SELECT concat(autonimi,' ',reknro) as auto, asiakas.asiakasID,concat(enimi,' ',snimi) as nimi, varauspvm, aloituspvm, paattymispvm, hinta, varausID
		FROM asiakas
		INNER JOIN varaus
		ON asiakas.asiakasID=varaus.asiakasID
		INNER JOIN auto
		ON auto.autoID=varaus.autoID
        WHERE varaus.varausID = '$varausID'
        GROUP BY varaus.varausID
		ORDER BY varaus.varauspvm DESC;";
$tulos=$conn->query($sql);

if($rivi=$tulos->fetch_assoc()){
    echo '<p class=" alert-success message" style="font-size:20px;  margin-top:15px;"> '.$notice.'</p>';
	echo '<div>';
        echo '<p><h3>Tässä varauksesi tiedot: </h3></p>';
        echo '<p><b>Varauksen ID: </b>'.$rivi['varausID'].'<br>';
        echo '<b>Varauspäivämäärä: </b>'.$rivi['varauspvm'].'<br>';
        echo '<b>Auto: </b>'.$rivi['auto'].'<br>';
        echo '<b>Asiakas: </b>'.$rivi['nimi'].'<br>';
        echo '<b>Vuokrauksen aloitus: </b>'.$rivi['aloituspvm'].'<br>';
        echo '<b>Vuokrauksen päättyminen: </b>'.$rivi['paattymispvm'].'<br>';
        echo '<b>Kokonaishinta: </b>'.$rivi['hinta'].'€</p>';
	echo '</div>';
}

}
else if($viesti='virhe') {
    $notice = "Varauksen vahvistaminen ei onnistunut!";
    echo '<p class=" alert-danger message" style="font-size:20px;  margin-top:15px;"> '.$notice.'</p>';
}



?>
<?php

include('footer.php');

?>