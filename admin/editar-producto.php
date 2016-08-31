<?php 
	include("auth.php");
	$id = $_GET['id'];
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$sql = "SELECT * FROM productos where id = :id order by id";
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
				<div class="two-third column">
					<p>Agregar nuevo producto:</p>
					<p>&nbsp;</p>
					<form id="formeditarproducto" class="formularios" action="update/producto.php" method="post" enctype="multipart/form-data">
						<p><select name="categoria" id="">
							<option value="">Seleccione una categoría</option>
							<?php 
								$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
								$sql = "SELECT id,nombre,slug FROM categorias  WHERE activo = '1' order by nombre";
								$q = $conn->prepare($sql);
								$q->execute();
								$q->setFetchMode(PDO::FETCH_BOTH);
								$resultado = $q->fetchAll();
								foreach($resultado as $re){
									?>
									<option value="<?php echo $re['id'] ?>" <?php if($re['id']==$r['id_categoria']){ echo "selected ";} ?>><?php echo $re['nombre'] ?></option>
									<?php
								}
							?>
						</select></p>
						<p><input type="text" class="w100" name="nombre" placeholder="Nombre" id="nombrecategoria" value="<?php echo $r['nombre'] ?>"></p>
						<p><input type="text" class="w100" name="slug" placeholder="Slug" id="slugcategoria" value="<?php echo $r['slug'] ?>"></p>
						<p><textarea class="w100" name="descripcion" id="" cols="30" rows="10" placeholder="Descripción"><?php echo $r['descripcion'] ?></textarea></p>
						<p><input type="text" class="w100" name="precio" placeholder="Precio" value="<?php echo $r['precio'] ?>"></p>
						<p><input type="file" accept="image/*" onchange="loadFile(event)" name="foto"></p>
						<input type="hidden" value="<?php echo $_GET['id'] ?>" name="id_producto">
						<img src="<?php echo $r['imagen'] ?>" alt="">
						<img id="output" class="w100" />
						<script>
						  var loadFile = function(event) {
						    var output = document.getElementById('output');
						    output.src = URL.createObjectURL(event.target.files[0]);
						  };
						</script>
						<p><input type="submit" value="Editar"></p>
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