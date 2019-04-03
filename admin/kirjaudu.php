<?php
/*
	Log-in form for the admin side
    
*/

session_start();
$virheviesti = '';
?>
<!DOCTYPE html>
<html style="height:100%;">
	<head>
		<title>Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/myCss.css">
         <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
	<body>
<div class="kirjauduAdmin">

		<h3 style="padding-top:70px;color:white;">Ylläpitosivu - Kirjaudu</h3><br>
            <?php
            if(!empty($_SESSION['kirjautumisvirhe'])) {
                
                $virheviesti = $_SESSION['kirjautumisvirhe'];
                    echo '<p class=" alert-danger message" style="font-size:20px; width:300px; margin:auto;"> '.$virheviesti.'</p>';
                
                
            }
        ?>
		<form action="login.php" method="post" class="form form-group loggaForm">
			<input type="email" name="email" id="email" class="form-control" placeholder="Email"/>
		<br>
			<input type="password" name="salasana" id="salasana" class="form-control" placeholder="Salasana" />
		<br>
			<input type="submit" class="btn btn-success" style="font-size:25px;margin-top:20px;" value="Kirjaudu" />
		</form>
</div>
        
                <!-- BOOTSTRAP  -->    
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>