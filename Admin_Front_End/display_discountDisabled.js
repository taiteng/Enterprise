fetch('../Admin_Back_End/display_database/discountDisabled_db.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        data1 += `<div class="col-sm-3" style="margin-left:20px;">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title">${values.discount_name}</h5>
                    <h5 class="card-description">${values.discount_percent}%</h5>
                    <button class="editDiscount btn btn-primary" aria-hidden="true" data-id="${values.discount_id}" data-name="${values.discount_name}" data-status="${values.discount_status}" data-percent="${values.discount_percent}" data-bs-toggle="modal" data-bs-target="#editDiscountModal">Edit</a>
                      <button class="deleteDiscount btn btn-danger" aria-hidden="true" data-id="${values.discount_id}" data-name="${values.discount_name}" data-bs-toggle="modal" data-bs-target="#deleteDiscountModal">Delete</a>
                  </div>
                </div>
              </div>`;
        
    });
    document.getElementById("deactivatedDiscount").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


