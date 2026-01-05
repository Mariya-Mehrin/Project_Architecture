 let valid=false;
        function validName(){
                let x=document.getElementById("name").value;
                if(x=="" || !x){
                    document.getElementById("nameErr").innerHTML="Name is required";
                    valid=false;
                       return;
                }
                 document.getElementById("showName").innerHTML="Name:"+x;
                 return;
            }
        function validEmail() {
            const emailRegex = /^\S+@\S+\.\S+$/;
            let x=document.getElementById("email").value;
            let text="";
            if(!emailRegex.test(x) || x=="" || !x){
                text+="Invalid Email";
                document.getElementById("emailErr").innerHTML=text;
                valid=false;
                  return;
            }
     
              document.getElementById("showEmail").innerHTML="Email:"+x;
     return;
     }
function validPass(){
    let password = document.getElementById('password').value;
    if (!password) {
        document.getElementById("passErr").innerHTML="Password required!";
        valid=false;
          return;
    } 
    document.getElementById("showPass").innerHTML="Pass:"+password;
     return;
}
function validPhone(){
    let tel=document.getElementById("phone").value;
    if(!tel){
document.getElementById("telErr").innerHTML="Phone Number required!";
valid=false;
   return;
    }
   if(tel.length<11 || tel.length >11){
        document.getElementById("telErr").innerHTML="Invalid Phone Number";
        valid=false;
        return;
    }
    document.getElementById("showPhone").innerHTML="Phone No:"+tel;
    return;
}

function validRole(){
    let role = document.getElementById('role').value;
    if (role=="Select") {
        document.getElementById("roleErr").innerHTML="select one!";
        valid=false;
       return;
    } 
    document.getElementById("showRole").innerHTML="Role:"+role;
     return;
}
function validFile(){
    let file=document.getElementById("file").value;
    if(!file){
        document.getElementById("fileErr").innerHTML="Please upload a file";
        valid=false;
           return;
    }
document.getElementById("showFile").innerHTML="File Path:"+file;
// Header("Location:")
return;
}

function validAll(){
    return false;
    validName();
    validEmail();
     validPass();
     validPhone();
     validFile();
     validRole();
    if(!valid){
        return false;
    }else {
    return true;
    }
    if(valid){
        window.location.href="dashboard.php";
    }
   
}
        