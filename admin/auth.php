<?php 
	session_start();
	if($_SESSION['auth']!=true){
		header("Location: index.php?m=".base64_encode("Necesitas iniciar sesión para acceder a este recurso"));
	}
	include("config.php");
?>