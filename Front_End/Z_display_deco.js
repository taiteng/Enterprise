//Display the selection of event decoration
fetch('Z_deco_con.php').then((res) => res.json())
.then(response => {
	console.log(response);
	let output = '';
        output += `<option disabled selected value>Please select a decorative pack (Price calculated based on site's size)</option>`;
	for(let i in response){
            if(response[i].deco_name){
                output += `<option value="${response[i].deco_name}">${response[i].deco_name}</option>`;
            }
	}

	document.querySelector('.decoSelection').innerHTML = output;
}).catch(error => console.log(error));

$(document).ready(function(){
	$('.decoSelection');
});