
function validateLogin() {
    let u = document.getElementById("username").value;
    let p = document.getElementById("password").value;
    let msg = document.getElementById("error-msg");

    if (u === "" || p === "") {
        msg.innerText = "Error: Username and Password required!";
        return false;
    }
    return true;
}


function searchFlight() {
    let query = document.getElementById("searchBox").value;
    let tableBody = document.getElementById("flightTable");

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../controllers/flight_ops.php?q=" + query, true);

    xhr.onload = function() {
        if (this.status == 200) {
            let flights = JSON.parse(this.responseText);
            let output = "";
            
            if(flights.length > 0){
                for(let i in flights){
                    output += `<tr>
                        <td>${flights[i].id}</td>
                        <td>${flights[i].flight_name}</td>
                        <td>${flights[i].destination}</td>
                        <td>$${flights[i].price}</td>
                    </tr>`;
                }
            } else {
                output = "<tr><td colspan='4'>No flights found</td></tr>";
            }
            tableBody.innerHTML = output;
        }
    }
    xhr.send();
}