function checkpass(){
    var newPassword = document.getElementById('password').value
    var regexpass=/^[a-zA-Z0-9!@#$%^&*]{6,16}$/
    if(regexpass.test(newPassword)){
        document.getElementById("password").style.borderColor = "green";
        
    }
    else{
        document.getElementById("password").style.borderColor = "red";
    }
}

function confirmpass(){
    var confirmpass=document.getElementById("cpassword").value
    var newPassword = document.getElementById('password').value
    if(newPassword==confirmpass){
        document.getElementById("cpassword").style.borderColor = "green";
        
    }
    else{
        document.getElementById("cpassword").style.borderColor = "red";
    }

}

function confirmpass1(){
    var newPassword = document.getElementById('password').value
    var confirmpass1=document.getElementById("cpassword1").value
    if(newPassword==confirmpass1){
        document.getElementById("cpassword1").style.borderColor = "green";
        
    }
    else{
        document.getElementById("cpassword1").style.borderColor = "red";
    }
}