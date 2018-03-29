<!DOCTYPE html>
<html lang="es">
	<head>
		<!-- Codificación para tildes y eñes -->
		<meta charset="UTF-8">
		<!-- Etiquetas  -->
		<meta name="description" content="Actividades PHP - Eduardo Morales">
		<meta name="keywords" content="HTML,CSS,JavaScript,w3c, php, programador, trabajo, desarrollador">
		<meta name="author" content="Eduardo Morales">
		<!-- Etiquetas de información para móbiles -->
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<!-- Icono de cabecera -->
		<link rel="shortcut icon" type="image/x-icon" href="./plantilla/img/favicon.png">
		<title>Actividades - <?php echo $nombre; ?></title>
		<!-- Fuente Lobster-->
		<link href='./plantilla/estilos/fonts.css' rel='stylesheet' type='text/css'>
		<!-- Estilo general-->
		<link rel="stylesheet" type="text/css" href="./plantilla/estilos/styles.css">	

		<!-- Index-->
		<link rel="stylesheet" type="text/css"  href="./plantilla/estilos/index.css">	
		<style type="text/css">
			<?php 
				if( isset($css) && ($css!=null) ){
					echo $css;
				}
		 ?>
		</style>
		<script type="text/javascript">
		<?php
			if( isset($javascript) && ($javascript!=null) ){
				echo $javascript;
			}
		?>	
		</script>
		
	</head>
	<body>	
			
			<!-- Contenido de la web -->
			<div class="contenido">
				<!-- Cabecera -->

				<header class="cabecera">

					<!-- Logo, foto-->			
					<div class="logo">
						<div class="foto">
							<img src="./plantilla/img/Fotoperfil.jpg" alt="Imagen perfil">
						</div>

					</div>
					<!-- Contenedor flex box para el nombre y el titulo-->
					<div class="caja1">
						<div class="caja1-1">
							<div class="nombre" >
								<h1>Eduardo</h1>
								<h2>Morales Alberti	</h2>
							</div>
							<div class="titcv">
								<h2 id="cuv">Actividades PHP</h2>
								<!-- Titulo para moviles -->		
								<h2  id="cv">PHP</h2>		
							</div>
						</div>
						<!-- Caja flex-box para la busqueda y el menu-->
						<div class="caja1-2">
							<div class="busqueda">								
								<div id="menu" onclick="mostrarM();">MENU</div>
							</div> 				
							<!-- Menu de navegacion -->
							<nav id="mimenu" class="transformacion ocultar">	
							<?php 
								$id;
								$c = 1;
								$menuitems = array('SUDOKU' => 'actividad_sudoku.php',
									'MULTIPLICAR' => 'tablamultiplicar2.php','DNI' => 'saber_nif.php',
									'BASE' => 'actividad4_calculobase.php','FORO' => 'foro.php', 'LOTERIA' =>'loteriav2.php', 
									'PAISES' => 'consultar_paises.php', 'CALENDARIO' =>'calendario.php');
								foreach ($menuitems as $key => $value) {
									echo "<div class='item-".$c;
									if($key == strtoupper($id)){
										echo " activo '>".$key."</div>";
									}else{
										echo "'><a href='".$value."'class='nventana'>".$key."</a></div>";
									}
								
									$c++;
								}
									
								
							?>				
								<!-- <div class="item-1 activo">SUDOKU</div>
								<div class="item-2" ><a href="tablamultiplicar2.php" class="nventana">TABLA MULTIPLICAR</a></div>
								<div class="item-3"><a href="saber_nif.php" class="nventana">LETRA DNI</a></div>	
								<div class="item-4"><a href="actividad4_calculobase.php" class="nventana">CALCULO BASE</a></div>
								<div class="item-5"><a href="foro.php" class="nventana">FORO</a></div>	-->				
							</nav>

						</div>
					</div>
				</header>	
				</div>
				<!-- Contenido de la web con el sidebar-->
				<div class="centro">
					<!--Contenido principal -->
					<main>					
						<!-- Articulo -->					
							<?php if(is_array($page)) {
								foreach($page as $key => $value) {
									echo "<article>
									<header class='titulo'>
										<h2><i class='fa fa-bolt'></i>  ".$key." </h2>
										<hr>
									</header>
									<div class='cuerpo'>".						
									$value.
									
										"
									</div>
									</article>";
								}

									



						}else{
										
							echo "		
							<article>
								<header class='titulo'>
									<h2><i class='fa fa-bolt'></i>  ".$nombre." </h2>
									<hr>
								</header>
								<div class='cuerpo'>".						

								$page.
									"
								</div>
							</article>";							
						}?>
					</main>					
				</div>

				<!-- Pie de pagina-->
				<footer>
					<p>Para su correcta visualización use un navegador actualizado</p>
					<p>Diseñado y maquetado por Eduardo Morales - 2016</p>
				</footer>
			</div>
	
		<!-- Enlace del javascript externo-->
		<script type="text/javascript" src="./plantilla/javascript/script.js" ></script>
		<!-- Menú fijo-->
		<script type="text/javascript" src="./plantilla/javascript/menu.js" ></script>
	</body>
</html>