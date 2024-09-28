let oldPass = document.getElementById("cpass");
let e1 = document.getElementById('error1');
e1.innerHTML = '';
let flag = false;

oldPass.addEventListener("blur",function(event){
    let user_old_pass = event.target.value;
    
    const xhttp = new XMLHttpRequest();
    let url = 'http://localhost/labtask/controllers/checkOldPass.php';
    xhttp.open("POST", url, true);
    xhttp.onreadystatechange = function (){
        if (this.readyState == 4 && this.status == 200){
            if(this.responseText === 'valid'){
                e1.innerHTML = 'Password matched';
            }else{
                flag = true;
                e1.innerHTML = 'Password doesnt matched !';
                
            }
        }
    }
    let data = {
        userPass:user_old_pass
    }
    
    xhttp.send(JSON.stringify(data));

})

function changePasswordValidation(pForm){
    const oldPass = pForm.cpass.value;
    const newPass = pForm.npass.value;
    const rPass = pForm.rpass.value;

    let e1 = document.getElementById("error1");
    let e2 = document.getElementById("error2");
    let e3 = document.getElementById("error3");

    e1.innerHTML='';
    e2.innerHTML='';
    e3.innerHTML='';

    if(oldPass === ""){
        e1.innerHTML="Old pass can't be empty";
        flag = true;
    }
    if(newPass === ""){
        e2.innerHTML="New pass can't be empty";
        flag = true;
    }
    if(rPass === ""){
        e3.innerHTML="Rytype password can't be empty";
        flag = true;
    }
    if(flag){
        return false;
    }else{
        return true;
    }

}