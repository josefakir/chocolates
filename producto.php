<?php 
	include("config.php")
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include("head.php");
	$id = $_GET['id'];
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
	$sql = "SELECT * FROM productos  WHERE activo = '1' and id = :id";
	$q = $conn->prepare($sql);
	$q->execute(array(':id' => $id));
	$q->setFetchMode(PDO::FETCH_BOTH);
	$resultado = $q->fetchAll();
	$r = $resultado[0];
	$id_categoria = $r['id_categoria'];
	 ?>
</head>
<body>
	<div id="wrap">
		<?php include("menu.php") ?>
		<div class="white">
			<p>&nbsp;</p>
			<div class="container" id="singleproductos">
				<div class="two-third column">
					<div class="fotoproducto">
						<img src="<?php echo $r['imagen'] ?>" alt="" class="w100">
					</div>
				</div>
				<div class="one-third column">
					<h1 id="nombreproducto"><?php echo $r['nombre'] ?></h1>
					<div id="descripcionproducto">
						<?php echo $r['descripcion'] ?>
					</div>
					<div id="cantidadproducto">
						<p>Cantidad:</p>
						<a href="#" id="sumar"><i class="fa fa-plus-square" aria-hidden="true"></i></a>
						<input type="text"  value="1">
						<a href="#" id="restar"><i class="fa fa-minus-square" aria-hidden="true"></i></a>
					</div>
					<div id="precioproducto">
						<span>$<?php echo number_format($r['precio'],2) ?></span>
						<a href="agregar-al-carrito.php?id=<?php echo $r['id'] ?>" class="agregaralcarrito">Agregar al carrito</a>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
			<div class="container" id="recomendados">
				<p class="relacionados">Productos relacionados:</p>
				<?php 
					$sql = "SELECT * FROM productos  WHERE activo = '1' AND id_categoria = :id_categoria and id <> :id order by RAND() LIMIT 0,4";
					$q = $conn->prepare($sql);
					$q->execute(array(':id_categoria' => $id_categoria,':id'=>$id));
					$q->setFetchMode(PDO::FETCH_BOTH);
					$resultado = $q->fetchAll();
					foreach($resultado as $r){
						?>
				<div class="producto three column">
					<a href="producto.php?id=<?php echo $r['id']  ?>"><img src="<?php echo $r['imagen'] ?>" alt="" class="w100"></a>
					<div class="nombre tac">
						<a href="producto.php?id=<?php echo $r['id']  ?>"><?php echo $r['nombre'] ?></a>
					</div>
					<div class="teaser tac">
						<?php echo $r['descripcion'] ?>
					</div>
					<div class="precio tac">
						<a href=""><i class="fa fa-shopping-bag bolsa" aria-hidden="true"></i> $<?php echo number_format($r['precio'],2) ?></a>
					</div>
				</div>
						<?php
					}
				?>
				<div class="clear"></div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
			</div>
		</div>
		<?php include("footer.php") ?>
	</div>
</body>

</html>