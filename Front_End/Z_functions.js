//Display the description of event entertainment upon selection
function createDecoDisplay(){
    var d = document.getElementById("selectDeco");
    var displayText = d.options[d.selectedIndex].text;
    
    fetch('Z_deco_con.php').then((res) => res.json())
            .then(response => {
                console.log(response);
                let output = '';
                for (let i in response) {
                    if (response[i].deco_name === displayText) {
                        output += `${response[i].deco_desc}`;
                        outputText = output;
                        document.getElementById("displayDeco").value = outputText;
                    }
                }
            }).catch(error => console.log(error));
}

//Display the description of event food and drinks upon selection
function createFNDDisplay() {
    var d = document.getElementById("selectFND");
    var displayText = d.options[d.selectedIndex].text;
    
    fetch('Z_FND_con.php').then((res) => res.json())
            .then(response => {
                console.log(response);
                let output = '';
                for (let i in response) {
                    if (response[i].pack_name === displayText) {
                        output += `${response[i].pack_desc}`;
                        outputText = output;
                        document.getElementById("displayFND").value = outputText;
                    }
                }
            }).catch(error => console.log(error));
}

//Display the fragment
function createNoFNDDisplay() {
    var d = document.getElementById("noppl");
    var e = document.getElementById("noFND");
    
    if(e > d){
        confirm("Number of food & drinks quantity exceeds the number of participants.");
    }
}

//Reset time if end time less than start time
function handler(e) {
    var end = e.target.value;
    var endTime = document.getElementById("endTime");
    var startTime = document.getElementById("startTime");
    var start = startTime.value;

    if (end < start) {
        alert("The start time must be before the end time.");
        endTime.value = "";
    }
}

