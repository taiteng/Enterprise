//Display the cards of Terms & Conditions
fetch('Z_FAQ_con.php').then((res) => res.json())
.then(response => {
	console.log(response);
	let output = '';
	for(let i in response){
            output += ` <div class="col-sm-4">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="card-body">
                                    <h5 class="card-title">${response[i].Ques}</h5>
                                    <p class="card-text">${response[i].Answ}</p>`;
        output += `</div>
                        </div>
                    </div>`;
	}
	document.querySelector('.TNC1Body').innerHTML = output;
}).catch(error => console.log(error));

$(document).ready(function(){
	$('.TNC1Body');
});