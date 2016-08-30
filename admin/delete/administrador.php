<?php 
	include("../auth.php");
	include("../config.php");
	$id = $_GET['id'];
	/* query */
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$sql = "UPDATE admin SET activo = false WHERE id = :id";
	$q = $conn->prepare($sql);
	$q->execute(array(
		':id' => $id
	));
	/* query */
	header("Location: ../administradores.php?m=".base64_encode("Eliminado correctamente"));
?>