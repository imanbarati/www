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

// form validation

var requiredList = document.querySelectorAll(':required');
for(i = 0; i < requiredList.length; i++){
	var node = document.createElement('span'); // Create a <span> node
	//var textnode = document.createTextNode('*');
	//node.appendChild( textnode ); // Append the text to <span>
	
	node.classList.add('fas');
	node.classList.add('fa-asterisk');
	//node.classList.add('text-danger');
	
	requiredList[i].parentNode.appendChild( node );	
}

var numberList = document.querySelectorAll('[type = "number"]');
for(i = 0; i < numberList.length; i++){
	numberList[i].addEventListener( 'input', numberValidation );
}
function numberValidation(e){
	//e.preventDefault();	
	if( this.validity.rangeUnderflow ){
		var error = 'عدد باید بزرگتر یا مساوی ' + this.min + ' باشد!';
		this.setCustomValidity( error );
		//this.reportValidity();		
	}
	else if( this.validity.rangeOverflow ){
		var error = 'عدد باید کوچکتر یا مساوی ' + this.max + ' باشد!';
		this.setCustomValidity( error );
		//this.reportValidity();		
	}
	else if( this.validity.stepMismatch ){
		var numFloor = Math.floor(this.value / this.step) * this.step;
		var numCeil = numFloor + Math.floor(this.step);
		var error = 'عدد نامعتبر! نزدیکترین اعداد ' + numFloor + ' و ' + numCeil + ' است!';
		this.setCustomValidity( error );
		//this.reportValidity();		
	}
	else{
		this.setCustomValidity(''); // valid
		//this.reportValidity();
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
var rateButtons = document.querySelectorAll('.rateButtons .btn');

for (i = 0; i < rateButtons.length; i++) {
	rateButtons[i].addEventListener( 'mouseenter', showStars );
	rateButtons[i].addEventListener( 'mouseleave', restartStars );
}

function showStars( voted = false ){
	for (i = 0; i < rateButtons.length; i++) { // امتیازها را پاک کن
		rateButtons[i].style.transitionDelay = '0s';
		
		if( voted === true )
			rateButtons[i].classList.remove('voted');
		rateButtons[i].classList.remove('fas');
		rateButtons[i].classList.add('far');
	}
	for (i = 0; i < rateButtons.length; i++) { // ستاره‌های هاور را رنگی کن
		rateButtons[i].style.transitionDelay = ( 0.1 + i * 0.05 ) + 's';
		
		rateButtons[i].classList.remove('far');
		rateButtons[i].classList.add('fas');
		if( voted === true )
			rateButtons[i].classList.add('voted');
		
		if( rateButtons[i] === this )
			break; // ستاره‌های بعدی رنگی نشود
	} 
}

function restartStars(){
	for (i = 0; i < rateButtons.length; i++) {		
		if( rateButtons[i].classList.contains('voted') ){
			// اگر رای داده شده، ستاره تو پر شود
			rateButtons[i].classList.remove('far');
			rateButtons[i].classList.add('fas');
		}
		else{
			// ستاره توخالی شود
			rateButtons[i].style.transitionDelay = '0s';
			
			rateButtons[i].classList.remove('fas');
			rateButtons[i].classList.add('far');			
		}
	} 
}



function ajaxHandler( url , ajaxResponseHandler){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function(){		
		if( this.readyState == 4 && this.status == 200 )
			ajaxResponseHandler( this );
	}
	ajax.open('GET', url, true);
	ajax.send();
}
// rating ajax
function RatingARH( ajax ){
	//alert('done');
}
for (i = 0; i < rateButtons.length; i++) {
	rateButtons[i].addEventListener( 'click', ratingAjaxFunction );
	//rateButtons[i].addEventListener( 'click', showStars );
}
function ratingAjaxFunction(e){
	// رویداد پیش فرض آن را غیر فعال کنید
	e.preventDefault();
	
	// آدرس را بردار و برای مقصد اجکس استفاده کن
	url = this.href; // "rateProduct.php?id=1&vote=2"
	ajaxHandler( url, RatingARH );
	
	// فراخوانی تابعی که به تعداد لازم ستاره زرد اضافه کند
	//showStars.bind( this, true )();
	var showVotedStars = showStars.bind( this, true );
	showVotedStars();
	//showStars(true);
}

// username availability check


var email = document.querySelector('[name = "email"]');
//var email = document.registerForm.email; // فقط ایمیل فرم ثبت نام
if( email )
	email.addEventListener( 'input', emailAvailabilityCheck );

function emailAvailabilityCheck(e){
	url = 'checkEmail.php?email=' + this.value;
	ajaxHandler( url, checkEmailARH );
}
function checkEmailARH( ajax ){
	if( ajax.responseText === 'yes' ){
		alert('این ایمیل تکراری است');
		// someTag.textContent = 'این ایمیل تکراری است';
	}
	else{
		// someTag.textContent = '';		
	}
}