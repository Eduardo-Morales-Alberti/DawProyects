<?php 
include_once("consultar_paises/datos/paises.php");
$id = "PAISES";
$nombre = "Mostrar paises";
$page = "";
function formulario (){
	global $id;
	global $nombre;
	global $pais;
	global $page;

	$r = " 
	<form action='' method='post'>
	<fieldset>
	<legend>Selecciona el país</legend>	
	<b>Paises</b><br/>
	<select name='pais'>
	";
	foreach ($pais as $key => $value) {
		$r .= "<option value='".$key."'>".$key."</option>";
	}	
	$r .= "</select> 
	<br/><br/>
	<input type='submit' value='Mostrar' name='mostrar'>
	</fieldset>
	</form>";
	$page["Seleccionar"] = $r;
	

}

function info($op){
	global $id;
	global $nombre;
	global $pais;
	global $page;
	$r = " 
	<form action='' method='post'>
	<fieldset>
	<legend>Selecciona el país</legend>	
	<b>Paises</b><br/>
	<select name='pais'>
	";
	foreach ($pais as $key => $value) {
		if($key == $op){
			$r .= "<option value='".$key."' selected>".$key."</option>";
		}else{
			$r .= "<option value='".$key."'>".$key."</option>";
		}
		
	}	
	$r .= "</select> 
	<br/><br/>
	<input type='submit' value='Mostrar' name='mostrar'>
	</fieldset>
	</form>";
	$page["Seleccionar"] = $r;
	$r = "";
	foreach ($pais[$op] as $key => $value) {
		if(is_array($value)){
				$r .= strtoupper($key).": <ul>";
				for ($i=0; $i < count($value); $i++) { 
					$r .= "<li><b>".$value[$i]."</b></li>";
				}
				$r .= "</ul></br>";
		}else{
			$r .= strtoupper($key).": <b>".$value."</b></br>";
		}
		
	}
	

	$page["Información"] = $r;
}

if(!empty($_POST)){
	info($_POST["pais"]);
}else{
	formulario();
}
?>