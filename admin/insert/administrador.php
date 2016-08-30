<?php 
	include("../auth.php");
	include("../config.php");
	
	$correo = $_POST['correo'];
	$contrasena = md5($_POST['contrasena']);
	/* query */
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$sql = "INSERT INTO admin (correo,contrasena,activo) VALUES (:correo,:contrasena,1)";
	$q = $conn->prepare($sql);
	$q->execute(array(
		':correo' => $correo,
		':contrasena' => $contrasena
	));
	/* query */
	header("Location: ../administradores.php?m=".base64_encode("Acción realizada correctamente"));
?>