<?php

session_start();
session_destroy();
setcookie('e_mail', '', -1);

if(isset($_COOKIE['e_mail'])) {
	header ('Location: accueil.php');
}

?>