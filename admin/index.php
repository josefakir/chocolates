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
			<p>&nbsp;</p><p>&nbsp;</p>
			<h1 class="tac">Iniciar Sesión</h1>
			<div class="one-third column"></div>
			<div class="one-third column">
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<form action="login.php" method="post">
					<p><input type="text" name="user" placeholder="Correo" class="w100"></p>
					<p><input type="password" name="pass" placeholder="Contraseña" class="w100"></p>
					<p><input type="submit" value="Iniciar Sesión"></p>
					<p class="error"><?php echo base64_decode(htmlentities($_GET['m'])) ?></p>
				</form>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
			<div class="one third column"></div>
			</div>
			<div class="clear"></div>
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