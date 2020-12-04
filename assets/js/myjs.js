
function view_modal(){
	$("#focusModal").modal("show");

}

function forcontact(){
	var msg = '';
	var check = 0;
	var name = document.forms['contact'].elements['forname'].value;	
	var email = document.forms['contact'].elements['foremail'].value;
	var checkemail = email.includes("@");
	var message = document.forms['contact'].elements['formessage'].value;
	if(name == ''){
		msg = 'Name can not be blank! ';
		check = 1;
	}

	
	if(checkemail == false){
		msg = msg +'Please insert a valie email address! ';
		check = 1;
	}

	if(message == ''){
		msg = msg+ 'Message can not be blank! ';
		check = 1;
	}

	
	if(check == 1){
		document.getElementById('cortact-error').innerHTML = msg;
		$("#concat_modal").modal("show");
	}
}


function signupfunction(){
	var msg = '';
	var check = 0;
	var name = document.forms['signup'].elements['name'].value;	
	var father = document.forms['signup'].elements['father'].value;	
	var mother = document.forms['signup'].elements['mother'].value;	
	var paddress = document.forms['signup'].elements['paddress'].value;	
	var maddress = document.forms['signup'].elements['maddress'].value;	
	var mobile = document.forms['signup'].elements['mobile'].value;	
	
	var email = document.forms['signup'].elements['email'].value;
	var checkemail = email.includes("@");
	var password = document.forms['signup'].elements['password'].value;
	var passlength = password.length;
	if(name == ''){msg = msg + 'Name can not be blank! '; check = 1;}
	if(father == ''){msg = msg + 'Father can not be blank! '; check = 1;}
	if(father == ''){msg = msg + 'Father can not be blank! '; check = 1;}
	if(mother == ''){msg = msg + 'Mother can not be blank! '; check = 1;}
	if(paddress == ''){msg = msg + 'Permanent Aaddress can not be blank! '; check = 1;}
	if(maddress == ''){msg = msg + 'Mailing Address can not be blank! '; check = 1;}
	if(mobile == ''){msg = msg + 'Mobile number can not be blank! '; check = 1;}
	if(checkemail == false){msg = msg + 'Insert a valid Email! '; check = 1;}
	if(password == ''){msg = msg + 'Password can not be blank! '; check = 1;}
	if(passlength < 6){msg = msg + 'Password must be at lest 6 character! '; check = 1;}

	if(check>0){
		document.getElementById('signup-error').innerHTML = msg ;
		$("#signup_modal").modal("show");
	}

}



function applytestfunction(){
	var msg = '';
	var check = 0;
	var classname = document.forms['apply-testimonial'].elements['classname'].value;	
	var batch = document.forms['apply-testimonial'].elements['batch'].value;	
	var roll = document.forms['apply-testimonial'].elements['roll'].value;	
	var pyear = document.forms['apply-testimonial'].elements['pyear'].value;		
	var subject = document.forms['apply-testimonial'].elements['subject'].value;	
	var result = document.forms['apply-testimonial'].elements['result'].value;	

	
	if(classname == ''){msg = msg + 'Class name can not be blank! '; check = 1;}
	if(batch == ''){msg = msg + 'Batch can not be blank! '; check = 1;}	
	if(roll == ''){msg = msg + 'Roll Number can not be blank! '; check = 1;}
	if(pyear == ''){msg = msg + 'Passing year can not be blank! '; check = 1;}
	if(subject == ''){msg = msg + 'Subject can not be blank! '; check = 1;}
	if(result == ''){msg = msg + 'Insert a valid result! '; check = 1;}
	

	if(check>0){
		document.getElementById('signup-error').innerHTML = msg ;
		$("#apply_test_modal").modal("show");
	}

}


function foradduser(){
	var msg = '';
	var check = 0;
	var user_id = document.forms['add_user'].elements['foruser_id'].value;			
	var password = document.forms['add_user'].elements['forpassword'].value;	
	var name = document.forms['add_user'].elements['forname'].value;	
	var email = document.forms['add_user'].elements['foremail'].value;
	var level = document.forms['add_user'].elements['forlevel'].value;
	var checkemail = email.includes("@");
	var passlength = password.length;
	
	if(user_id == ''){
		msg = 'User ID can not be blank! ';
		check = 1;
	}
	if(passlength <6){
		msg = 'Password must be 6 character ';
		check = 1;
	}
	if(name == ''){
		msg = 'Name can not be blank! ';
		check = 1;
	}
	if(level == ''){
		msg = 'User Level can not be blank! ';
		check = 1;
	}
	
	if(checkemail == false){
		msg = msg +'Please insert a valie email address! ';
		check = 1;
	}
	

	
	if(check == 1){
		document.getElementById('cortact-error').innerHTML = msg;
		$("#add_user_modal").modal("show");
	}

}


function change_password(){
	var msg = '';
	var check = 0;
	var old_password = document.forms['change_password'].elements['old_password'].value;			
	var new_password = document.forms['change_password'].elements['new_password'].value;	
	var confirm_new_password = document.forms['change_password'].elements['confirm_new_password'].value;	

	if(old_password == ''){
		document.forms['change_password'].elements['old_password'].style.background = "#fad7a0";
		msg = 'Old password can not be blank! ';
		check = 1;
	}
	if( new_password.length <6){
		msg = 'Password must be at least 6 character! ';
		check = 1;
	}

	if(new_password != confirm_new_password){
		msg = 'New password and confirm new password mismatched! ';
		check = 1;
	}
	if(check == 1){
		document.getElementById('cortact-error').innerHTML = msg;
		$("#change_password_modal").modal("show");
	}
}

function showhide(password,show)
{
    var password = document.getElementById(password);
    var eshow = document.getElementById(show);

    password.type = eshow.checked ? 'text' : 'password';                 

}