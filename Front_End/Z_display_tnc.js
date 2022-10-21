//Display the cards of Terms & Conditions
fetch('Z_TNC_con.php').then((res) => res.json())
.then(response => {
	console.log(response);
	let output = '';
        let count = 1;
        let num = '0';
	for(let i in response){
            if (count === response.length - 1) {
                output += `  <div class="card mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-4 last-child">
                                <div class="card-wrapper">
                                    <div class="card-box">
                                        <div class="wrap">
                                            <h4 class="card-count mbr-fonts-style align-left display-1">${(num + count).slice(-2)}</h4>
                                        </div>
                                            <p class="mbr-text mbr-fonts-style align-left display-7">
                                                ${response[i].tnc_desc}
                                            </p>
                                    </div>
                                </div>
                            </div>`;
                } else {
                    output += `  <div class="card mbr-col-sm-12 mbr-col-md-12 mbr-col-lg-4">
                                    <div class="card-wrapper">
                                        <div class="card-box">
                                            <div class="wrap">
                                                <h4 class="card-count mbr-fonts-style align-left display-1">${(num + count).slice(-2)}</h4>
                                            </div>
                                            <p class="mbr-text mbr-fonts-style align-left display-7">
                                                ${response[i].tnc_desc}
                                            </p>
                                        </div>
                                    </div>
                                </div>`;
                }
                count += 1;
	}

	document.querySelector('.TNCBody').innerHTML = output;
}).catch(error => console.log(error));

$(document).ready(function(){
	$('.TNCBody');
});