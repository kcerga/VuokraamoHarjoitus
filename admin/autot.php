<?php
/*
        Prints all the cars in the database

*/
session_start(); 
if(!isset($_SESSION['userID'])) header('location:kirjaudu.php');
include('../db.php'); //DB connection

include ('header.php');

$messages = '';
?>
            <div id="line1">
                <h2 style="text-align:center; padding-top:10px;"><b>Vuokraamossa olevat autot</b></h2>
               <a href="admin.php"><button class="napit btn btn-primary">Palaa etusivulle</button></a>
                <a class=" napit btn btn-primary" href="uusiauto.php">Lisää auto</a>
                
            <?php
              if(!empty($_SESSION['deletemessage'])) {

						$messages = $_SESSION['deletemessage'];
						echo '<p class=" alert-success message" style="font-size:20px; margin-bottom:15px; margin-top:15px;"> '.$messages.'</p>';
						}
                
                       unset($_SESSION['deletemessage']);
            ?>
            </div>      

     
		
<!-- Shows all the cars in the database in a table -->
	<div class="keskidivi">
		<table class="table table-hover autotable">
			<tr class="tabletittelit">
				<th>Auto</th><th>Vuosiluku</th><th>Rekisterinumero</th><th>PVM Hinta</th><th>Kuvaus</th><th>Kuva</th>
			</tr>
			<?php
			
			$sql="SELECT autoID,autonimi,reknro, vuosiluku, pvmhinta,kuva, kuvaus FROM auto ORDER BY autoID";
			$tulos=$conn->query($sql);
			while($rivi=$tulos->fetch_assoc()){
				echo '<tr>';
				echo '<td style="display:none;">'.$rivi['autoID'].'</td>';
				echo '<td><b>'.$rivi['autonimi'].'</b></td>';
				echo '<td>'.$rivi['vuosiluku'].'</td>';
                echo '<td>'.$rivi['reknro'].'</td>';
                echo '<td>'.$rivi['pvmhinta'].'€'.'</td>';
				echo '<td>'.$rivi['kuvaus'].'</td>';
				echo '<td><img src="../img/'.$rivi['kuva'].'" class="img-responsive" width="50px" /></td>';
                echo '<td><a href="muokkaauto.php?autoID='.$rivi['autoID'].'"><button class="btn btn-info">Muokkaa</button></a></td>';
				echo '</tr>';
			}
			$conn->close(); //Close db
			?>
		</table>
    </div>	

<?php

include('footer.php');
?>