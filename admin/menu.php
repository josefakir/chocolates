<?php  
	$pagina = explode("/",$_SERVER['REQUEST_URI']);
	$c = count($pagina);
	$pagina = $pagina[$c-1];
 ?>
<ul id="menu">
						<li><a href="inicio.php" <?php if($pagina=="inicio.php"){echo ' class="current" ';} ?>>Inicio</a></li>
						<li><a href="administradores.php" <?php if($pagina=="administradores.php"){echo ' class="current" ';} ?>>Administradores</a></li>
						<li><a href="categorias.php" <?php if($pagina=="categorias.php"){echo ' class="current" ';} ?>>Categorías</a></li>
						<li><a href="productos.php" <?php if($pagina=="productos.php"){echo ' class="current" ';} ?>>Productos</a></li>
						<li><a href="pedidos.php" <?php if($pagina=="pedidos.php"){echo ' class="current" ';} ?>>Pedidos</a></li>
						<li><a href="logout.php">Cerrar Sesión</a></li>
					</ul>