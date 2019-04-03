<?php
/*
		Edit car information or delete
	
*/
include('header.php');
session_start(); 
//Checks if user is logged in
if(!isset($_SESSION['userID'])) header('location:kirjaudu.php');


include('../db.php');
$autoID=$_GET['autoID'];
$sql="SELECT * FROM auto WHERE autoID=$autoID";
$tulos=$conn->query($sql);
if($tulos->num_rows > 0){
	//Prints car info
	$rivi=$tulos->fetch_assoc();
$imgMsg = '';
?>

<div id=line1>
<!-- Form to edit car information -->
    <h3 class="form-signin-heading" id="admintitteli" style="margin-top:20px; margin-bottom:20px;">Päivitä auton tiedot</h3>
                   <a href="admin.php"><button class="napit btn btn-primary">Palaa etusivulle</button></a> 
                <a href="autot.php"><button class="napit btn btn-primary">Kaikki autot</button></a>
<?php  
    if(isset($_GET['paivitys'])) {
        echo '<p style="margin:auto; width:500px;margin-top:20px;font-size:20px;text-align:center;" class="alert alert-success message">Päivitys onnistui!</p>';}
?>
</div>
    <?php
      echo'<p class="autontiedot">'.'<b>Auto:</b> '.$rivi['autonimi'].'</p>';
       echo'<p class="autontiedot">'.'<b>Vuosiluku:</b> '.$rivi['vuosiluku'].'</p>'; 
        echo'<p class="autontiedot">'.'<b>Rekisterinumero:</b> '.$rivi['reknro'].'</p>';
    ?>
<form class="form-signin" action="paivitaauto.php" method="post">
	   <?php	
            if(!empty($_SESSION['imgMsg'])) {
						$imgMsg = $_SESSION['imgMsg'];
						echo '<p class=" alert alert-danger message"> '.$imgMsg.'</p>';
						} ?>
    
	<input type="hidden" name="autoID" value="<?php echo $autoID?>" >
  <div class="form-group">
      <label  for="kuvaus" style="font-size:20px;"><b>Kuvaus:</b></label><br>
    <textarea class="form-control" name="kuvaus" cols="20" placeholder="Kuvaus" required><?php echo $rivi['kuvaus']?></textarea>
  </div>
  <div class="form-group">
      <label  for="hinta" style="font-size:20px;"><b>Vuokraushinta:</b></label><br>
    <input type="number" class="form-control" name="hinta" step="0.01" value="<?php echo $rivi['pvmhinta']?>"  required>
  </div><br>
  <button type="submit" class="btn btn-lg btn-info">Päivitä tiedot</button>
</form>

<!-- Form to change the image -->
<form class="form-signin" action="paivitakuva.php" method="post" enctype="multipart/form-data">
	<h2 class="form-signin-heading">Päivitä kuva</h2>
	<img src="../img/<?php echo $rivi['kuva']?>" class="img-responsive" width="250px" >
	<input type="hidden" name="autoID" value="<?php echo $autoID?>" >
  <div class="form-group"><br>
      <label  for="kuva" style="font-size:20px;"><b>Valitse kuvatiedosto:</b></label><br>
    <input type="file" class="form-control" name="kuva" id="kuva" >
  </div><br>
  <button type="submit" class="btn btn-lg btn-info">Päivitä kuva</button>
</form>
<?php
}else echo '<p>Autoa ei löydy</p>';

//Deletes car from DB
echo '<a style="color:white; text-decoration:none;" href="poistaauto.php?autoID='.$autoID.'"><button class="btn btn-lg btn-danger">Poista auto</buton></a>';
?>




<?php
include('footer.php');
?>