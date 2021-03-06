<?php
include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;
if( isset( $_POST['submit'] ) ){ // اگر فرم قبلا پر شده پردازشش کن
		
	// 2. ايجاد کوئري
	$sql = "INSERT INTO Message (name, email, message) 
	VALUES('{$_POST['name']}', '{$_POST['email']}', '{$_POST['message']}')";
	
	$db = new DB();
	$db -> execute( $sql );
	unset($db);
	
	// ارسال ایمیل به ادمین
	$message = 
		"از طرف: {$_POST['name']}\r\n
		متن پیام کاربر:\r\n
		{$_POST['message']}";
	$header = "From: {$_POST['email']}";
	$sent = mail('navidimani.sisco@gmail.com', 'تماس با ما - سایت مبتنی', $message, $header);
}
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>تماس با ما</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "assets/css/main.css">
	</head>
	<body class = "container">
		<h2>تماس با ما</h2>
		<?php
		$alerts = project_alerts();
		echo $alerts;
		?>
		<form action = "" method = "post">
			<label for = "name">نام: </label>
			<input type = "text" name = "name" id = "name" class="form-control" required title = "نام ضروری است"><br>
			<label for = "email">آدرس ایمیل: </label>
			<input type = "email" name = "email" id = "email" class="form-control"><br>		
			<label for = "message">متن پیام: </label>
			<textarea name = "message" id = "message" class="form-control"></textarea><br>
			<input type = "submit" name = "submit" value = "ارسال" class="btn btn-primary">
		</form>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
	</body>
</html>