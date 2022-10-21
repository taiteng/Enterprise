//Display the selection of event entertainment
fetch('Z_fun_con.php').then((res) => res.json())
.then(response => {
	console.log(response);
	let output = '';
        output += `<option disabled selected value>Please select an entertainment</option>`;
	for(let i in response){
            if(response[i].fun_name){
                output += `<option value="${response[i].fun_name}">${response[i].fun_desc}</option>`;
            }
	}

	document.querySelector('.funSelection').innerHTML = output;
}).catch(error => console.log(error));

$(document).ready(function(){
	$('.funSelection');
});