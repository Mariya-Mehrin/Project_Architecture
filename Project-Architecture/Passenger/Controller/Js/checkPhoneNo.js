function findExistingPhoneNo(){
    var Phone = document.getElementById("phone").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("errorphoneno").innerHTML =this.responseText;
        }
        else
        {
            document.getElementById("errorphoneno").innerHTML = this.status;
        }
    };
    xhttp.open("POST", "../Controller/checkPhoneNo.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Phone No="+Phone);
    }