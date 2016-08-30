<?php
	session_start(); 
	include("config.php");
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$user = $_POST['user'];
	$pwd = md5($_POST['pass']);
	$sql = "SELECT * FROM admin where correo = :correo and contrasena = :contrasena";
	$q = $conn->prepare($sql);
	$q->execute(array(
		':correo' => $user,
		':contrasena' => $pwd
	));
	$q->setFetchMode(PDO::FETCH_BOTH);
	$resultado = $q->fetchAll();
	$cont = count($resultado);
	$id_admin = $resultado[0];
	$id_admin = $id_admin['id'];
	if($cont>0){
		$_SESSION['id_admin'] = $id_admin;
		$_SESSION['auth'] = true;
		header("Location: inicio.php");
	}else{
		session_destroy();
		header("Location: index.php?m=".base64_encode('Login Incorrecto'));
	}
?>