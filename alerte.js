// function alarme(boiteAlerte){
// 	// if (document.getElementById('boiteAlerte').title='hidden'){
// 	// 	document.getElementById('boiteAlerte').style.visibility='visible';
// 	// 	document.getElementById('boiteAlerte').title='visible';
// 	// }
// 	// else if (document.getElementById('boiteAlerte').title='visible'){
// 	// 	document.getElementById('boiteAlerte').style.visibility='hidden';
// 	// 	document.getElementById('boiteAlerte').title='hidden';
// 	// }
// 	// else{

// 	// }
// }

function toggle_visibility(id){
	var e = document.getElementById(id);
	if(e.style.display == 'none')
		e.style.display = 'block';
	else
		e.style.display = 'none';
}