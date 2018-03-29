<?php
$id = "CALENDARIO";
$nombre = "Mostrar Calendario";
$css;
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

function formulario(){
	global $id;
	global $nombre;
	global $css;
	global $meses;
	
	$r = " 
	<form action='' method='post'>
	<fieldset>
	<legend>Seleccionar año y mes</legend>	
	<b>Dime el mes</b><br/>
	<select name='mes'>
	";
	for($i = 0; $i < count($meses); $i++) {
			$r .= "<option value='".($i+1)."'>".$meses[$i]."</option>";
		}	
	$r .= "</select>
	<br/><br/>
	<b>Dime el año</b><br/>
	<select name='anio'>
	";
	for($i = 1990; $i < 2020; $i++ ) {
			$r .= "<option value='".$i."'>".$i."</option>";
		}	
	$r .= "</select>
	<br/><br/>
	<input type='submit' value='Mostrar' name='mostrar'>
	</fieldset>
	</form>";
	$page["Opciones de selección del Calendario"] = $r;

	include_once("plantilla.php");

	
}

function calendario($mes = 10, $anio = 2016){	

	settype($mes,"double");
	settype($anio,"double");	
	global $id;
	$r = "";
	global $nombre;
	global $meses;
	$css = "table{
			width:50%;
			text-align:center; 
			background-color:orange;
			color:white;
			margin:0 auto;
		}
		.rojo{
			color:red;
		}";	


	/*Dibujar formulario*/

	$r = " 
	<form action='' method='post'>
	<fieldset>
	<legend>Seleccionar año y mes</legend>	
	<b>Dime el mes</b><br/>
	<select name='mes'>
	";
	for($i = 0; $i < count($meses); $i++) {
		if($mes == ($i+1)){
			$r .= "<option selected value='".($i+1)."'>".$meses[$i]."</option>";
		}else{
			$r .= "<option value='".($i+1)."'>".$meses[$i]."</option>";
		}

			
		}	
	$r .= "</select>
	<br/><br/>
	<b>Dime el año</b><br/>
	<select name='anio'>
	";
	for($i = 1990; $i < 2020; $i++ ) {
			if($i == $anio){
				$r .= "<option selected value='".$i."'>".$i."</option>";
			}else{
				$r .= "<option value='".$i."'>".$i."</option>";
			}

			
		}	
	$r .= "</select>
	<br/><br/>
	<input type='submit' value='Mostrar' name='mostrar'>
	</fieldset>
	</form>";
	$page["Opciones de selección del Calendario"] = $r;		

	/* encabezado */
	$d_semana = array('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO','DOMINGO');	
	$r = "<table border='1'> ";
	$r .= "<tr><td colspan='6' style='text-align:left;'>Mes:".$meses[$mes-1]."</td><td>".$anio."</td></tr>";
	$r .= "<tr>";
	foreach ($d_semana as $value) {
		$r .="<td>".$value."</td>";
	}
	$r .= "</tr>";
	
	$diasem = 1;
	$diames = 1;
	$primer_dia_mes = date('w',mktime(0,0,0,$mes,1,$anio));
	$dias_mes = date('t',mktime(0,0,0,$mes,1,$anio));
	/*Pintar celdas donde no hay días*/
	$r .= "<tr>";
	for ($i=1; $i < $primer_dia_mes; $i++) { 

		$r .="<td></td>";
		$diasem = $diasem + 1;
	}
	if($diasem == 8){
			$diasem = 1;
			$r .= "</tr><tr>";
	}
	/*Pintar números en las celdas*/	
	for($i=1; $diames < $dias_mes+1; $i++){
		if($diasem == 8){
			$diasem = 1;
			$r .= "</tr><tr>";
		}else{
			if($diasem == 6 || $diasem == 7){
			$r .= "<td class='rojo'>".$diames."</td>";
		}else{
			$r .= "<td>".$diames."</td>";
		}

			$diasem = $diasem + 1;
			
			$diames = $diames + 1;
		}
	}

	/*Pintar resto de celdas si están vacías*/
	if($diasem < 8){
		for ($i=$diasem; $i < 8; $i++) { 
			$r .= "<td></td>";
		}
		$r .= "</tr>";
	}

	$r .= "</tr>";

	$r .= "</table>";
	$page["Resultado del Calendario"] = $r;	

	include_once("plantilla.php");

	
}

if(!empty($_POST)){
	calendario($_POST["mes"],$_POST['anio']);
}else{
	formulario();
}
	
	
?>