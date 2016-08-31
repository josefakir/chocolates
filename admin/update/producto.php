<?php 
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');
	include("../auth.php");
	$id = $_POST['id_producto'];
	$id_categoria = $_POST['categoria'];
	$nombre = $_POST['nombre'];
	$slug = $_POST['slug'];
	$descripcion = $_POST['descripcion'];
	$precio = $_POST['precio'];
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	if($_FILES['foto']['size'] == 0){
		//echo "ba";
		//está vacio el archivo
		$sql = "UPDATE productos set id_categoria=  :id_categoria, nombre = :nombre, slug = :slug, descripcion = :descripcion, precio =:precio WHERE id = :id";
		$q = $conn->prepare($sql);
		$q->execute(array(
			':id_categoria' => $id_categoria,
			':nombre' => $nombre,
			':slug' => $slug,
			':descripcion' => $descripcion,
			':precio' => $precio,
			':id' => $id
		));
	}else{

		/* file upload */
		$target_path = "../../productos/";
		$nombrefoto = date('Y-m-d-H-i-s')."_".$slug."_".basename( $_FILES['foto']['name']);
		$target_path = $target_path . $nombrefoto; 
		$httpimg = str_replace("../../",BASEPATH,$target_path);
		move_uploaded_file($_FILES['foto']['tmp_name'], $target_path);
		$sql = "UPDATE productos set id_categoria= :id_categoria, nombre = :nombre, slug = :slug,descripcion =:descripcion,precio =:precio, imagen = :imagen WHERE id = :id";
		$q = $conn->prepare($sql);
		$q->execute(array(
			':id_categoria' => $id_categoria,
			':nombre' => $nombre,
			':slug' => $slug,
			':descripcion' => $descripcion,
			':precio' => $precio,
			':imagen' => $httpimg,
			':id' => $id
		));
	}
	/* query */
	header("Location: ../editar-producto.php?m=".base64_encode("Acción realizada correctamente")."&id=".$id);
?>