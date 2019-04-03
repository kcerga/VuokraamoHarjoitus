<?php

include('header.php');
include('db.php');
?>



    <div id="line3">
                    <h2 style="text-align:center; padding-top:10px;"><b>Vuokraamossa olevat autot</b></h2>
                   <a href="index.php"><button class="napit btn btn-primary">Palaa etusivulle</button></a>

    </div>
    <div class="autokeski" >
        <?php
			//Finds the car(s) from db, and prints them all 
			$sql="SELECT autoID,autonimi,reknro, vuosiluku, pvmhinta,kuva, kuvaus FROM auto ORDER BY autoID";
			$tulos=$conn->query($sql);
			while($rivi=$tulos->fetch_assoc()){
				echo '<div class="autondivi">';
                    echo '<h3><b>'.$rivi['autonimi'].'</b></h3><br>';
                    echo '<a href="asiakaslomake.php?autoID='.$rivi['autoID'].'"><button style="font-size:20px; margin-bottom:10px; margin-top:-10px;" class="btn btn-success">Vuokraa auto</button></a>';
                    echo '<p><img src="img/'.$rivi['kuva'].'" class="img-responsive" width="250px"></p>';
                        echo '<p class="tekstit"><b>Vuosimalli: </b>'.$rivi['vuosiluku'].'<br>';
                        echo '<b>Vuorokausihinta: </b>'.$rivi['pvmhinta'].'€'.'<br>';
                        echo $rivi['kuvaus'].'</p>';

				echo '</div>';
			}
			$conn->close(); //Close db
        ?>
    </div>



<?php

include('footer.php');
?>