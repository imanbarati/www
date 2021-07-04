<html>

<head>

<title>jQuery4u Captcha Demo</title>

 <script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'clean'
 };
 </script>

</head>


<body>

<form id="signupform" action="javascript:validateCaptcha()" method="post">

<label for="name">Name</label>
<input type="text" id="name" name="name" title="Your name as you would like it to appear on this website."/>

<label for="email">Email</label>
<input type="text" id="email" name="email" title="Your e-mail address will NOT be displayed on this website."/>

<label for="password1">Password</label>
<input type="password"  id="password1" name="password1" title="Passwords must be at least 8 characters long."/>

<div id="termsckb-wrap">I agree to the Terms and Conditions <input type="checkbox" id="termsckb" name="termsckb" /></div>

<div id="captcha-wrap">
		<div id="termsckb-wrap"><p class="bold">Type in the words below (separated by a space):</p></div>
		<?php
		require_once("recaptchalib.php");
		$publickey = ""; // you got this from the signup page
		echo recaptcha_get_html($publickey);
		?>
		<div id="captcha-status"></div>
</div>
					
<div id="signup-btn"><input id="signupbutton" name="signupbutton" class="button" type="submit" value="submit" /></div>
			
</form>

</body>
</html>