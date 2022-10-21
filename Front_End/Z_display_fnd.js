//Display the selection of event food and drinks
fetch('Z_FND_con.php').then((res) => res.json())
.then(response => {
	console.log(response);
	let output = '';
        output += `<option disabled selected value>Please select a food & drinks vendor (Comes with a package)</option>`;
	for(let i in response){
            if(response[i].pack_name){
                output += `<option value="${response[i].pack_name}">${response[i].pack_name}</option>`;
            }
	}

	document.querySelector('.FNDSelection').innerHTML = output;
}).catch(error => console.log(error));

$(document).ready(function(){
	$('.FNDSelection');
});