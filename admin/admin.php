<?php //Jos ei ole kirjauduttu sisään
session_start(); 
if(!isset($_SESSION['userID'])) header('location:kirjaudu.php');
date_default_timezone_set('Europe/Helsinki');

include('header.php');
?>


             <div id="line2">
                <h3 id="admintitteli">Tervetuloa Admin-puolelle</h3><br>
                     <a href="uusiauto.php"><input type="button" id="add_car" class="napit2 btn btn-primary" value="Lisää uusi auto"/></a>
                <a href="autot.php"><input type="button" id="edit_car" class="napit2 btn btn-primary" value="Muokkaa autojen tietoja"/></a>
                                 <a href="varaukset.php"><input type="button" id="reservations" class="napit2 btn btn-primary" value="Varaukset"/></a>
            </div>   

<?php
    include('footer.php');
 ?>