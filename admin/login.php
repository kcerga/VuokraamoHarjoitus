<?php
/*

desc: Tarkistaa kirjautumisen tietokannasta, lisää kirjautumistiedot session-muuttujille. Salasanaa ei ole kryptattu tässä versiossa
date: 19.02.2019
auth: Wilma C
*/
if(!empty($_POST)){
    session_start();
    $_SESSION['kirjautumisvirhe'] = '';
	//Tulee lomakkeelta
	$email = $_POST['email'];
	$salasana = $_POST['salasana'];
	include('../db.php'); 
	$sql="SELECT userID, email, salasana FROM user WHERE email='$email'";
	$tulos=$conn->query($sql);
	if($tulos->num_rows > 0){
		//Found email
		$rivi=$tulos->fetch_assoc();
		if($salasana == $rivi['salasana']){
			//Log in ok

			$_SESSION['userID']=$rivi['userID'];
			$_SESSION['nimi']=$rivi['etunimi'].' '.$rivi['sukunimi'];
			$_SESSION['aika']=date('H:i:s');
			header('location:admin.php');
		}else { $_SESSION['kirjautumisvirhe'] = "Virheellinen salasana";
                header('location:kirjaudu.php?virhe=salasana');
              }
        
	}else { $_SESSION['kirjautumisvirhe'] = 'Virheellinen email'; 
            header('location:kirjaudu.php?virhe=email');
          }
    //Jos joku yrittää tulla sivulle (ei lomakkeen kautta)
}else header('location:kirjaudu.php?virhe=kirjaudu');
?>