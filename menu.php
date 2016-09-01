<div class="container" id="contenedormenu">
			<div class="twelve column">
				<ul id="menu">
					<li><a href="index.php" class="current">Inicio</a></li>
					<li><a href="mi-cuenta.php">Mi cuenta</a></li>
					<li><a href="carrito.php">Ir al carrito</a></li>
				</ul>
				<a href="" id="triggermenu"><i class="fa fa-bars" aria-hidden="true"></i></a>
			</div>
			<div class="clear"></div>
		</div>
		<div class="container" id="logos">
			<div class="one-third column tac"><i class="fa fa-phone telefono" aria-hidden="true"></i> 5593 - 5490</div>
			<div class="one-third column tac"><div id="logo">enviachocolates.com</div></div>
			<div class="one-third column tac"><i class="fa fa-shopping-cart carrito" aria-hidden="true"></i> (<span id="cantidadcarrito">0</span>) Tu carrito está vacío</div>
			<div class="clear"></div>
		</div>
		<div class="container" id="categorias">
			<ul id="menucategorias">
				<?php 
				$conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_DATABASE,DB_USER,DB_PASS);
				$sql = "SELECT * FROM categorias";
				$q = $conn->prepare($sql);
				$q->execute();
				$q->setFetchMode(PDO::FETCH_BOTH);
				$resultado2 = $q->fetchAll();
				foreach($resultado2 as $r2){
					?>
				<li><a href="categoria.php?id=<?php echo $r2['id'] ?>"><?php echo $r2['nombre'] ?></a></li>
					<?php
				}
				?>
			</ul>
		</div>
		<div class="clear"></div>
		</div>