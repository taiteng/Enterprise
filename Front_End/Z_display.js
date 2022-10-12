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

//Display the description of event entertainment upon selection
function createDecoDisplay(){
    var d = document.getElementById("selectDeco");
    var displayText = d.options[d.selectedIndex].text;
    
    fetch('Z_deco_con.php').then((res) => res.json())
            .then(response => {
                console.log(response);
                let output = '';
                for (let i in response) {
                    if (response[i].deco_name === displayText) {
                        output += `${response[i].deco_desc}`;
                        outputText = output;
                        document.getElementById("displayDeco").value = outputText;
                    }
                }
            }).catch(error => console.log(error));
}

//Display the description of event food and drinks upon selection
function createFNDDisplay() {
    var d = document.getElementById("selectFND");
    var displayText = d.options[d.selectedIndex].text;
    
    fetch('Z_FND_con.php').then((res) => res.json())
            .then(response => {
                console.log(response);
                let output = '';
                for (let i in response) {
                    if (response[i].pack_name === displayText) {
                        output += `${response[i].pack_desc}`;
                        outputText = output;
                        document.getElementById("displayFND").value = outputText;
                    }
                }
            }).catch(error => console.log(error));
}

//Display the fragment
function createNoFNDDisplay() {
    var d = document.getElementById("noppl");
    var e = document.getElementById("noFND");
    
    if(e > d){
        confirm("Number of food & drinks quantity exceeds the number of participants.");
    }
}

