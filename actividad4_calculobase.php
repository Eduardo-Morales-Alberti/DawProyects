<?php
	$page = "";
	
	function pintaForm(){
		$id = "BASE";
		$nombre = "Conversion bases";
		$page = "Teclee 2 números enteros y seleccione en
	que bases quiere ver el resultado<br>
	<form action='' method='get'>
	Numeros: <input type='text' name='n1'> y
	<input type='text' name='n2'><br>
	Bases: 2<input type='checkbox' name='dos'>
	 8<input type='checkbox' name='ocho'>
	   16<input type='checkbox' name='dc'>
	   <br><input type='submit' value='calcular' name='calcular'>

	</form>";
		include_once("plantilla.php");
	}
	function calcular($n1 = 0, $n2 = 0){
		$id = "BASE";
		$nombre = "Conversion bases";
		$page = "Los resultados de operar con ".$n1." y ".$n2." son<br>";
		$page .= "<table border='1'><tr><td>operacion</td><td>Base 10</td>";
		if(!empty($_REQUEST['dos'])){
			$page .= "<td>Base 2</td>";
		}
		if(!empty($_REQUEST['ocho'])){
			$page .= "<td>Base 8</td>";
		}
		if(!empty($_REQUEST['dc'])){
			$page .= "<td>Base 16</td>";
		}
		$suma = $n1+$n2;
		$resta = $n1-$n2;
		$pro = $n1*$n2;
		$div = $n1/$n2;
		$mod = $n1%$n2;

		$page .= "</tr><td>Suma</td><td>".abs($suma)."</td>";
		$suma = abs($suma);
		if(!empty($_REQUEST['dos'])){
			$page .= "<td>".convBase($suma,2)."</td>";
		}
		if(!empty($_REQUEST['ocho'])){
			$page .= "<td>".convBase($suma,8)."</td>";
		}
		if(!empty($_REQUEST['dc'])){
			$page .= "<td>".base_convert($suma,10,16)."</td>";
		}
		$page .= "</tr>";

		$page .= "<tr><td>Resta</td><td>".abs($resta)."</td>";
		$resta = abs($resta);
		if(!empty($_REQUEST['dos'])){
			$page .= "<td>".convBase($resta,2)."</td>";
		}
		if(!empty($_REQUEST['ocho'])){
			$page .= "<td>".convBase($resta,8)."</td>";
		}
		if(!empty($_REQUEST['dc'])){
			$page .= "<td>".base_convert($resta,10,16)."</td>";
		}
		$page .= "</tr>";

		$page .= "<tr><td>Producto</td><td>".abs($pro)."</td>";
		$pro = abs($pro);
		if(!empty($_REQUEST['dos'])){
			$page .= "<td>".convBase($pro,2)."</td>";
		}
		if(!empty($_REQUEST['ocho'])){
			$page .= "<td>".convBase($pro,8)."</td>";
		}
		if(!empty($_REQUEST['dc'])){
			$page .= "<td>".base_convert($pro,10,16)."</td>";
		}
		$page .= "</tr>";

		$page .= "<tr><td>Division</td><td>".abs($div)."</td>";
		$div = abs($div);
		if(!empty($_REQUEST['dos'])){
			$page .= "<td>".convBase($div,2)."</td>";
		}
		if(!empty($_REQUEST['ocho'])){
			$page .= "<td>".convBase($div,8)."</td>";
		}
		if(!empty($_REQUEST['dc'])){
			$page .= "<td>".base_convert($div,10,16)."</td>";
		}
		$page .= "</tr>";

		$page .= "<tr><td>Modulo</td><td>".abs($mod)."</td>";
		$mod = abs($mod);
		if(!empty($_REQUEST['dos'])){
			$page .= "<td>".convBase($mod,2)."</td>";
		}
		if(!empty($_REQUEST['ocho'])){
			$page .= "<td>".convBase($mod,8)."</td>";
		}
		if(!empty($_REQUEST['dc'])){
			$page .= "<td>".base_convert($mod,10,16)."</td>";
		}
		$page .= "</tr>";

		$page .= "</table> <br><h3><a href='actividad4_calculobase.php'>Recargar</a></h3>";
		include_once("plantilla.php");

	}

	function convBase($num = 0,$base = 0){
		
		$res1 = "";
		$res = "";	
		$cont = 0;
		if($num > 0){
			while($num > 0){
				$res1 = $res1 . ($num % $base);
				$num = floor($num/$base);
			}

			$cont = strlen($res1);
			while($cont > 0 ){
				$res = $res . substr($res1, $cont-1, 1);
				$cont = $cont - 1;
			}

		}else{
			$res = "0";
		}

		return $res;
	}


	
		
	if(!empty($_REQUEST['n1'])&&!empty($_REQUEST['n2'])){
		calcular($_REQUEST['n1'],$_REQUEST['n2']);
		
	}else{
		pintaForm();
	}
?>