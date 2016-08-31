<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("head.php"); ?>
</head>
<body>
	<div id="wrap">
		<div class="w100 white">
		<?php include("menu.php") ?>
		<div class="parallax-window" data-parallax="scroll">
			<h2 class="tac" id="tituloslide">Una dulce <br>idea</h2>
		</div>
		<div class="clear"></div>
		<div class="container" id="productos">
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
						$sql = "SELECT * FROM productos  WHERE activo = '1' order by nombre LIMIT $offset,$cuantos";
						$q = $conn->prepare($sql);
						$q->execute();
						$q->setFetchMode(PDO::FETCH_BOTH);
						$resultado = $q->fetchAll();
						$total = "SELECT id,nombre,slug,precio,imagen FROM productos WHERE activo = '1' ";
						$q = $conn->prepare($total);
						$q->execute();
						$q->setFetchMode(PDO::FETCH_BOTH);
						$total =  $q->fetchAll();
						$total = count($total);
						$total = ceil($total/$cuantos);
						foreach($resultado as $r){
							?>
			<div class="producto one-third column">
				<a href=""><img src="<?php echo $r['imagen'] ?>" alt="" class="w100"></a>
				<div class="nombre tac">
					<a href="producto.php?id=<?php echo $r['id']  ?>"><?php echo $r['nombre'] ?></a>
				</div>
				<div class="teaser tac">
					<?php echo $r['descripcion']; ?>
				</div>
				<div class="precio tac">
					<a href="producto.php?id=<?php echo $r['id']  ?>"><i class="fa fa-shopping-bag bolsa" aria-hidden="true"></i> $<?php echo number_format($r['precio'],2) ?></a>
				</div>
			</div>
							<?php
						}
			?>
			
		</div>
		<?php include("footer.php") ?>
	</div>
</body>
</html>