/*Menú fijado*/
window.onscroll = function(){
	/* Capturo mi elemento menú y miro la posición de mi menú*/
	var menu = document.getElementsByClassName("caja1-2")[0];
	var altura = menu.offsetTop;
	
	var caja1 = document.getElementsByClassName("caja1-1")[0];
	var bd = document.getElementsByTagName("body")[0];
	var cab = document.getElementsByClassName("cabecera")[0];
	var logo = document.getElementsByClassName("logo")[0];
	var item1 = document.getElementsByClassName("item-1")[0];

	/*Compara la altura del menú con la altura del cuerpo*/
	if(bd.scrollTop > altura){
		/* Fijo el menú, y quito el bisel del primer elemento del menú*/
		menu.classList.add("menufijo");
		item1.classList.add("sinbisel");
	}else{
		menu.classList.remove("menufijo");
		item1.classList.remove("sinbisel");
	}


}

