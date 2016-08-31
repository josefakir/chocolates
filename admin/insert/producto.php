<?php 
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
	include("../auth.php");

	$id_categoria = $_POST['categoria'];
	$nombre = $_POST['nombre'];
	$slug = $_POST['slug'];
	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];
	/* file upload */
	$target_path = "../../productos/";
	$nombrefoto = date('Y-m-d-H-i-s')."_".$slug."_".basename( $_FILES['foto']['name']);
	$target_path = $target_path . $nombrefoto; 
	$httpimg = str_replace("../../",BASEPATH,$target_path);
	move_uploaded_file($_FILES['foto']['tmp_name'], $target_path);
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$sql = "INSERT INTO productos (id_categoria,nombre,slug,descripcion,precio,imagen,activo) VALUES (:id_categoria,:nombre,:slug,:descripcion,:precio,:imagen,1)";
	$q = $conn->prepare($sql);
	$q->execute(array(
		':id_categoria' => $id_categoria,
		':nombre' => $nombre,
		':slug' => $slug,
		':descripcion' => $descripcion,
		':precio' => $precio,
		':imagen' => $httpimg
	));
	/* query */
	header("Location: ../productos.php?m=".base64_encode("Acción realizada correctamente"));
?>