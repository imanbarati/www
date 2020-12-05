var password = document.querySelector('#password');
// المان انتخاب شده
var toggleButton = document.querySelector('#toggleButton');
 
toggleButton.addEventListener('click', toggleVisibility);

function toggleVisibility(e){
	if( password.type === 'password'){
		password.type = 'text';
		//password.setAttribute('type', 'text');
		toggleButton.classList.remove('fa-eye');
		toggleButton.classList.add('fa-eye-slash');
	}
	else{
		password.type = 'password';
		toggleButton.classList.remove('fa-eye-slash');
		toggleButton.classList.add('fa-eye');
	}
}