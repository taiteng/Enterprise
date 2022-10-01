fetch('../Admin_Back_End/dbService.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        data1 += `<tr>
                      <th scope="row" style="text-align:center;">
                          ${values.service_id}
                      </th>
                      <td>
                            <p class="fw-normal mb-1">${values.service_type}</p>
                            <p class="text-muted mb-0">${values.service_desc}</p>
                      </td>
                      <td>
                          Otto
                      </td>
                      <td>
                          <span class="status text-warning ">&bull;</span> In Progress
                      </td>
                      <td align="center">
                          <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                      </td>
                      <td align="center">
                          <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                          <a href="" type="submit">
                                <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                          </a>
                      </td>
                    </tr>`;
    });
    document.getElementById("projects").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});
