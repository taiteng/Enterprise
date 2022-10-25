fetch('../Front_End/Z_deco_con.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        
        data1 += `<tr>
                    <td>${values.deco_name}</td>
                    <td>${values.deco_desc}</td>
                    <td class="text-success"> ${values.deco_price}</td>
                    <td>
                        <i class="editDeco mdi mdi-24px mdi-pencil" aria-hidden="true" data-id="${values.deco_id}" data-name="${values.deco_name}" data-desc="${values.deco_desc}" data-price="${values.deco_price}" data-bs-toggle="modal" data-bs-target="#editDecoModal"></i>
                        <i class="deleteDeco mdi mdi-24px mdi-trash-can" aria-hidden="true" data-id="${values.deco_id}" data-name="${values.deco_name}" data-bs-toggle="modal" data-bs-target="#deleteDecoModal"></i>
                    </td>
                  </tr>`;
    });
    document.getElementById("DecoList").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


