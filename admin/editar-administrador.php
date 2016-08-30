<?php 
	include("auth.php");
	$id = $_GET['id'];
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$user = $_POST['user'];
	$pwd = md5($_POST['pass']);
	$sql = "SELECT * FROM admin where id = :id order by id";
	$q = $conn->prepare($sql);
	$q->execute(
		array(':id' => $id)
	);
	$q->setFetchMode(PDO::FETCH_BOTH);
	$resultado = $q->fetchAll();
	$r = $resultado[0];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("head.php") ?>
</head>
<body>
	<div id="wrap">
		<div class="w100 white">
			<div class="container" id="contenedormenu">
				<div class="twelve column">
					<?php include("menu.php") ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="container" id="logos">
				<div class="one-third column tac"></div>
				<div class="one-third column tac"><div id="logo">enviachocolates.com</div></div>
				<div class="one-third column tac"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="white">
			<div class="container">
				
				<div class="one-half column">
					<p>Editar:</p>
					<p>&nbsp;</p>
					<form id="forminsertaradmin" class="formularios" action="update/administrador.php" method="post">
						<p><input type="text" class="w100" name="correo" placeholder="Correo" value="<?php echo $r['correo'] ?>"></p>
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<p><input type="submit" value="Editar"></p>
						<p><a href="administradores.php">Regresar</a></p>
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<footer>
			
			<div class="clear"></div>
			<div id="legales">
				<p class="tac"> &copy; Derechos reservados enviachocolates.com 2016</p>
			</div>
		</footer>
	</div>
</body>
</html>