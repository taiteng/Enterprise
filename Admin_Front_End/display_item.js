fetch('../Admin_Back_End/display_database/item_db.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        
        data1 += `<tr>
                    <td>${values.item_name}</td>
                    <td class="text-success"> ${values.item_price}</td>
                    <td>
                        <i class="editItem mdi mdi-24px mdi-pencil" aria-hidden="true" data-id="${values.item_id}" data-name="${values.item_name}" data-price="${values.item_price}" data-bs-toggle="modal" data-bs-target="#editItemModal"></i>
                        <i class="deleteItem mdi mdi-24px mdi-trash-can" aria-hidden="true" data-id="${values.item_id}" data-name="${values.item_name}" data-bs-toggle="modal" data-bs-target="#deleteItemModal"></i>
                    </td>
                  </tr>`;
    });
    document.getElementById("ItemList").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


