var emailExist = false;
let email = document.getElementById("email");
let e9 = document.getElementById('email_validation');
e9.innerHTML = "";
email.addEventListener("blur", function(event){
	let user_email_address = event.target.value;
	//email validation.
	function validateEmail(email) {
		const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		return emailRegex.test(email);
	}

	
	if(validateEmail(user_email_address)){
		

		
		const xhttp = new XMLHttpRequest();

		 
		let url = 'http://localhost/labtask/controllers/userEmailCheck.php';
		xhttp.open("POST", url, true);
	
		
		xhttp.onreadystatechange = function (){
			if (this.readyState == 4 && this.status == 200) {
				
				if(this.responseText === 'valid'){
					e9.innerHTML="Email address is available";
				}else{
					emailExist = true;
					e9.innerHTML="Email address is already taken";
				}
			}
		}
		let data = {
			userEmail:user_email_address
		}
		
		xhttp.send(JSON.stringify(data));
		
	}
})


function submitForm(pForm){
	const userEmail = pForm.email.value;
	const userPass = pForm.password.value;
    const rpass = pForm.rpass.value;
    const fname = pForm.fname.value;
    const cnum = pForm.cnum.value;
    const rGender = pForm.gender.value;

	let e1 = document.getElementById("rerr1");
	let e2 = document.getElementById("rerr2");
    let e3 = document.getElementById("rerr3");
    let e4 = document.getElementById("rerr4");
    let e5 = document.getElementById("rerr5");
    let e6 = document.getElementById("rerr6");
    let e7 = document.getElementById("rerr7");

	e1.innerHTML = "";
	e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";
    e5.innerHTML = "";
    e6.innerHTML = "";

	let flag = true;

	if (userEmail === "") {
		e3.innerHTML = "Please provide email";``
		flag = false;
	}
	if (userPass === "") {
		e5.innerHTML = "Please provide password";
		flag = false;
	}
    if (rpass === "") {
		e6.innerHTML = "Please confirm password";
		flag = false;
	}
    if (fname === "") {
		e1.innerHTML = "Please provide full name";
		flag = false;
	}
    if (cnum === "") {
		e2.innerHTML = "Please provide contact number";
		flag = false;
	}
    if (rGender === "") {
		e4.innerHTML = "Please provide gender";
		flag = false;
	}

    if(userPass != rpass){
        e7.innerHTML = "Password doesn't matched! ";
        flag=false;
    }
	if(emailExist){
		flag=false;
	}

	return flag;
}




	
