// toggle password visibility
var toggleButton = document.querySelector('#toggleButton');
if(toggleButton)
	toggleButton.addEventListener('click', toggleVisibility);

function toggleVisibility(e){
	var password = this.parentNode.querySelector('#password');
	
	if( password.type === 'password'){
		password.type = 'text'; // محتوای ورودی قابل دیدن شود
		//password.setAttribute('type', 'text');
		//password.getAttribute('type');
		
		// کلاس را تغییر بده تا آیکن عوض شود
		this.classList.remove('fa-eye');
		this.classList.add('fa-eye-slash');
	}
	else{
		password.type = 'password';
		this.classList.remove('fa-eye-slash');
		this.classList.add('fa-eye');
	}
}


// toggle form visibility
var replyButtons = document.querySelectorAll('.replyButton');
for(i = 0; i < replyButtons.length; i++){
	replyButtons[i].addEventListener( 'click', addCommentForm );
}
function addCommentForm(e){
	for(i = 0; i < replyButtons.length; i++){
		// مخفی کردن همه فرم های کامنت
		replyButtons[i].parentNode.parentNode.querySelector('.commentFormBlock').style.display = 'none';
	}
	this.parentNode.parentNode.querySelector('.commentFormBlock').style.display = 'block'; // نمایش فرم کامنت دکمه کلیک شده
}

// toggle star style
var rateButtons = document.querySelectorAll('.rateButtons .btn.far');

for (i = 0; i < rateButtons.length; i++) {
	rateButtons[i].addEventListener( 'mouseenter', addSolid );
	rateButtons[i].addEventListener( 'mouseleave', removeSolid );
}

function addSolid(e){
	//var rateButtons = this.parentNode.querySelectorAll('.rateButtons .btn.far');
	for (i = 0; i < rateButtons.length; i++) {
		rateButtons[i].style.transitionDelay = ( (i+1) * 0.05) + 's';
		
		rateButtons[i].classList.remove('far');
		rateButtons[i].classList.add('fas');
		if( rateButtons[i] === this )
			break;
	} 
}
function removeSolid(e){
	//var rateButtons = this.parentNode.querySelectorAll('.rateButtons .btn.far');
	for (i = 0; i < rateButtons.length; i++) {
		rateButtons[i].style.transitionDelay = '0s';
		
		rateButtons[i].classList.remove('fas');
		rateButtons[i].classList.add('far');
	} 
}
