function findExistingPassword(){
    var Password = document.getElementById("Passsword").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("errorpass").innerHTML =this.responseText;
        }
        else
        {
            document.getElementById("errorpass").innerHTML = this.status;
        }
    };
    xhttp.open("POST", "../Controller/checkPassword.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("Password="+Password);
    }