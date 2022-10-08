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
                          <input type="hidden" name="delete_id" value="${values.service_id}" id="delete_id"/>
                      </td>
                      <td>
                          <span class="status text-warning ">&bull;</span> In Progress
                      </td>
                      <td align="center">
                          <i class="fa fa-download fa-2x" aria-hidden="true"></i>
                      </td>
                      <td align="center">
                          <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#assignModal"></i>
                          <a href="../Admin_Front_End/projects.php?id=${values.service_id}" type="submit">
                                <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                          </a>
                      </td>
                    </tr>`;
    });
    document.getElementById("projects").innerHTML=data1;
    
}).catch ((err)=> {
    console.log(err);
});
