<?php

	function pintarForm(){
		$id = "FORO";
		$nombre = "Foro";
		$page ="<h1>Identificación de usuario</h1>
		<form action='' method='get'>
			Nombre: <input type='text' name='nombre'><br>
			Password: <input type='password' name='contr'><br>
			<input type='submit' value='Entrar' name='entrar'>
		</form>";
		include('plantilla.php');
	}

	function escMensaje($nom = '',$contr='',$nom=''){
		$id = "FORO";
		$nombre = "Escribir comentario";
		$page =  "Bienvenido al Foro, usuario ".$nom."
		por favor indique el tema sobre el que realiza su
		comentario, gracias <br>
		<form action='' method='get'>
			<input type='hidden' name='nombre' value='".$nom."'>
			<input type='hidden' name='contr' value='".$contr."'>
			Tema: <input type='text' name='tema'>
			<br>Comentario: <textarea style='resize:none;' name='coment'></textarea>
			<br>
			<input type='submit' value='Detalles' name='detalles'>
		</form>
		<a href='foro.php'>Terminar</a> 
		<a href=''>Nueva opinion</a>";
		include('plantilla.php');
	}
	
	function informe($tema = '', $comentario = '',$contr='',$nom=''){
		$id = "FORO";
		$css = "
			table{ 
			background-color:orange;
			color:white;
			font-size:20px;
			border-collapse: collapse;
			border:1px black solid;
			}
			td, tr{
			border:1px black solid;
			}
		";
		$nombre = "Informe";
		$comentario = ereg_replace("( ){2,}"," ",$comentario); //Eliminar espacios repetidos
		$longitud = strlen($comentario);
		$palabras = str_word_count($comentario); //Numero de palabras

		/*Mostrar letra que mas se repite*/
		$letras = count_chars($comentario, 1); /*Devuelve un array asociativo con 
		 el caracter cómo índice y las veces que se repite como valor */
		arsort($letras); //Ordenamos por el valor
		/*Reducir el número de espacios entre palabras a uno, ignorando los 
		separadores como , . */
		/*Mostrar palabra más repetida*/
		$apalabras = explode(" ",$comentario); //Obtenemos todas las palabras del comentario		
		$contar=array(); //Creamos un array
 
		foreach($apalabras as $value) //Recorremos el array de palabras
		{
			if(isset($contar[$value]))
			{
				// si ya existe, le añadimos uno
				$contar[$value]+=1;
			}else{
				// si no existe lo añadimos al array
				$contar[$value]=1;
			}
		}	 
		arsort($contar); //Ordenamos el array asociativo resultante por las ocurrencias

		

		$page ="<h1>Informe sobre: ".$tema."</h1>
		<table>
			<tr>
				<td>Longitud: </td>
				<td>".$longitud."</td>
			</tr>
			<tr>
				<td>Nº de palabras: </td>
				<td>".$palabras."</td>
			</tr></tr>
			<tr>
				<td>Letra + repetida: </td>
				<td>".chr(key($letras))."</td>
			</tr>
			<tr>
				<td>Palabra + repetida: </td>
				<td>".key($contar)."</td>
			</tr>
		</table><br>
		<form action='' method='get'>
			<input type='hidden' name='nombre' value='".$nom."'>
			<input type='hidden' name='contr' value='".$contr."'>
			<input type='submit' value='Volver' name='entrar'>
		</form>";
		include('plantilla.php');

	}

	if(!empty($_REQUEST['entrar']) && !empty($_REQUEST['nombre']) && empty($_REQUEST['detalles']) 
		&& strrev($_REQUEST['nombre']) == $_REQUEST['contr'] &&strlen($_REQUEST['nombre'])>5){
		escMensaje($_REQUEST['nombre'],$_REQUEST['contr'], $_REQUEST['nombre']);
	}elseif(!empty($_REQUEST['detalles'])){
		informe($_REQUEST['tema'], $_REQUEST['coment'],$_REQUEST['contr'], $_REQUEST['nombre']);
	}else{
		pintarForm();

	}
	
?>