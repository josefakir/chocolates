<?php 
	include("../auth.php");
	
	$nombre = $_POST['nombre'];
	$slug = $_POST['slug'];
	/* query */
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$sql = "INSERT INTO categorias (nombre,slug,activo) VALUES (:nombre,:slug,1)";
	$q = $conn->prepare($sql);
	$q->execute(array(
		':nombre' => $nombre,
		':slug' => $slug
	));
	/* query */
	header("Location: ../categorias.php?m=".base64_encode("Acción realizada correctamente"));
?>