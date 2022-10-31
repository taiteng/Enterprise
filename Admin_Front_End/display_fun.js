fetch('../Front_End/Z_fun_con.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        data1 += `<tr>
                    <td>${values.fun_name}</td>
                    <td>${values.fun_desc}</td>
                    <td class="text-success"> ${values.fun_price}</td>
                    <td>
                        <i class="editFun mdi mdi-24px mdi-pencil" aria-hidden="true" data-id="${values.fun_id}" data-name="${values.fun_name}" data-desc="${values.fun_desc}" data-price="${values.fun_price}" data-bs-toggle="modal" data-bs-target="#editFunModal"></i>
                        <i class="deleteFun mdi mdi-24px mdi-trash-can" aria-hidden="true" data-id="${values.fun_id}" data-name="${values.fun_name}" data-bs-toggle="modal" data-bs-target="#deleteFunModal"></i>
                    </td>
                  </tr>`;
    });
    document.getElementById("FunList").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


