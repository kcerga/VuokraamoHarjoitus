<?php
/**
*   The form to add  a new car into the DB and webpage. Sends information forward to 'talletaauto.php'
*
*/


//Jos ei ole kirjauduttu sisään
session_start(); 
if(!isset($_SESSION['userID'])) header('location:kirjaudu.php');
date_default_timezone_set('Europe/Helsinki');



include ('header.php');
?>
            <div id="line1" style=" margin-top:15px;">
                <h3 id="admintitteli"><b>Lisää uusi auto</b></h3>
               <a href="admin.php"><button class="napit btn btn-primary">Palaa etusivulle</button></a> 
                <a href="autot.php"><button class="napit btn btn-primary">Kaikki autot</button></a>
            <?php	
                
                 //In case there is an error or success msg while trying to save the car
                            
                if(!empty($_SESSION['imgMsg'])) {

						$imgMsg = $_SESSION['imgMsg'];
						echo '<p class=" alert-info message" style="font-size:20px;  margin-top:15px;"> '.$imgMsg.'</p>';
						}
                
                       unset($_SESSION['imgMsg']);
                ?>
            </div>    
            <div class="lomakedivi">
            <form class="form form-group autoformi" action="talletaauto.php" method="post" enctype="multipart/form-data">
                    
           
                <!--Form to add a new car into DB -->
                <label  for="autonimi"  class="otsikot">Auton merkki ja malli:</label><br>
                    <input type="text" class="form-control" name="autonimi" id="autonimi" placeholder="Merkki ja malli" required><br>
                <label  for="autonimi" class="otsikot">Vuosiluku:</label><br>
                    <input type="number" class="form-control" name="vuosi" id="vuosi" placeholder="Vuosiluku" required><br>
                <label  for="reknro"  class="otsikot">Rekisterinumero:</label><br>
                    <input type="text" class="form-control" name="reknro" id="reknro" placeholder="Rekisterinumero" required><br>
                <label  for="kuvaus"  class="otsikot">Kuvaus:</label><br>
                    <textarea name="kuvaus" class="form-control" cols="20" placeholder="Kuvaus autosta" required></textarea><br>
                <label  for="hinta"  class="otsikot">Vuokraushinta (per pvm):</label><br>
                    <input type="number" class="form-control" name="hinta" step="0.01" value="00.00" placeholder="00.00" required><br>
                <label  for="kuva"  class="otsikot">Valitse kuvatiedosto:</label><br>
                    <input type="file" name="kuva" id="kuva"><br>
                

              <br>
              <button type="submit" class="btn btn-success" style="font-size:20px;">Talleta tiedot</button> 
            </form>
            </div>

<?php
include ('footer.php');
?>