fetch('../Admin_Back_End/dbService.php').then((data)=>{
    return data.json();
}).then((completedata)=>{
    let data1="";
    completedata.map((values)=>{
        data1 += `<tr>
                      <th scope="row" style="text-align:center;">
                          <span id="service_id">${values.service_id}</span>
                      </th>
                      <td>
                            <p class="fw-normal mb-1" id="service_type">${values.service_type}</p>
                            <p class="text-muted mb-0" id="service_desc">${values.service_desc}</p>
                      </td>
                      <td style="text-align:center;">
                            <span id="worker_name">${values.worker_name}</span>
                      </td>
                      <td>
                          <span id="project_status">${values.project_status}</span>
                      </td>
                      <td align="center">
                          <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                      </td>
                      <td align="center">
                          <i id="myEditId" class="editBtn fa fa-pencil-square-o fa-2x " aria-hidden="true" data-bs-id="${values.service_id}" data-bs-toggle="modal" data-bs-target="#assignModal"></i>
                          <i id="myDeleteId" class="deleteBtn fa fa-trash fa-2x" aria-hidden="true" data-bs-id="${values.service_id}" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                      </td>
                    </tr>`;
    });
    document.getElementById("projects").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});

