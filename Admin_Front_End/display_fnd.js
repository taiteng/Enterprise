fetch('../Front_End/Z_FND_con.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        
        data1 += `<tr>
                    <td>${values.pack_name}</td>
                    <td>${values.pack_desc}</td>
                    <td class="text-success"> ${values.pack_price}</td>
                    <td>
                        <i class="mdi mdi-24px mdi-pencil" aria-hidden="true" data-id="${values.FND_id}" data-bs-toggle="modal" data-bs-target="#editPackageModal"></i>
                        <i class="mdi mdi-24px mdi-trash-can" aria-hidden="true" data-id="${values.FND_id}" data-bs-toggle="modal" data-bs-target="#deletePackageModal"></i>
                    </td>
                  </tr>`;
    });
    document.getElementById("packageList").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


