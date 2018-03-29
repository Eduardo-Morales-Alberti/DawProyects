

/* Método para que el menú del movil cambie sus clases*/
function mostrarM(){
	var n = document.getElementById("mimenu");
	var t = document.getElementsByTagName("nav")[0];
	/*if(n.style.display == "flex"){*/
	if(t.classList.contains("persiana")){	
		/*n.style.display = "none";*/
		t.classList.remove("persiana");
		t.classList.add("ocultar");		
	}else{
		/*n.style.display = "flex";*/
		t.classList.remove("ocultar");
		t.classList.add("persiana");
	}
}




