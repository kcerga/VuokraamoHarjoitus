<?php
/**
*
*   "Form" to confirm reservation and select dates for the reservation
*
*/



include('header.php');
include('db.php');

$autoID = $_GET['autoID'];
$asiakasID = $_GET['asiakasID'];
$sql = "SELECT * FROM auto WHERE autoID = $autoID;";


$res=$conn->query($sql);
if($res->num_rows > 0){
	//Prints car info
	$rivi=$res->fetch_assoc();
    
}

?>      
        <!--- jQuery & JS for the datepicker calendar -->
        <script language="JavaScript">
                   var $jq = jQuery.noConflict();
                        $jq(document).ready(function() {
                        
                             $jq('input[name="dates"]').daterangepicker();
                        });
            
                    function confirm() {
                        alert("Haluatko varmasti vahvistaa tilauksen?");
                    }
         </script>

    <div id="line1">
                    <h2 style="text-align:center; padding-top:10px;"><b>Vuokraa auto <?php echo $rivi['autonimi']?></b></h2>
                   <a href="index.php"><button class="napit btn btn-primary">Palaa etusivulle</button></a>
                    <a href="autot.php"><button class="napit btn btn-primary">Kaikki autot</button></a>
    </div>
 <div class="autontiedot2">
        <?php
            echo '<p><img src="img/'.$rivi['kuva'].'"class="img-responsive" width="350px"></p>';
            echo '<p><b>Vuosimalli: </b>'.$rivi['vuosiluku'].'<br>';
            echo '<b>Vuokraushinta/pvm: </b>'.$rivi['pvmhinta'].'<br>';
            echo $rivi['kuvaus'].'</p>';
        ?>
</div>
<div class="vuokrausformi">
         <form class="form form-group" action="talletavuokraus.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="autoID" value="<?php echo $autoID; ?>">
                <input type="hidden" name="asiakasID" value="<?php echo $asiakasID; ?>">
                <input type="hidden" name="pvmhinta" value="<?php echo $rivi['pvmhinta']; ?>">
             <label for="dates">Valitse aloitus- ja päättymispvm: </label><br>
                <input type="text" name="dates" id="dates" required /><br>
             <label for="extrainfo">Lisätietoa: </label><br>
                <input type="text" name="extrainfo" id="extrainfo" /><br>
            <button type="submit" onclick="confirm()" class="btn btn-success" style="font-size:20px;">Vuokraa auto</button> 
        </form>
 </div>
            

<?php

include('footer.php')

?>
