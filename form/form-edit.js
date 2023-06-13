const form = document.getElementById('form');
const name = document.getElementById('name');
const email = document.getElementById('location');
const startdate = document.getElementById('start-date');
const starttime = document.getElementById('start-time');
const enddate = document.getElementById('end-date');
const endtime = document.getElementById('end-time');
submit_botton = document.getElementById("submit");

// const hour = document.getElementById('hour');
// const minute = document.getElementById('minute');

// const minutes = document.getElementById('minutes');
// const priority = form.elements('priority');
// const password = document.getElementById('password');
// const password2 = document.getElementById('password2');

submit_botton.addEventListener('click', function(){
	check = checkInputs();
	if (check == 1){
		form.submit();}
}
);

//submit_button.addEventListener("click", preventDefault)

function checkInputs() {
	// trim to remove the whitespaces
	check = 1;
	const nameValue = name.value.trim();
	const locationValue = email.value.trim();
	const startDValue = startdate.value.trim();
	const startTValue = starttime.value.trim();
	const endDValue = enddate.value.trim();
	const endTValue = endtime.value.trim();
	// const hourValue = hour.value.trim();
	// const minValue = minute.value.trim();

	// const minutesValue = minutes.value.trim();
	// const prioValue = priority.value.trim();
	// const passwordValue = password.value.trim();
	// const password2Value = password2.value.trim();
	
	if(nameValue === '') {
		setErrorFor(name, "Event Name can't be blank");
		check = 0;
	} else {
		setSuccessFor(name);
	}
	
	if(locationValue === '') {
		setErrorFor(email, "Location can't be blank");
		check = 0;
	// } else if (!isEmail(emailValue)) {
	// 	setErrorFor(email, 'Not a valid email');
	// } 
    }else {
		setSuccessFor(email);
	}

	if(startDValue === '') {
		setErrorFory(startdate, "Date can't be blank");
		check = 0;
	} else {
		setSuccessFory(startdate);
	}

	if(startTValue === '') {
		setErrorFory(starttime, "Time can't be blank");
		check = 0;
	} else {
		setSuccessFory(starttime);
	}

	if(endDValue === '') {
		setErrorFory(enddate, "Date can't be blank");
		check = 0;
	} else if (startDValue === endDValue) {
		setErrorFory(enddate, "End date can't be same as start date");
		check = 0;
	} else {
		setSuccessFory(enddate);
	}

	if(endTValue === '') {
		setErrorFory(endtime, "Time can't be blank");
		check = 0;
	} else {
		setSuccessFory(endtime);
	}

	var prio = document.getElementsByName('priority');
	var priorityId = document.getElementById('radio');
	var checkedPriority = false;

	for (var i = 0; i < prio.length; i++) {
		if (prio[i].checked) {
			checkedPriority = true;
			break;
		}
	}

	if (!checkedPriority) {
		setErrorForx(priorityId, 'Priority not selected');
		check = 0;
	} else {
		setSuccessForx(priorityId);
	}


	// if(hourValue === '') {
	// 	setErrorForn(hour, "Duration can't be blank");
	// } else if(isNaN(parseInt(hourValue))){
	// 	setErrorForn(hour, "Number only!");
	// }
	// else {
	// 	setSuccessForn(hour);
	// }

	// if(minValue === '') {
	// 	setErrorFore(minute, "Minute can't be blank");
	// } else if(isNaN(parseInt(minValue))){
	// 	setErrorFore(minute, "Number only!");
	// }else {
	// 	setSuccessFore(minute);
	// }

	// if(minutesValue === '') {
	// 	setErrorFor(minutes, 'Event Name cannot be blank');
	// } else {
	// 	setSuccessFor(minutes);
	// }

	// if(!isRadioSelected(priority)) {
	// 	setErrorFory(priority, "Time can't be blank");
	// } else {
	// 	setSuccessFory(priority);
	// }
	// if(prioValue === '') {
	// 	setErrorFory(priority, "Time can't be blank");
	// } else {
	// 	setSuccessFory(priority);
	// }
	return check;
}
	
// 	if(passwordValue === '') {
// 		setErrorFor(password, 'Password cannot be blank');
// 	} else {
// 		setSuccessFor(password);
// 	}
	
// 	if(password2Value === '') {
// 		setErrorFor(password2, 'Password2 cannot be blank');
// 	} else if(passwordValue !== password2Value) {
// 		setErrorFor(password2, 'Passwords does not match');
// 	} else{
// 		setSuccessFor(password2);
// 	}
// }

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	// formControl.className = 'form-control2 error';
	small.innerText = message;
}

function setErrorFory(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control5 error';
	// formControl.className = 'form-control2 error';
	small.innerText = message;
}


function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

function setSuccessFory(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control5 success';
}

function setErrorForx(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control6 error';
	// formControl.className = 'form-control2 error';
	small.innerText = message;
}


function setSuccessForx(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control6 success';
}

function setErrorForn(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control11 error';
	// formControl.className = 'form-control2 error';
	small.innerText = message;
}


function setSuccessForn(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control11 success';
}

function setErrorFore(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control12 error';
	// formControl.className = 'form-control2 error';
	small.innerText = message;
}


function setSuccessFore(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control12 success';
}

/*reset button */
function resetForm() {
	form.reset();
	clearValidationStates();
  }
  
  function clearValidationStates() {
	const formControls = document.querySelectorAll('.form-control');
	const formControls12 = document.querySelectorAll('.form-control12');
	const formControls11 = document.querySelectorAll('.form-control11');
	const formControls5 = document.querySelectorAll('.form-control5');
	const formControls6 = document.querySelectorAll('.form-control6');
  
	formControls.forEach(control => {
	  control.classList.remove('error');
	  control.classList.remove('success');
	});

	formControls12.forEach(control => {
		control.classList.remove('error');
		control.classList.remove('success');
	});

	formControls11.forEach(control => {
		control.classList.remove('error');
		control.classList.remove('success');
	});

	formControls5.forEach(control => {
		control.classList.remove('error');
		control.classList.remove('success');
	});

	formControls6.forEach(control => {
		control.classList.remove('error');
		control.classList.remove('success');
	});
}
  
  // Attach the resetForm function to a reset button
  const resetButton = document.getElementById('reset-button');
  resetButton.addEventListener('click', resetForm);
	
// function isEmail(email) {
// 	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
// }




// function isRadioSelected(radioInputs) {
// 	for (let i = 0; i < radioInputs.length; i++) {
// 	  if (radioInputs[i].checked) {
// 		return true;
// 	  }
// 	}
// 	return false;
//   }








// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});