//Display the reviews
fetch('Z_review_con.php').then((res) => res.json())
.then(response => {
	console.log(response);
	let output = '';
	for(let i in response){
            output += ` <div class="col-sm-4">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="card-body">
                                    <h5 class="card-title">${response[i].name}</h5>
                                    <p class="card-text">${response[i].comment}</p>`;
        
                if (response[i].rating === '0') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                } else if (response[i].rating === '1') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                } else if (response[i].rating === '2') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                } else if (response[i].rating === '3') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                } else if (response[i].rating === '4') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                } else if (response[i].rating === '5') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.jpg" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                }
                
            output += `</div>
                        </div>
                    </div>`;
	}

	document.querySelector('.commentBody').innerHTML = output;
}).catch(error => console.log(error));

$(document).ready(function(){
	$('.commentBody');
});