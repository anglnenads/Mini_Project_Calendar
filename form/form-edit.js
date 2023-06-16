const form = document.getElementById('form');
const nameEvent = document.getElementById('name');
const locationInput = document.getElementById('location');
const startdate = document.getElementById('start-date');
const starttime = document.getElementById('start-time');
const enddate = document.getElementById('end-date');
const endtime = document.getElementById('end-time');
submit_botton = document.getElementById("submit");

submit_botton.addEventListener('click', function(){
	check = checkInputs();
	if (check == 1){
		form.submit();}
}
);


function checkInputs() {
	// trim to remove the whitespaces
	check = 1;
	const nameValue = nameEvent.value.trim();
	const locationValue = locationInput.value.trim();
	const startDValue = startdate.value.trim();
	const startTValue = starttime.value.trim();
	const endDValue = enddate.value.trim();
	const endTValue = endtime.value.trim();
	
	if(nameValue === '') {
		setErrorFor(nameEvent, "Event Name can't be blank");
		check = 0;
	} else {
		setSuccessFor(nameEvent);
	}
	
	if(locationValue === '') {
		setErrorFor(locationInput, "Location can't be blank");
		check = 0;
    }else {
		setSuccessFor(locationInput);
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
	return check;
}
	

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setErrorFory(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control5 error';
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
	small.innerText = message;
}


function setSuccessFore(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control12 success';
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
  
/*reset button */
function resetForm() {
	form.reset();
	clearValidationStates();
}
// Attach the resetForm function to a reset button
const resetButton = document.getElementById('reset-button');
resetButton.addEventListener('click', resetForm);
	

