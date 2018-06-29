function validar() {
	
	var PR = document.getElementById("valor").value;
	if (PR >= 6 && PR <= 10){
		return true;
	} else {
		
		alert("PR Invalido");
		return false;
		
	}
}

