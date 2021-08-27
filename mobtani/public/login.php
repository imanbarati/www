<?php
include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;

$aaa = new AAA();
if( $aaa -> isAuthenticated() )
		mobtani_redirect('profile.php');
		
if( isset( $_POST['submit'] ) ){ // اگر فرم قبلا پر شده پردازشش کن
		
	$db = new DB();
	$user = new User( $db );
	$where = "email = '{$_POST['email']}' AND password = '{$_POST['password']}'";
	$table = $user -> find( $where ); // پیدا کردن کاربر با این مشخصات ورود
	
	if( count( $table ) > 0 ){ // اگر مشخصات ورود صحیح است
		$row = $table[0];
		$uid = $row['id']; // کاربر لاگین کرده id
		$aaa -> login( $uid );
		
		$alert -> alerts("{$row['firstname']} {$row['lastname']} خوش آمدید!", 'success');
		
		$redirect = 'profile.php';
		if( isset($_GET['redirect']) )
			$redirect = $_GET['redirect'];
		mobtani_redirect( $redirect );
	}
	else
		$alert -> alerts('نام کاربری یا کلمه عبور اشتباه است!');
		
	unset($user);
	unset($db);
	
}
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>ورود</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "assets/css/main.css">
	</head>
	<body class = "container">
		<h1>ورود</h1>
		<?php echo $alert -> alerts();?>
		<form action = "" method = "post" name = "loginForm">			
			<label for = "email">ایمیل</label>
			<input type = "email" name = "email" id = "email" class="form-control" value = "<?php if( isset($_POST['email']) ) echo $_POST['email']; ?>"><br>
			
			<label for = "password">کلمه عبور</label>
			<span class="input-group">
				<input type = "password" name = "password" id = "password" class="form-control">
				<button type = "button" class = "input-group-text fas fa-eye" id = "toggleButton"></button>
			</span><br>
			
			
			<input type = "submit" name = "submit" value = "ورود" class="btn btn-success">
			<a href = "register.php" class = "btn btn-link">ثبت نام کنید</a>
		</form>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
		<script src="https://kit.fontawesome.com/e36ff0bc6c.js" crossorigin="anonymous"></script>
		<script src = "assets/js/main.js"></script>
	</body>
</html>