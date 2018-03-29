
<?php
$id = "SUDOKU";
$nombre = "Sudoku Aleatorio";
$page = "<table border='1'>";

function generar(){
	$i = 1;
	$n = array();
	$n[0] = mt_rand(1 , 9);		
	do{
		$num = mt_rand(1 , 9);
		if(!in_array($num,$n)){
			$n[$i] = $num;
			$i++;
		}

	}while($i<9);
	return $n;

}

function incrementar($v){ /*Sta función sirve para que no se pase el índice de las posiciones del array*/
	if($v>=9){
		return 0;
	}else{
		return $v;
	}
}

/*$numeros = array(1,2,3,4,5,6,7,8,9);*/ /*Esto son los valores que toman las celdas*/
$numeros = generar();/*Esto son los valores que toman las celdas de forma aleatoria*/
$cuadrante = 1; /*Esto es para que no ponga el td vacío en la última fila*/
$i = 0; /*Este es para recorrer el array de números*/
for ($k = 0; $k < 3 ; $k++) { /*Este crea los cuadrantes en vertical*/
	for ($h = 0; $h < 3 ; $h++) { 
		$page .= "<tr>";

		for ($p = 0; $p < 3 ; $p++) {  /*Este crea los cuadrantes en horizontal*/
			$page .= "";

			for ($n=0; $n < 3 ; $n++) {	
				/*Este escribe las filas del cuadrante*/					
				$page .= "<td>". $numeros[$i]."</td>";
				$i = incrementar($i+1);				
			}

					if($p!=2){ /*Esto pone una celda vacía a la derecha entre los cuadrantes horizontales, 
						en el último no pone nada*/
						$page .= "<td></td>";
					}

				}
				/*este incrementa en tres para la siguiente fila dentro del cuadrante*/
				$i = incrementar($i+3);
				$page .= "</tr>";

			}
			if($k != 2){ /*Este pone una fila entera vacía debajo de los cuadrantes, excepto en los últimos*/
				$page.="<tr><td colspan='11' style='height:15px;'></td></tr>";
			}
			
			$i = incrementar($i+$cuadrante); /*Este incrementa en uno, para que la siguiente fila de cuadrantes empiece
			en el número siguiente*/
			$cuadrante = $cuadrante+1;	/*Se incrementa en 1 para el siguiente cuadrante*/
		}
		$page .= "</table><br><br><a href=''>Recargar</a>";
		$css = "table{
			width:80%;
			text-align:center; 
			background-color:orange;
			color:white;
			margin:0 auto;
			font-size:20px;
		}";
		
		include_once('plantilla.php');

		?>

