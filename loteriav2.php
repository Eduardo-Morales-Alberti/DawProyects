<?php
$id = "LOTERIA";
$nombre = "Jugar a la loteria";
$resultado = array();
$css;
$javascript;
function generar(){
	$i = 1;
	$n = array();
	$n[0] = mt_rand(1 , 49);		
	do{
		$num = mt_rand(1 , 49);
		if(!in_array($num,$n)){
			$n[$i] = $num;
			$i++;
		}

	}while($i<6);
	return $n;

}

function formulario(){
	global $id;
	global $nombre;
	global $css;
	$page = " 
	<form action='' method='get'>
	<fieldset>
	<legend>Introduzca el número ganador</legend>
	<b>Numeros</b>
	<input type='number' name='n1' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' name='n2' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' name='n3' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' name='n4' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' name='n5' size='2' maxlength='2' min='1' max='49' required> 
	<br/><br/>
	<b>Complementario</b>
	<input type='number' name='n6' size='2' maxlength='2' min='1' max='49' required> 
	<br>
	<input type='submit' value='jugar' name='jugar'>
	</fieldset>
	</form>";
	include_once("plantilla.php");
}

function login(){
	global $id;
	$nombre = "Login";
	global $css;
	$page = " 
	<form action='' method='get'>
	<fieldset>
	<legend>LOGIN</legend>
	<b>Escriba minúsculas, mayúsculas, numeros y caracteres especiales</b>
	<br>
	<label for='user'>Usuario</label><br>
	<input type='text' name='user'   min='10' required> <br>
	<label for='password'>Contraseña</label><br>
	<input type='password' name='password'  min='10' required> 
	<br>				
	<input type='submit' value='Entrar' name='entrar'>
	</fieldset>
	</form>";
	include_once("plantilla.php");

}

function password($contr){
	$patron = "^\S*(?=\S*[A-Z])(?=\S*[a-z])(?=\S*[\d])(?=\S*[\W])\S*$^";
	if(preg_match($patron, $contr)&& strlen($contr)>=6){
		return true;
	}else{return false;}
}

function user($usuario){
	$patron = "/^[\w]{6,}$/";
	if(preg_match($patron, $usuario)&& strlen($usuario)>=6){
		return true;
	}else{return false;}
}

function comprobar($numeros){

	$form = "<form action='' method='get'>
	<fieldset>
	<legend>Introduzca el número ganador</legend>
	<b>Numeros</b>
	<input type='number' value='".$numeros[0]."' name='n1' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' value='".$numeros[1]."' name='n2' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' value='".$numeros[2]."' name='n3' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' value='".$numeros[3]."' name='n4' size='2' maxlength='2' min='1' max='49' required> 
	<input type='number' value='".$numeros[4]."' name='n5' size='2' maxlength='2' min='1' max='49' required> 
	<br/><br/>
	<b>Complementario</b>
	<input type='number' value='".$numeros[5]."' name='n6' size='2' maxlength='2' min='1' max='49' required> 
	<br>
	<input type='submit' value='jugar' name='jugar'>
	</fieldset>
	</form>";
	$n = generar();
	global $id;
	global $nombre;
	$page = array($nombre => $form);
	$css = "table{width:70%;margin:0 auto;text-align:center;}.verde{background-color:green; color: white;}";
	$r = "";

	if(count($numeros) != count(array_unique($numeros))){
		$r .= "<h2>Números repetidos en el formulario</h2>";
	}else{


		$tabla = "<table border='1'><caption><b>Numeros acertados</b></caption>";

		$ngen = " ";
		$misnum = "";
		asort($n);
		$acertado = array();
		$res = "";
		$c = 0;


		$acertado = array_intersect($n,$numeros); 
		if(count($acertado) > 0 ){
			foreach ($acertado as  $value) {
				$res .= $value . " // ";
			}
		}

		$ngen .= "<tr><td>Números generados:</td>";
		foreach ($n as $value) {
			if(in_array($value,$acertado)){
				$ngen .= "<td class='verde'>". $value . "</td> ";	
			}else{
				$ngen .= "<td>". $value . "</td> ";	
			}
		}
		$ngen .="</tr>";
		asort($numeros);
		$misnum .= "<tr><td>Números introducidos: </td>";
		foreach ($numeros as $value) {
			if(in_array($value,$acertado)){
				$misnum .= "<td class='verde'>". $value . "</td> ";	
			}else{
				$misnum .= "<td>". $value . "</td> ";	
			}	
		}
		$misnum .= "</tr>";

		$tabla .= $ngen . "". $misnum ."</table>";
		$r .= $tabla."<b><i>Número de acertados: " . count($acertado) . " || Acertados: " . $res."</i></b>";
	}
	$page ["Resultado"]=$r;
	include_once("plantilla.php");
}

if(!empty($_REQUEST['jugar'])){
	$n = array($_REQUEST['n1'],$_REQUEST['n2'],
		$_REQUEST['n3'],$_REQUEST['n4'],$_REQUEST['n5'],$_REQUEST['n6']);
	comprobar($n);
}else if(!empty($_REQUEST['password'])&&!empty($_REQUEST['entrar'])&&!empty($_REQUEST['user'])){
	if(password($_REQUEST['password']) &&user($_REQUEST['user'])){
		formulario();
	}else{
		login();
	}

}else{
	login();
}

?>