fetch('../Admin_Back_End/display_database/discount_db.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        data1 += `<div class="card" width="250">
                      <div class="card-body">
                        <h4 class="card-title">${values.discount_name}</h4>
                        <h2 class="card-description">${values.discount_percent}%</h2>
                      </div>
                    </div>`;
    });
    document.getElementById("activatedDiscount").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});


