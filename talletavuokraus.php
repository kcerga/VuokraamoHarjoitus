<?php
/*

VARAUKSEN TALLENNUS

Vuokrauksen kokonaishinnan laskenta ei toimi!!! Joten hinta tallentuu vain pvm-maksuna

*/


    
//Setting variables to the information received from the form
$autoID=$_POST['autoID'];
$dates = $_POST['dates'];
$asiakasID = $_POST['asiakasID'];
$lisatieto = $_POST['extrainfo'];
$pvmhinta = $_POST['pvmhinta'];

//Split received date into 2 variables
list($date1, $date2) = explode("-", $dates, 2);
    
    
// Function to find the difference  
// between two dates. 
/***function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date2) - strtotime($date1); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
    return abs($diff / 86400)); 
} 

$dateDiff = dateDiffInDays($date1, $date2); *****/

$vuokraushinta = $pvmhinta; 
include('db.php');
    
//ID AND TIMESTAMP ARE AUTOMATIC
$sql = "INSERT INTO varaus (autoID, asiakasID, aloituspvm, paattymispvm,lisatietoa, hinta) VALUES ('$autoID', '$asiakasID', '$date1', '$date2', '$lisatieto', '$vuokraushinta');";
if($conn->query($sql) == TRUE) {
        //Gets reservation ID
        $varausID=mysqli_insert_id($conn);
        header('location:kiitosvarauksesta.php?varaus=ok&varausID='.$varausID.'');
    }
else {
   header('location:kiitosvarauksesta.php?varaus=virhe');

}
    

?>