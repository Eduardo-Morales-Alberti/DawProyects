	
		<?php 
			
			function pinta_tabla($ini=1,$fin=10){
				global $css;
				global $id;
				global $nombre;
				if($ini > $fin){
					$aux = $ini;
					$ini = $fin;
					$fin = $aux;
				}
				$c1 = "c1";
				$c2 = "c2";
				if(func_num_args()>2){ //Esto permite saber el numero de argumentos que se han pasado
					$c1 = func_get_arg(2); /*Esto permite saber que argumento hay en la posición pasada por parametro*/
					$c2 = func_get_arg(3);
				}

				$page="<table border='1'>";
				$color = $c2;
				for ($f = $ini; $f <= $fin ; $f++) { 
					$page .=  "<tr>"; //inicio fila
					if($color == $c1){
								$color = $c2;
							}	else{
								$color = $c1;
							}
					for ($c = 1; $c <= 10 ; $c++) { 
						$page .= "<td class='".$color."''>" .$c*$f."</td>"; //Las celdas
						if($color == $c1){
									$color = $c2;
								}	else{
									$color = $c1;
								}
					}
					$page .="</tr>"; //Termino fila
				}

				$page .= "</table>"; //Termino tabla
				include_once('plantilla.php');//echo $page; Con include_once metemos la página
			}

			function pinta_form(){
				global $id;
				global $nombre;
				$page = " <form action='tablamultiplicar2.php' method='post'>
				Mostrar desde <input type='text' name='desde' /></br>
				Hasta <input type='text' name='hasta'/></br>
				<input type='submit' value='ver' name='calculo'/>
				</br>
				Color1 <select name='color1'>
				<option value='c1'>Rojo</option>
				<option value='c2'>Azul</option>

				</select>
				Color2 <select name='color2'>
				<option value='c3'>Gris</option>
				<option value='c4'>Naranja</option>
				
				</select>
				</form>";

				include_once('plantilla.php');//echo $page;
			}
			$id = "MULTIPLICAR";
			$nombre = "Tabla de multiplicar";
			$css = "table{
				width:80%;
				text-align:center; 
				background-color:orange;
				color:white;
				margin:0 auto;
				font-size:20px;
				}
				.c1{background-color:red;}
				.c2{
					background-color:blue;
				}
				.c3{
					background-color:green;
				}
				.c3{
					background-color:grey;
				}
				.c0{
					background-color: orange;
				}";
			if (isset($_REQUEST['calculo']) ){
				if((empty($_REQUEST['desde'])) && (empty($_REQUEST['hasta']))){
					pinta_tabla();
				}elseif(!(empty($_REQUEST['desde'])) && (empty($_REQUEST['hasta']))){
					pinta_tabla($_REQUEST['desde'],10);
				}elseif((empty($_REQUEST['desde'])) && !(empty($_REQUEST['hasta']))){
					pinta_tabla(1,$_REQUEST['hasta']);				
				}else{
					pinta_tabla($_REQUEST['desde'], $_REQUEST['hasta'],$_REQUEST['color1'],$_REQUEST['color2']);
				}

				
			}else{
				pinta_form();
			}
		?>
