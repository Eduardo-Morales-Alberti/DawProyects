
<?php	
	$nombre ="Saber nif";
	$page = "";
	$id = "DNI";
	function calcular($n){
		$l = ((int)$n % 23);
		$letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D" , "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
		return $letras[$l];
		
	}
	function pinta_form(){
		return  " <form action='saber_nif.php' method='post'>
				Dime tu nif <input type='text' name='nif' /></br>				
				<input type='submit' value='ver' name='calculo'/>
				</form>";

		
	}
	
	if(isset($_REQUEST['calculo'])){
		$page = "<i>Su DNI es ".$_REQUEST['nif']."<b>".calcular($_REQUEST['nif'])."</b>"."</i>";
	}else{
		$page = pinta_form();
	}
	include_once('plantilla.php');
?>