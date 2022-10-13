//Display the reviews
fetch('Z_review_con.php').then((res) => res.json())
.then(response => {
	console.log(response);
        let count = 0;
	let output = '';
        output += `<tr align="center" style="padding:10px">`;
	for(let i in response){
            if(count % 3 === 0){
                output += `</tr>
                                <tr align="center" style="padding:10px">`;
            
                output += `<td>
                                <p>${response[i].name}</p>
                        
                                <p>${response[i].comment}</p>`;
            
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
                }
                else if (response[i].rating === '1') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
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
                }
                else if (response[i].rating === '2') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
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
                }
                else if (response[i].rating === '3') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
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
                }
                else if (response[i].rating === '4') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/empty-star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                }
                else if (response[i].rating === '5') {
                    output += `<table align="center">
                                    <tr>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                }
            }
            else{
                    output += `<td>
                                <p>${response[i].name}</p>
                        
                                <p>${response[i].comment}</p>`;

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
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
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
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
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
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
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
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
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
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                        <td>
                                            <img src="../Images/star.png" width="30px" height="30px" alt="star"/>
                                        </td>
                                    </tr>
                                </table>
                            </td>`;
                    }
            }
            
            count += 1;
	}
        output += `</tr>`;

	document.querySelector('.commentBody').innerHTML = output;
}).catch(error => console.log(error));

$(document).ready(function(){
	$('.commentBody');
});