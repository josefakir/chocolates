<?php 
	include("auth.php");
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
				
				<div class="one-third column">
					<p>Editar Categoría</p>
					<p>&nbsp;</p>
					<form id="forminsertarcategoria" class="formularios" action="insert/categoria.php" method="post">
						<p><input type="text" class="w100" name="nombre" placeholder="Nombre" id="nombrecategoria"></p>
						<p><input type="text" class="w100" name="slug" placeholder="Slug" id="slugcategoria"></p>
						<p><input type="submit" value="Editar"></p>
						<p><a href="categorias.php">Regresar</a></p>
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