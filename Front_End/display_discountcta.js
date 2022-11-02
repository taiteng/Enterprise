fetch('../Admin_Back_End/display_database/discount_db.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        
        data1 += `<div class="col-sm-3" style="margin-left:20px;">
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-title">${values.discount_name}</h5>
                        <h5 class="card-description">${values.discount_percent}%</h5>
                        
                      </div>
                    </div>
                  </div>`;
    });
    document.getElementById("activatedDiscount").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


