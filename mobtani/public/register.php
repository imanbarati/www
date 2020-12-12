<?php
include '../includes/settings.php' ;
include '../includes/functions.php';

$aaa = new AAA();
if( $aaa -> isAuthenticated() )
		mobtani_redirect('profile.php');
	
if( isset( $_POST['submit'] ) ){ // اگر فرم قبلا پر شده پردازشش کن
		
	$imgSrc = '/mobtani/public/assets/images/male-profile.jpg';
	
	$db = new DB();
	$user = new User( $db );
	$where = "email = '{$_POST['email']}'";
	$table = $user -> find( $where ); // پیدا کردن کاربر با این مشخصات
	
	if( count( $table ) === 0 ){ // اگر چنین کاربری نبود
		// مشخصات کاربری را ذخیره کن
		$parameters = $_POST;
		$parameters['imgSrc'] = $imgSrc;
		/*
		$parameters = array(
			'firstname'			=> $_POST['firstname'],
			'lastname'			=> $_POST['lastname'],
			'email'		=> $_POST['weekday'],
			'timeFrom'		=> $_POST['timeFrom'],
			'timeTo'		=> $_POST['timeTo'],
			'imgSrc'		=> $imgSrc,
			'description' 	=> $_POST['description'],
			//'status'		=> 'active',
			);*/
		$uid = $user -> save( $parameters );
		// همچنین این کاربر را لاگین کن
		$aaa = new AAA();
		$aaa -> login( $uid );
		
		$alert -> alerts("{$row['firstname']} {$row['lastname']} خوش آمدید!", 'success');
		
		mobtani_redirect('profile.php');
	}
	else
		$alert -> alerts('کاربری با این ایمیل قبلا ثبت نام شده است!');
	
	unset($user);
	unset($db);
	
}
?>
<!doctype html>
<html lang = "fa">
	<head>
		<meta charset = "utf-8">
		<title>ثبت نام</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		
		<link rel = "stylesheet" href = "assets/css/main.css">
	</head>
	<body class = "container">
		<h1>ثبت نام</h1>
		<?php echo $alert -> alerts();?>
		<form action = "" method = "post">
			<label for = "firstname">نام و نام خانوادگی</label>
			<span class = "input-group">
				<input type = "text" name = "firstname" id = "firstname" placeholder = "نام" class="form-control" value = "<?php if( isset($_POST['firstname']) ) echo $_POST['firstname']; ?>">
				<input type = "text" name = "lastname" id = "lastname" placeholder = "نام خانوادگی" class="form-control" value = "<?php if( isset($_POST['lastname']) ) echo $_POST['lastname']; ?>">
			</span><br>
			
			<label for = "email">ایمیل</label>
			<input type = "email" name = "email" id = "email" class="form-control" value = "<?php if( isset($_POST['email']) ) echo $_POST['email']; ?>"><br>
			
			<label for = "password">کلمه عبور</label>
			<span class="input-group">
				<input type = "password" name = "password" id = "password" class="form-control">
				<button type = "button" class = "input-group-text fas fa-eye" id = "toggleButton"></button>
			</span><br>
			
			
			
			
			
			<label for = "state">استان</label>			
			<select name = "state" id = "state" class="form-control">
				<option value = "isfahan">اصفهان</option>
			</select>
			<br>
			<label for = "city">شهر</label>			
			<select name = "city" id = "city" class="form-control">
				<option value = "isfahan">اصفهان</option>
			</select>
			<br>
			
			<input type = "submit" name = "submit" value = "ثبت نام" class="btn btn-success">
			<a href = "login.php" class = "btn btn-link">وارد شوید</a>
		</form>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		
		<script src="https://kit.fontawesome.com/e36ff0bc6c.js" crossorigin="anonymous"></script>
		<script src = "assets/js/main.js"></script>
	</body>
</html>