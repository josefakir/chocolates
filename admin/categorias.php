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
				<div class="two-third column">
					<table class="w100 tabla">
					<thead>
						<tr>
							<th>id</th>
							<th>Nombre</th>
							<th>Slug</th>
							<th class="botonaccion"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
							<th class="botonaccion"><i class="fa fa-trash" aria-hidden="true"></i></th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$pagina = $_GET['p'];
						$cuantos = 50;
						if(empty($pagina)){
							$pagina = 1;
						}
						$offset = ($pagina - 1)*$cuantos;
						$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
						$user = $_POST['user'];
						$pwd = md5($_POST['pass']);
						$sql = "SELECT id,nombre,slug FROM categorias  WHERE activo = '1' order by nombre LIMIT $offset,$cuantos";
						$q = $conn->prepare($sql);
						$q->execute();
						$q->setFetchMode(PDO::FETCH_BOTH);
						$resultado = $q->fetchAll();
						$total = "SELECT id,nombre,slug FROM categorias WHERE activo = '1' ";
						$q = $conn->prepare($total);
						$q->execute();
						$q->setFetchMode(PDO::FETCH_BOTH);
						$total =  $q->fetchAll();
						$total = count($total);
						$total = ceil($total/$cuantos);
						foreach($resultado as $r){
							?>
							<tr>
							<td><?php echo $r['id'] ?></th>
							<td><?php echo $r['nombre'] ?></td>
							<td><?php echo $r['slug'] ?></td>
							<td class="botonaccion"><a href="editar-categoria.php?id=<?php echo $r['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
							<td class="botonaccion"><a onclick="return confirm('¿Seguro de eliminar?');" href="delete/categoria.php?id=<?php echo $r['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
							</tr>
							<?php
						}
					?>
					</tbody>
					</table>
					<ul id="paginador">
						<?php 
							for ($i=1;$i<=$total;$i++){
								?>
						<li><a href="categorias.php?p=<?php echo $i ?>" <?php if($pagina == $i){ echo ' class="current" ';} ?>><?php echo $i ?></a></li>
								<?php
							}
						?>
					</ul>
					<p class="error"><?php echo base64_decode(htmlentities($_GET['m'])) ?></p>
				</div>
				<div class="one-third column">
					<p>Agregar nueva categoría:</p>
					<p>&nbsp;</p>
					<form id="forminsertarcategoria" class="formularios" action="insert/categoria.php" method="post">
						<p><input type="text" class="w100" name="nombre" placeholder="Nombre" id="nombrecategoria"></p>
						<p><input type="text" class="w100" name="slug" placeholder="Slug" id="slugcategoria"></p>
						<p><input type="submit" value="Agregar"></p>
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