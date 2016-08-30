<?php 
	session_start();
	session_destroy();
	header("Location: index.php?m=".base64_encode("Has cerrado la sesión"));
?>