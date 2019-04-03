<?php
/*
Hävittää session-tiedot, ohjaa julkiselle sivulle

*/
session_start();
session_destroy();
header('location:../index.php');
?>