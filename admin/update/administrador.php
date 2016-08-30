<?php 
	include("../auth.php");
	include("../config.php");
	$id = $_POST['id'];
	$correo = $_POST['correo'];
	/* query */
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$sql = "UPDATE admin SET correo = :correo WHERE id = :id";
	$q = $conn->prepare($sql);
	$q->execute(array(
		':correo' => $correo,
		':id' => $id
	));
	/* query */
	header("Location: ../administradores.php?m=".base64_encode("Acción realizada correctamente"));
?>